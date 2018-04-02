<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelModel;

class HotelController extends Controller
{
  public function __construct(HotelModel $item)
  {
    $this -> hotel = $hotel;
  }

  public function registerHotel(Request $request)
  {

    $hotel =
      "hotelID" => $request->hotelID,
      "hotelName"  => $request->hotelName,
      "hotelLocation" =>$request->hotelLocation,
      "hotelAddress"  => $request->hotelAddress,
      "hotelPhone"  => $request->hotelPhone,
      "hotelStar" =>$request->hotelStar,
      "roomID" =>$request->roomID
    ];


    $hotel = $this->hotel->create($hotelID);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allHotel()
  {
    $hotel = $this->hotel->all();

    return $hotel;

  }

  public function findHotel($hotelID)
  {
    $hotel = $this->hotel->find($hotelID);


    return $hotel;
  }

  public function destroyHotel($hotelID)
  {
    $hotel = $this->hotel->find($hotelID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateviewHotel(Request $request, $hotel)
  {

    $hotel = $this->hotel->find($hotelID);

    $hotel->hotelID = $request->hotelID;
    $hotel->hotelName = $request->hotelName;
    $hotel->hotelLocation= $request ->hotelLocation,
    $hotel->hotelAddress = $request->hotelAddress;
    $hotel->hotelPhone = $request->hotelPhone;
    $hotel->roomID = $request->roomID;

    $hotel = $hotel->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
