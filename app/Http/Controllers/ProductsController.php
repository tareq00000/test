<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Partner;
use Storage;
use Session;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //return $req->status;
       $products = $this->filterProduct($req->status);
        //return $products;
        return view('products.index')->withProducts($products);
    }

    public function filterProduct($filter=null)
    {
        if($filter==null){
            return $products = Product::with('category')->with('partner')->get();
        }else{
            return $products = Product::where('published',$filter)->with('category')->with('partner')->get();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $partners = Partner::all();
        return view('products.create')->withCategories($categories)->withPartners($partners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request);
        $request->validate([
            'title'       => 'required|unique:products|min:5|max:100',

            'category_id' => 'required',
            'partner_id'  => 'required',
            'desciption'  => 'min:5|max:5000',
            'price'       => 'required|integer',
            'discount'    => 'integer',
            'file'        => 'file',
            'image'   => 'required|image'

        ]);

        $product = new Product;
        $product->title       = $request->title;
        $product->category_id = $request->category_id;
        $product->partner_id  = $request->partner_id;
        $product->description  = $request->description;
        $product->published   = $request->published;
        $product->featured    = $request->featured;
        $product->price       = $request->price;
        $product->discount    = $request->discount;

        $fileget = $request->file('file');
        $fileName= time() . '.' . $fileget->getClientOriginalExtension();
        $fileget->move(base_path() . '/public/uploads/', $fileName);


        $product->file = $fileName;

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(base_path() . '/public/uploads/', $imageName);
        $product->image = $imageName;

        $product->save();
        Session::flash('success','New Product added successfully!!');
        return redirect(route('products.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $partners = Partner::all();
        return view('products.edit')->withProduct($product)->withCategories($categories)->withPartners($partners);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return $product->id;
        $request->validate([
            'title'       => 'required|unique:products,id,'.$product->id,   
            //'email' => 'required|unique:users,id,'.$request->get('id'),         
            'desciption'  => 'min:5|max:5000',
            'price'       => 'required|integer',
            'discount'    => 'integer',
            'file'        => 'file',
            'image'       => 'image'            


        ]);

        if($request->hasFile('file') || $request->hasFile('image')){

            $product->title       = $request->title;
            $product->category_id = $request->category_id;
            $product->partner_id  = $request->partner_id;
            $product->description  = $request->description;
            $product->published   = $request->published;
            $product->featured    = $request->featured;
            $product->price       = $request->price;
            $product->discount    = $request->discount;

            $oldfile = $product->file;
            $oldimage = $product->image;
            if($request->hasFile('file')){
            $newFile = $request->file('file');
            $newFileName = time() .'.' . $newFile->getClientOriginalExtension();
            $newFile->move(base_path() . '/public/uploads/',$newFileName);
            Storage::delete($oldfile);
            $product->file = $newFileName;
            }
            if($request->hasFile('image')){
            $newImage = $request->file('image');
            $newImageName = time() . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(base_path() . '/public/uploads/',$newImageName);
            Storage::delete($oldimage);
            $product->image = $newImageName;
            }
            $product->save();

            //return redirect(route('products.index'));

        }else{
            $product->title       = $request->title;
            $product->category_id = $request->category_id;
            $product->partner_id  = $request->partner_id;
            $product->description  = $request->description;
            $product->published   = $request->published;
            $product->featured    = $request->featured;
            $product->price       = $request->price;
            $product->discount    = $request->discount;
            $product->save();
           // return redirect(route('products.index'));
        }
        Session::flash('success','Product updated successfully!!');
        return redirect(route('products.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->file);
        Storage::delete($product->image);
        $product->delete();

        Session::flash('success','Product deleted successfully!!');
        return redirect(route('products.index'));
    }
}
