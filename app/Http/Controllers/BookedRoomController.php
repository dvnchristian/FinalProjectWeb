<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BookedRoomModel;
use App\Model\RoomModel;
use exception;

class BookedRoomController extends Controller
{
    protected $bookedRoom;

    public function __construct(BookedRoomModel $bookedRoom)
    {
      $this->bookedRoom = $bookedRoom;
    }

    public function registerBookedRoom(Request $request)
    {
      $bookedRoom =
      [
        "date"  => $request->date,
        "qty" => $request->qty
      ];

      $bookedRoom = $this->bookedRoom->create($bookedRoom);

      return response([
               'msg'=>'success',
           ],200);
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
      $booking->qty = $request->qty;

      $bookedRoom = $bookedRoom->save();

      return response([
           'msg'=>'success',
       ],200);
    }
}
