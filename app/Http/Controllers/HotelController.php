<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\HotelModel;
use Exception;

class HotelController extends Controller
{

    protected $hotel;

  public function __construct(HotelModel $hotel)
  {
    $this->hotel = $hotel;
  }

  public function registerHotel(Request $request)
  {

    $hotel =
    [
      "hotelName"  => $request->hotelName,
      "hotelLocation" =>$request->hotelLocation,
      "hotelAddress"  => $request->hotelAddress,
      "hotelPhone"  => $request->hotelPhone,
      "hotelStar" =>$request->hotelStar

    ];


    $hotel = $this->hotel->create($hotel);

    return response
    ([
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


    $hotel->hotelName = $request->hotelName;
    $hotel->hotelLocation= $request ->hotelLocation;
    $hotel->hotelAddress = $request->hotelAddress;
    $hotel->hotelPhone = $request->hotelPhone;
    $hotel->hotelStar = $request->hotelStar;


    $hotel = $hotel->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
