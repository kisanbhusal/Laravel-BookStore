<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function include(){
        if(!auth()->user()){
                    return 0;
                 }
                 else{
                     return  Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
                 }
    }
    public function cart(){
        $itemincart= $this->include();
        $carts = Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->get();
        foreach($carts as $cart)
        {
            $prd = Product::find($cart->product_id);
            //product stock is less than cart ko qty 
            if($prd->stock < $cart->qty)
            {
                $cc = Cart::find($cart->id);
                //make cart qty equal to product stock
                //product ko stock jati xa teti naii cart maa available hunu paryo.
                $cc->qty = $prd->stock;
                $cc->save();
            }
        }
        $product=Product::all();
        $categories= Category::orderBy('priority')->get();
        return view('frontend.cart',compact('categories','carts','itemincart','product'));
    }

//     public function cart()
// {
//     $itemincart = $this->include();
//     $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
    
//     // Adjust cart quantities based on available stock
//     foreach ($carts as $cart) {
//         $prd = Product::find($cart->product_id);
//         if ($prd->stock < $cart->qty) {
//             $cc = Cart::find($cart->id);
//             $cc->qty = $prd->stock;
//             $cc->save();
//         }
//     }
    
//     $product = Product::all();
//     $categories = Category::orderBy('priority')->get();

//     // Prepare data for the view
//     $viewData = [];
//     foreach ($product as $prd) {
//         $cartItem = $carts->where('product_id', $prd->id)->first();
//         $cartQuantity = $cartItem ? $cartItem->qty : 0;
//         $viewData[] = [
//             'product' => $prd,
//             'cartItem' => $cartItem,
//             'cartQuantity' => $cartQuantity,
//         ];
//     }

//     return view('frontend.cart', compact('categories', 'carts', 'itemincart', 'viewData','product'));
// }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $data=$request->validate([
        'qty'=>'required',
        'product_id'=>'required',
    ]);

    $data['user_id']=auth()->user()->id;

    //check if already exits
    $check=Cart::where('product_id',$data['product_id'])->where('user_id',$data['user_id'])->where('is_ordered',false)->count();
    if($check>0){
           Cart::where('product_id', $data['product_id'])
            ->where('user_id', $data['user_id'])
            ->update(['qty' => $data['qty']]);
            return back()->with('success','Item already in cart');
    }
    
    Cart::create($data);
    return back()->with('success','Item added to cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
 
        $cart = Cart::find($id);
        $data = $request->validate([
            'qty' => 'required',
        ]);
       $cart->update($data);

        return back()->with('success', 'Cart item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id){
        $cart=Cart::find($id);
        $cart->delete();
        return Redirect(route('cart'))->with('success','Item Deleted Sucessfully!');;
        }
}
