<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Product;
use Illuminate\Http\Request;
use Session;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::all();
        return view('partners.index')->withPartners($partners);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partners.create');
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
            'partner_name' => 'required|unique:partners|min:3|max:100'
        ]);

        $partner = new Partner;
        $partner->partner_name = $request->partner_name;
        $partner->save();

        Session::flash('success','New partner created successfully!!');
        return redirect(route('partners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('partners.edit')->withPartner($partner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'partner_name' => 'required|unique:partners|min:3|max:100'
        ]);
        $partner->partner_name = $request->partner_name;
        $partner->save();

        Session::flash('success','Partner updated successfully!!');
        return redirect(route('partners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {

        $products= $partner->products()->get(); 
        if($products){
            foreach($products as $object)
            {
                unlink('uploads/'.$object->image);
                unlink('uploads/'.$object->file);           
            }

            Product::where('partner_id',$partner->id)->delete();
            $partner->delete();
        }else{
            $partner->delete();
        }

        Session::flash('success','Partner deleted successfully!!');
        return redirect(route('partners.index'));
        
    }
}
