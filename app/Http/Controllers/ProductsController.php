<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Products;
use App\Models\Images;
use App\Models\Category;
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\Cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        //
        $categories=Category::all();
        return view('Admin.addproducts', compact('categories'));
    }


    public function viewProducts()
    {
        $products = Products::all();
        return view('Admin.products', compact('products'));
    }

    public function addProductProcessor(Request $request){
        if($request->hasFile('product_images')) {
            //Allowed Formats
            $allowedfileExtension=['pdf','jpg','png','jpeg','pdn'];
            $files = $request->file('product_images');
            $product_new_price = (1 - (($request->discount)/100))*($request->product_old_price);
            $products = Products::create([
                'product_name' => $request->product_name,
                'product_code' => $request->product_code,
                'product_brand' => $request->product_brand,
                'product_description' => $request->product_description,
                'product_details' => $request->product_details,
                'no_of_products' => $request->no_of_products,
                'category_id' => $request->category_id,
                'discount' => $request->discount,
                'product_old_price' => $request->product_old_price,
                'product_new_price' => $product_new_price,
            ]);
            
            $countprod = Category::where('id', $request->category_id)->value('no_of_products');
            $newcount = $countprod + $request->no_of_products;
            
            Category::where('id', $request->category_id)->update([
                'no_of_products'=> $newcount
            ]);
            foreach($files as $file)
            {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                //dd($check);
                if($check)
                {
                    // Upload file to public path in documents directory
                    $file->move(public_path('uploads'), $filename);
                    // Database operation
                    Images::create([
                        'item_id' => $products->id,
                        'filename' => $filename
                    ]);
                }
                else
                {
                    return redirect()->back()->with('message', 'Sorry, Product not added. Only Upload png , jpg , doc');
                }
            }
        return redirect()->back()->with('message', 'Product added successfully');
        }
    }

    public function activateProduct($id, Request $request)
    {
        $activate = Products::where('id', $id)
        ->update([
            'active' => 1
        ]);
        if($activate)
        {
            return redirect()->back()->with('message', 'Success!! Product Activated');
        }
    }

    public function deactivateProduct($id, Request $request)
    {
        $deactivate = Products::where('id', $id)
        ->update([
            'active' => 0
        ]);
        if($deactivate)
        {
            return redirect()->back()->with('message', 'Success!! Product Deactivated');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productdetails($id)
    {
        $product=Products::findOrFail($id);
        $carts = Cart::all();
        $categories = Category::all();
        $products = Products::all();
        $images = Images::all();
        $users = User::all();
        return view('pages.productdetails', compact('products','categories','images','users','product','carts'));
    }
    
    public function searchItem(Request $request)
    {
        $carts = Cart::all();
        $categories = Category::all();
        $products = Products::all();
        $images = Images::all();
        $users = User::all();
        
        if($request->has('search')){
            if($request->search == '')
            {
                $products_search = Products::where('category_id', $request->category_id)->get();
            }
            elseif($request->category_id == '')
            {
                $products_search = Products::where('product_name','like', "%{$request->search}%")->get();
            }
            else
            {
                $products_search = Products::where('product_name','like', "%{$request->search}%")->where('category_id', $request->category_id)->get();
            }
            if(isset(Auth::User()->id))
            {
                if($request->search == '')
                {
                    $prod = ' ';
                }
                else
                {
                    $prod= ' \''.$request->search.'\' ';
                }
                $cat = Category::where('id',$request->category_id)->value('category_name');
                if($cat == '')
                {
                    $cat = 'all categories';
                }
                else
                {
                    $cat = $cat.' category';
                }
                $activity = ActivityLog::create([
                    'user_id'=>Auth::User()->id,
                    'activity'=>'User searched for a product'.$prod.'in '.$cat,
                ]);
            }
        }
        return view('pages.search_results', compact('products','categories','images','users','carts','products_search'));
    }

    public function CheckOutView($id)
    {
        $user = User::findOrFail($id);
        $users = User::all();
        $carts = Cart::where('user_id', $id)->get();
        $products = Products::all();
        $images = Images::all();
        $categories = Category::all();
        
        $activity = ActivityLog::create([
            'user_id'=>$id,
            'activity'=>'User Checked Out products from cart',
        ]);

        return view('pages.checkout', compact('user','users','carts','products','images','categories'));
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
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
