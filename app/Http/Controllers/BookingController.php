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
