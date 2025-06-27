<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;

class OrderController extends Controller
{
    public function getAllOrders(){
      $orders = Order::all();
      return response()->json($orders);
    }

    public function createOrder(Request $request){
      $user = User::find($request->user_id);
      $book = Book::find($request->book_id);

      $order = Order::create([
         'user_id'=> $request-> user_id,
         'book_id'=> $request-> book_id,
         'status'=> $request-> status,
         'order_date'=> $request-> order_date,
      ]);

      return response()->json($order);
    }

    public function deleteOrder($id){
      $order = Order::find($id);
      $order->delete();
      return response()->json(["message"=>"Order has been deleted!"]);

    }
}
