<?php

namespace App\Http\Controllers;

use App\SubCategory;
use App\Category;
use App\Product;
use Session;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return $products = Product::with('category')->with('partner')->get();
        $subCategories = SubCategory::with('category')->get();
        //return $subCategories;
        return view('subCategories.index')->withSubCategories($subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subCategories.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' =>'required',
            'sub_cat_name' =>'required|unique:sub_categories|min:2|max:100'
        ]);

        $subCat = new SubCategory;
        $subCat->category_id = $request->category_id;
        $subCat->sub_cat_name = $request->sub_cat_name;
        $subCat->save();
        Session::flash('success','Sub-Category created successfully!!');
        return redirect(route('sub-categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('subCategories.edit')->withSubCategory($subCategory)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'category_id' =>'required',
            'sub_cat_name' =>'required|min:2|max:100|unique:sub_categories,id,'.$subCategory->id
        ]);

        $subCategory->category_id = $request->category_id;
        $subCategory->sub_cat_name = $request->sub_cat_name;
        $subCategory->save();
        Session::flash('success','Sub-Category updated successfully!!');
        return redirect(route('sub-categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        Session::flash('success','Sub-Category deleted successfully!!');
        return redirect(route('sub-categories.index'));
    }
}
