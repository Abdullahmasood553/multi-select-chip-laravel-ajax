<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
public function store(Request $request)
{
    $cartItems = $request->input('cartItems');
    $totalAmount = $request->input('totalAmount');

    // Loop through the cart items and process them individually
    foreach ($cartItems as $cartItem) {
  
        $title          = $cartItem['title'];
        $category       = $cartItem['category'];
        $description    = $cartItem['description'];
        $image          = $cartItem['image'];
        $quantity       = $cartItem['quantity'];
        $price          = $cartItem['price'];

        $rating = $cartItem['rating'];
        $rate = $rating['rate'];
        $count = $rating['count'];

        $order = new Order();
        $order->title                   = $title;
        $order->category                = $category;
        $order->description             = $description;
        $order->image                   = $image;
        $order->quantity                = $quantity;
        $order->price                   = $price;
        $order->count                   = $count;
        $order->rate                    = $rate;
        // $order->total_amount = $totalAmount;
        $order->save();
    }

    // Return a response indicating success
    return response()->json(['message' => 'Checkout successful'], 200);
}

}
