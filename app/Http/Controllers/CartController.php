<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use App\Models\Category;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Images;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function PaymentConfirm()
    {
        
        $categories = Category::all();
        $products = Products::all();
        $images = Images::all();
        $carts = Cart::all();
        $users = User::all();
        return view('pages.payment_confirmation', compact('categories','products','images','carts','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart($user_id, $id, Request $request)
    {
        $createcart = Cart::create([
            'user_id'=> $user_id,
            'product_id' => $id
        ]);
        $product = Products::where('id',$id)->value('product_name');
        $category_id = Products::where('id',$id)->value('category_id');
        $category = Category::where('id', $category_id)->value('category_name');
        $activity = ActivityLog::create([
            'user_id'=>$user_id,
            'activity'=>'Added '.$product.' in '.$category.' category to cart',
        ]);
        if($createcart && $activity)
        {
            return redirect()->back()->with('message', 'Item '.$product.' Added to cart');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, $id)
    {
        //
        $cart = Cart::findOrFail($id);
        $prod_id = $cart->product_id;
        $user_id = $cart->user_id;
        $product = Products::where('id',$prod_id)->value('product_name');
        $category_id = Products::where('id',$prod_id)->value('category_id');
        $category = Category::where('id', $category_id)->value('category_name');

        if($cart->delete()){
            $activity = ActivityLog::create([
                'user_id'=>$user_id,
                'activity'=>'Removed '.$product.' in '.$category.' category from cart',
            ]);
            return redirect()->back()->with('message', 'Item '.$product.' Removed from cart'); 
        }
    }
}
