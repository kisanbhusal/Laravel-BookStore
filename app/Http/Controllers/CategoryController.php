<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('categories.index',compact('category'));
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request ){
       
        $data = $request->validate([
            'name'=>'required|unique:categories',
            'priority'=> 'required|numeric'
        ]);
       
        Category::create($data);
        return redirect(route('Categories.index'))->with('success','Categoey Create Sucessfully!');
    }
public function edit($id){
    $category= Category::find($id);
    return view('Categories.edit',compact('category'));

}
public function update(Request $request,$id){
    $data = $request->validate([
        'name'=>'required|unique:categories,name,' . $id,
        'priority'=> 'required|numeric'
    ]);

    $category= Category::find($id);
    $category->update($data);
    return redirect(route('Categories.index'))->with('success','Categoey Update Sucessfully!');
    
}
public function delete(Request $request){
    $category=Category::find($request->id);
    if(Product::where('category_id',$category->id)->count() > 0)
    {
        return back()->with('success','Cannot Delete this Category.Related products exist.');
    }
    $category->delete();
    return Redirect(route('Categories.index'))->with('success','Category Deleted Sucessfully!');
    }
}
