<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Product;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(){
        $authors=Author::all();
        return view('author.index',compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|unique:authors',
           // 'priority'=>'required|numeric'
        ]);
        Author::create($data);
        return redirect(route('author.index'))->with('success','Author created successfully!');

    }

    public function edit($id)
    {
        $author= Author::find($id);
        return view('author.edit',compact('author'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|unique:authors,name,' . $id,
           // 'priority'=> 'required|numeric'
        ]);
    
        $author= Author::find($id);
        $author->update($data);
        return redirect(route('author.index'))->with('success','Author Update Sucessfully!');
    }

    public function delete(Request $request){
        $author=Author::find($request->id);
        if(Product::where('author_id',$author->id)->count() > 0)
    {
        return back()->with('success','Cannot Delete this Author.Related products exist.');
    }
    $author->delete();
        return redirect(route('author.index'))->with('success','Author Deleted Sucessfully!');
    }
        
        
}
