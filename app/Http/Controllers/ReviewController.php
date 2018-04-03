<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ReviewModel;
use Exception;

class ReviewController extends Controller
{

  protected $review;

  public function __construct(ReviewModel $review)
  {
    $this ->review = $review;
  }

  public function registerReview(Request $request)
  {

    $review =
    [

      "rating"  => $request->rating,
      "comment"  => $request->comment

    ];


    $review = $this->review->create($review);

    return response([
             'msg'=>'success',
         ],200);
  }

  public function allReview()
  {
    $review = $this->review->all();

    return $review;

  }

  public function findReview($reviewID)
  {
    $review = $this->review->find($reviewID);


    return $review;
  }

  public function destroyReview($reviewID)
  {
    $review = $this->review->find($reviewID)->delete();

    return response([
         'msg'=>'success',
     ],200);
  }

  public function updateviewReview(Request $request, $review)
  {

    $review= $this->review->find($reviewID);

    $review->rating = $request->rating;
    $review->comment = $request->comment;



    $review = $review->save();

    return response([
         'msg'=>'success',
     ],200);
  }





}
