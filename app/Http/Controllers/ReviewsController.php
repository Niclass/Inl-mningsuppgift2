<?php
namespace App\Http\Controllers;
use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ReviewsController extends Controller
{

  public function index(){
    $reviews = Review::all();
    return response()->json($reviews);
  }
}
