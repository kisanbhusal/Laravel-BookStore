<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products= Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        $categories = Category::all();

         $authors = Author::all();

       $publishers = Publisher::all();
        return view('product.create',compact('publishers','categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' => 'required|unique:products|string|max:255',
            'language'=>'required|string|max:255',
            'price'=>'required|numeric|min:1',
            'oldprice'=>'nullable|numeric',
            'stock'=>'required|numeric|min:1',
            'description'=>'required',
            'category_id'=>'required',
            'author_id'=>'required',
            'publisher_id'=>'required',
            'photopath'=>'required|image|mimes:jpeg,png,jpg'

        ]);

        if($request->hasFile('photopath'))
        {
          $image=$request->file('photopath');
          $name=time().'.'.$image->getClientOriginalExtension();
          $destinatioPath =public_path('/images/products');
          $image->move($destinatioPath,$name);
          $data['photopath']=$name;

        }
        Product::create($data);
        return redirect(route('product.index'))->with('success','Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product= Product::find($id);
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
    return view('product.edit',compact('product','categories','authors','publishers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data=$request->validate([
            'name' => 'required|unique:products|string|max:255',
            'language'=>'required|string|max:255',
            'price'=>'required|numeric|min:1',
            'oldprice'=>'nullable|numeric',
            'stock'=>'required|numeric|min:1',
            'description'=>'required',
            'category_id'=>'required',
            'author_id'=>'required',
            'publisher_id'=>'required',
            'photopath'=>'required|image|mimes:jpeg,png,jpg'

        ]);
        $product= Product::find($id);
        if($request->hasFile('photopath'))
        {
          $image=$request->file('photopath');
          $name=time().'.'.$image->getClientOriginalExtension();
          $destinatioPath =public_path('/images/products');
          $image->move($destinatioPath,$name);
          $data['photopath']=$name;
    }
    $product->update($data);
        return redirect(route('product.index'))->with('success','Product Update Sucessfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $product=Product::find($id);
        $product->delete();
        File::delete(public_path('/images/gallery/'.$product->photopath));
        return redirect(route('product.index'))->with('success','Product Deleted Sucessfully!');;
    }
}
