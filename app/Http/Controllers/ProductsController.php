<?php
namespace App\Http\Controllers;
use App\Product;
use App\ProductStore;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class ProductsController extends Controller
{

  public function index(){
    $products = Product::all();
    return response()->json($products);
  }
  public function show($id){
    $products = Product::find($id);
    $products->reviews = $products->reviews;
    $products->stores = $products->stores;
    return response()->json($products);
  }

  public function store(Request $request){
    $product = new Product;
    $product->title = $request->get("title");
    $product->brand = $request->get("brand");
    $product->price = $request->get("price");
    $product->image = $request->get("image");
    $product->description = $request->get("description");
    $product->save();

    $product_id = DB::connection() -> getPdo() -> lastInsertId();
    foreach ($request->get("stores") as $store) {
      $product_store = new ProductStore;
      $product_store->store_id = $store;
      $product_store->product_id =  $product_id;
      $product_store->save();
    }
    return response()->json([
      "success" => true
    ]);
  }


}
