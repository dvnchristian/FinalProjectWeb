<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BookedRoomModel;
use App\Model\RoomModel;
use App\Model\BookingModel; //INI
use exception;

class BookedRoomController extends Controller
{
    protected $bookedRoom;
    protected $room;

    public function __construct(BookedRoomModel $bookedRoom, RoomModel $room)
    {
      $this->bookedRoom = $bookedRoom;
      $this->room = $room;
    }

    public function registerBookedRoom(Request $request)
    {
      $bookedRoom =
      [
        "date"  => $request->date,
      ];

      $bookedRoom = $this->bookedRoom->create($bookedRoom);

      return response([
               'msg'=>'success',
           ],200);
    }

    // public function searchRoom(Request $request)
    // {
    //
    //   $dateToday = date("Y-m-d H:i:s");
    //   $credentials =  $request->only('checkInDate', 'checkOutDate');
    //
    //   $rules = [
    //       'checkInDate' => 'required|date',
    //       'checkOutDate' => 'required|date',
    //   ];
    //   $validator = Validator::make($credentials, $rules);
    //   if(checkInDate < $dateToday || checkOutDate == $dateToday || checkOutDate < $dateToday)
    //   {
    //     return response()->json(['success'=> false, 'error'=> $validator->messages()], 422);
    //   }
    //
    //   else
    //   {
    //     // get all the bookedRoomList for that specific room
    //     $bookedRoom = BookedRoomController::allbookedRoom()->where([
    //       ['date', '>', $request->checkInDate)],
    //       ['date', '<', $request->checkOutDate],
    //     ])->value('roomID');
    //   }
    //
    //
    //
    //
    //
    //
    // }

    public function testfunction()
    {
      $dateToday = date("Y");
      $year = substr($dateToday, -2);
      return $year;
    }

    public function allbookedRoom()
    {
      $bookedRoom = $this->bookedRoom->all();

      return $bookedRoom;
    }

    public function findBookedRoom($bookedRoomID)
    {
      $bookedRoom = $this->bookedRoom->find($bookedRoomID);

      return $bookedRoom;
    }

    public function destroyBookedRoom($bookedRoomID)
    {
      $bookedRoom = $this->bookedRoom->find($bookedRoomID)->delete();

      return response([
           'msg'=>'success',
       ],200);
    }

    public function bookRoom($roomID)
    {
      $currStock = RoomModel::where('id', '=', $roomID);
    }

    public function updateviewBookedRoom(Request $request, $bookedRoom)
    {
      $bookedRoom = $this->bookedRoom->find($bookedRoomID);

      $bookedRoom->date = $request->date;

      $bookedRoom = $bookedRoom->save();

      return response([
           'msg'=>'success',
       ],200);
    }
}
