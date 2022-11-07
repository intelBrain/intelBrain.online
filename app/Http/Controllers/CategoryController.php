<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCategories()
    {
       $categories = Category::all();
       return view('Admin.viewcategories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory()
    {
        //
        return view('Admin.addcategories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addCategoryProcessor(Request $request)
    {
        //
        if($request->hasFile('category_image')) {
            //Allowed Formats
            $allowedfileExtension=['pdf','jpg','png','jpeg','pdn'];
            $file = $request->file('category_image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $check=in_array($extension,$allowedfileExtension);
            if($check)
                {
                    // Upload file to public path in documents directory
                    $move = $file->move(public_path('uploads'), $filename);
                    // Database operation
                    if($move)
                    {
                        $categories = Category::create([
                            'category_name' => $request->category_name,
                            'category_code' => $request->category_code,
                            'no_of_products' => $request->no_of_products,
                            'category_image' => $filename
                        ]);
                        if($categories)
                        {
                            return redirect()->back()->with('message', 'Category added successfully');
                        }
                        else
                        {
                            return redirect()->back()->with('message', 'Sorry, Category not added. Please try again.');
                        }
                    }
                }
                else
                {
                    return redirect()->back()->with('message', 'Sorry, Product not added. Only Upload png , jpg , doc');
                }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
