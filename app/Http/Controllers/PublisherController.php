<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publisher=Publisher::all();
        $publisherCount = $publisher->count();
        return view('publisher.index',compact('publisher','publisherCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data=$request->validate([
            'name'=>'required|unique:publishers',
           // 'priority'=>'required|numeric'
        ]);
        Publisher::create($data);
        return redirect(route('publisher.index'))->with('success','Publisher created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher= Publisher::find($id);
        return view('publisher.edit',compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|unique:publishers,name,' . $id,
           // 'priority'=> 'required|numeric'
        ]);
    
        $publisher= Publisher::find($id);
        $publisher->update($data);
        return redirect(route('publisher.index'))->with('success','Publisher Update Sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $publisher=Publisher::find($id);
        $relatedProducts = $publisher->products;
        if ($relatedProducts->count() > 0) {
            return redirect(route('publisher.index'))->with('success', 'Cannot delete the publisher. Related products exist.');
        }else{
        return redirect(route('publisher.index'))->with('success','Publisher Deleted Sucessfully!');
    }
    }
}

