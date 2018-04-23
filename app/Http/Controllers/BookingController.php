<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BookingModel;
use App\Model\RoomModel;
use Exception;

class BookingController extends Controller
{
  protected $booking;

  public function __construct(BookingModel $booking)
  {
    $this->booking = $booking;
  }

  public function registerBooking(Request $request)
  {
    $booking =
    [
      "checkInDate"  => $request->checkInDate,
      "checkOutDate"  => $request->checkOutDate,
      "comment"  => $request->comment,
      "rating" => $request->rating,
    ];

    $booking = $this->booking->create($booking);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allBooking()
  {
    $booking = $this->booking->all();

    return $booking;
  }

  public function findBooking($bookingID)
  {
    $booking = $this->booking->find($bookingID);

    return $booking;
  }

  public function destroyBooking($bookingID)
  {
    $booking = $this->booking->find($bookingID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  // list of unbooked room
  public function unbookedRoom(Request $request)
  {
    // change the line below to $request->checkIn and $request->CheckOut
    // $checkIn = '2018-04-21'; $checkOut= '2018-04-23';
    $credentials = $request->only('checkInDate', 'checkOutDate');
    $rules = [
        'checkInDate' => 'dateTime|required',
        'checkOutDate' => 'dateTime|required',
    ];


    // $checkIn = $request->checkIn; $checkOut = $request->checkOut;
    $checkInDate = $request->checkInDate; $checkOutDate = $request->checkOutDate;


    return $checkInDate;


    // $this->kamar = new RoomModel;
    // $room = new RoomController($this->kamar); // roomModel::__construct cuman mesti ada 1 parameter
    // $ruang = $room->allRoom()->whereNotIn('id', '=', $specificBooking);
    //
    //
    // return $ruang;
  }

  public function searchRoom($roomID)
  {
    // $currStock = RoomModel::where('id', '=', $roomID)->value('qty');

    if($currStock < $qty)
    {
      return response([
        'msg' => 'There is no enough room, current room quantity: '. $currStock
      ]);
    }
    else
    {
      $currStock = $currStock - $qty;

      RoomModel::where('id', '=', $roomID)
      ->update([
        'qty'=>$currStock
      ]);

      return response(['msg' => 'Booking Successful. Stock Left: '.$currStock]);
    }
  }

  public function updateviewBooking(Request $request, $bookingID)
  {
    $booking = $this->booking->find($bookingID);

    $booking->checkInDate = $request->checkIn;
    $booking->lengthOfStay = $request->lengthOfStay;
    $booking->comment = $request->comment;
    $booking->rating = $request->rating;

    $booking = $booking->save();

    return response([
         'msg'=>'success',
     ],200);
  }
}
