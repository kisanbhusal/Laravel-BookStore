<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;



class PagesController extends Controller
{
   
    //Frontend/pagescontroller

    public function include(){
        if(!auth()->user()){
                    return 0;
                 }
                 else{
                     return  Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
                 }
    }

    public function index(){
        $itemincart= $this->include();
        $users=User::all();
        $products = Product::all();
       // $products = Product::paginate(8);
        // Get all products from the database
        $topeightproducts = Product::all();

        // Perform Bubble Sort based on the 'totalsells' column
        $n = count($topeightproducts);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($topeightproducts[$j]->totalsells < $topeightproducts[$j + 1]->totalsells) {
                    // Swap the products if they are in the wrong order
                    $temp = $topeightproducts[$j];
                    $topeightproducts[$j] = $topeightproducts[$j + 1];
                    $topeightproducts[$j + 1] = $temp;
                }
            }
        }

        // Paginate the sorted products and pass them to the view
        $perPage = 2;
        $currentPage = request()->input('page', 1);
        $topeightproducts = collect($topeightproducts)->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $topeightproducts = new \Illuminate\Pagination\LengthAwarePaginator($topeightproducts, count($topeightproducts), $perPage, $currentPage);
        
        
        $categories = Category::orderBy('priority')->get();
    return view('frontend.index',compact('products','categories','users','itemincart','topeightproducts'));
    }


    public function search(Request $request)
    {
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        $searchText = $request->input('searchtext');
        $products = Product::where('name', 'like', '%' . $searchText . '%')
        ->orWhereHas('author', function ($query) use ($searchText) {
            $query->where('name', 'like', '%' . $searchText . '%');
        })
        ->orWhereHas('publisher', function ($query) use ($searchText) {
            $query->where('name', 'like', '%' . $searchText . '%');
        })
        ->orWhereHas('category', function ($query) use ($searchText) {
            $query->where('name', 'like', '%' . $searchText . '%');
        })
        ->with('author', 'publisher', 'category') 
        ->get();

        foreach ($products as $product) {
            $authorName = $product->author->name;       // Author's name for each product
            $publisherName = $product->publisher->name; // Publisher's name for each product
            $categoryName = $product->category->name;   // Category's name for each product
        }

        return view('frontend.search',compact('products','itemincart','categories'));
    }

    public function about(){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.about',compact('categories','itemincart'));
    }
    public function contact(){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.contact',compact('categories','itemincart'));
    }
    public function userlogin(){ 
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.userlogin',compact('categories','itemincart'));
    }
   
    public function userregister(){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.userregister',compact('categories','itemincart'));
    }

    public function userstore(Request $request){
            $data = $request->validate([
                'name'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'email'=>'required',
                'password'=>['required','confirmed',Rules\password::defaults()],
            ]);
            $data['password']= Hash::make($data['password']);
            $data['role']='user';
            User::create($data);
            return redirect(route('login'));
    }
    
    
    public function viewproduct(Product $product ){
        $itemincart= $this->include();
        $products = Product::all();
        $relatedproducts=Product::where('category_id',$product->category_id)->whereNot('id',$product->id)->get();
         $categories= Category::orderBy('priority')->get();
         return view('frontend.viewproduct',compact('product','categories','itemincart','relatedproducts'));
    }
    
    public function confirmation(){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        $orders= Order::where('user_id',auth()->user()->id)->get();
        
        foreach($orders as $order){
            $cartids=explode(',',$order->cart_id);
            $carts=[];
            foreach($cartids as $cartid){
                $cart=Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts=$carts;
        }
        return view('frontend.confirmation',compact('orders','categories','itemincart'));
    }
    public function checkout(){
        $carts = Cart::all();
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.checkout',compact('categories','itemincart','carts'));
    }

    public function categoryproduct($name){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        $category = Category::where('name',$name)->first();
        $products = Product::where('category_id',$category->id)->get();
        return view('frontend.categoryproduct',compact('category','products','categories','itemincart'));
    }

    public function orders(){
        $itemincart= $this->include();
        $categories= Category::orderBy('priority')->get();
        $orders= Order::where('user_id',auth()->user()->id)->get();
        foreach($orders as $order){
            $cartids=explode(',',$order->cart_id);
            $carts=[];
            foreach($cartids as $cartid){
                $cart=Cart::find($cartid);
                array_push($carts,$cart);
            }
            $order->carts=$carts;
        }
        return view('userorder',compact('orders','categories','itemincart'));
    }
    
}
