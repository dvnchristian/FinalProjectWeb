<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserAccountModel;
use App\Model\RoomModel;
use App\Model\BookingModel;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator, DB, Hash, Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;
use Illuminate\Notifications\Notifiable;

class AuthController extends Controller
{
     protected $user;
     protected $room;
     protected $booking;

     public function __construct(UserAccountModel $user, RoomModel $room, BookingModel $booking)
     {
       $this->user = $user;
       $this->room = $room;
       $this->booking = $booking;
     }

    public function register(Request $request)
    {
        $credentials = $request->only(
          'name', 'email', 'password', 'phone', 'ccNumber', 'cvv', 'expDate', 'city');
        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:useraccount',
            'password' => 'required|max:16',
            'phone' => 'min:10|max:12',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()], 422);
        }
        $name = $request->name;
        $email = $request->email;

        $user = [
          "name"=> $name,
          "email"=> $email,
          "password"=> Hash::make($request->password),
          "phone" => $request->phone,
          "gender" => $request->gender,
          "city" => $request->city,
          "ccNumber" => $request->ccNumber,
          "cvv" => $request->cvv,
          "expDate" => $request->expDate,
        ];
        $user = $this->user->create($user);
        $verification_code = str_random(30); //Generate verification code
        DB::table('user_verifications')->insert(['user_id'=>$user->id,'token'=>$verification_code]);
        // $subject = "Please verify your email address.";
        // Mail::send('verify', ['name' => $name, 'verification_code' => $verification_code],
        //     function($mail) use ($email, $name, $subject){
        //         $mail->from((getenv('MAIL_USERNAME')), "Hotel Mayor");
        //         $mail->to($email, $name);
        //         $mail->subject($subject);
        //     });
        return response()->json(['success'=> true, 'message'=> 'Thanks for signing up! Please check your email to complete your registration.']);
   }

    // /**
    //  * API Verify User
    //  *
    //  * @param Request $request
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function verifyUser($verification_code)
    // {
    //     $check = DB::table('user_verifications')->where('token', $verification_code)->first();
    //     if(!is_null($check)){
    //         $user = UserAccountModel::find($check->user_id);
    //         if($user->is_verified == 1){
    //             return response()->json([
    //                 'success'=> true,
    //                 'message'=> 'Account already verified..'
    //             ]);
    //         }
    //         $user->is_verified = 1;
    //         $user->save();
    //         DB::table('user_verifications')->where('token', $verification_code);
    //         // DB::table('user_verifications')->where('token', $verification_code)->delete();
    //         return response()->json([
    //             'success'=> true,
    //             'message'=> 'You have successfully verified your email address.'
    //         ]);
    //     }
    //     return response()->json(['success'=> false, 'error'=> "Verification code is invalid."]);
    // }

    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()], 422);
        }

        $credentials['is_verified'] = 0;

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'We cant find an account with this credentials. Please make sure you entered the right information and you have verified your email address.'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.'], 500);
        }
        // all good so return the token

        return response()->json(['success' => true, 'data'=> [ 'token' => $token ]]);
    }
    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        $this->validate($request, ['token' => 'required']);

        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

    public function userAcc() {
      $user = auth()->user();

      return $user;
    }

    public function setBooking(Request $request) {
      try
      {
        $user = auth()->user();
        $booking =
        [
          "checkInDate"  => $request->checkInDate,
          "checkOutDate"  => $request->checkOutDate,
          "comment" => "",
          "rating" => 0,
          "userID" => $user->id,
          "roomID" => $request->roomID,
        ];

        $this->booking->create($booking);

        return response()->json(['success' => true, 'message'=> "You have booked a room."]);
      }
      catch(Exception $ex)
      {
        return response()->json(['success'=>false, 'message'=> $ex],400);
      }
    }

    /**
     * API Recover Password
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recover(Request $request)
    {
        $user = UserAccountModel::where('email', $request->email)->first();
        if (!$user) {
            $error_message = "Your email address was not found.";
            return response()->json(['success' => false, 'error' => ['email'=> $error_message]], 401);
        }
        try {
            Password::sendResetLink($request->only('email'), function (Message $message) {
                $message->subject('Your Password Reset Link');
            });
        } catch (\Exception $e) {
            //Return with error
            $error_message = $e->getMessage();
            return response()->json(['success' => false, 'error' => $error_message], 401);
        }
        return response()->json([
            'success' => true, 'data'=> ['message'=> 'A reset email has been sent! Please check your email.']
        ]);
    }

    public function bookingitinerary(Request $request){
        try
        {
          $user = auth()->user();
          $booking =
          [
            "checkInDate"  => $request->checkInDate,
            "checkOutDate"  => $request->checkOutDate,
            "userID" => $user->id,
            "roomID" => $request->id,
          ];

          return $booking;
        }
        catch(Exception $ex)
        {
          return response()->json(['success'=>false, 'message'=> $ex],400);
        }
    }
    public function booklist()
    {
      try
      {
        $user = auth()->user();
        $data = $this->booking
        ->join('room', 'room.id', '=', 'booking.roomID')
        ->where('booking.userID', '=', $user->id)
        ->select('booking.checkInDate', 'booking.checkOutDate', 'room.roomType', 'room.bedType', 'room.roomPrice',
        'room.roomImage')
        ->get();

        // return response()->json(['success'=>true, 'data'=> $booking]);
        return response()->json(['success'=>true, 'data'=> $data]);
      }
      catch(Exception $ex)
      {
        return response()->json(['success'=>false, 'message'=> $ex],400);
      }
    }

    public function editProfile(Request $request)
    {
      $message = AuthController::validateCCNumber($request->ccNumber);
      if($message == ""){ return response()->json(['success'=> false, 'error'=> $message], 422);}

      $message1 = AuthController::validateCVV($request->cvv);
      if($message1 == ""){ return response()->json(['success'=> false, 'error'=> $message1], 422);}

      $message2 = AuthController::validateExpireDate($request->expDate);
      if($message2 == ""){ return response()->json(['success'=> false, 'error'=> $message2], 422);}

      try
      {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->city = $request->input('city');
        $user->ccNumber = $request->input('ccNumber');
        $user->cvv = $request->input('cvv');
        $user->expDate = $request->input('expDate');

        $user->save();
        return response()->json(['success'=>true, 'message'=> 'Changes has been saved']);
      }
      catch(Exception $ex)
      {
        return response()->json(['success'=>false, 'message'=> $ex],400);
      }
    }

    // Validate CC Number
    public function validateCCNumber($ccNumber)
    {
      $message = "CC No. success";
      // 16 digits checked
      if($ccNumber < 3374000000000000 || $ccNumber > 5432999999999999)
      {
        return "Invalid Credit Card Number";
      }
      else
      {
        return $message;
      }
    }

    //validate cvv
    public function validateCVV($cvv)
    {
      $message = "cvv success";
      if($cvv < 000 || $cvv > 999)
      {
        return "Invalid CVV";
      }
      else
      {
        return $message;
      }
    }

    public function validateExpireDate($expDate)
    {
      $message = "Exp Date Validation Success";

      $dateNow = date("m-y");
      $minMonth = substr($dateNow, 0, -3);
      $minYear = substr($dateNow, -2);

      $ccMonth = substr($expDate, 0, 2);
      $ccYear = substr($expDate, -2, 2);
      $divider = substr($expDate, -3, 1);

      if($ccYear < $minYear || $ccYear > $minYear + 5)
      {
        return "Invalid Expiry Year";
      }
      else
      {
        if($divider != "/")
        {
          return "Invalid Divider";
        }
        else
        {
          if($ccMonth < 13 && $ccMonth > 0)
          {
            if($ccMonth == $minMonth && $ccYear < $minYear)
            {
              return "Invalid Month";
            }
            else
            {
              return $message;
            }
          }
          else
          {
            return "Invalid Month";
          }
        }
      }
    }
}
