<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\BookingModel;
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
      "noOfPeople"  => $request->noOfPeople,
      "checkIn"  => $request->checkIn,
      "checkOut"  => $request->checkOut,
      "roomQty" => $request->roomQty
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

  public function updateviewBooking(Request $request, $booking)
  {
    $booking = $this->booking->find($bookingID);

    $booking->noOfPeople = $request->noOfPeople;
    $booking->checkIn = $request->checkIn;
    $booking->checkOut = $request->checkOut;
    $booking->roomQty = $request->roomQty;

    $booking = $booking->save();

    return response([
         'msg'=>'success',
     ],200);
  }
}
