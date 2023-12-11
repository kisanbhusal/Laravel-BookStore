<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        //your algorithm here.

        return view('orders.index', compact('orders'));
    }
    public function details($orderid)
    {
        $order = Order::find($orderid);
        $carts = Cart::whereIn('id', explode(',', $order->cart_id))->get();
        return view('orders.details', compact('carts', 'order'));
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $user = User::find($order->user_id);
        if ($status == 'Processing') {
            //Find the carts of this order.
            $carts = $order->cart_id;
            //explode
            $carts = explode(',', $carts);
            foreach ($carts as $cart) {
                //get product for each cart
                $cc = Cart::find($cart);
                $prd = Product::find($cc->product_id);
                $prd->stock -= $cc->qty;
                $prd->save();
                /*
                For Sales of product
                */
                $totalsells = $prd->sales;
                $prd->update([
                'sales' => $totalsells + $cc->qty
                ]);
                /*
                Update or increase
                */
            }
            $data = [
                'name' => $user->name,
                'mailmessage' => 'Your order is in processing',
            ];
            
            Mail::send('frontend.email.email', $data, function ($message) use ($user) {
                $message->to($user->email)->subject(' Order status changed');
            });
        }

        //send mail to user informing the status change of order
        //for processing

        //for completed
        if ($status == 'Completed') {
            $data = [
                'name' => $user->name,
                'mailmessage' => 'Your order is completed',
            ];
          
            Mail::send('frontend.email.email', $data, function ($message) use ($user) {
                $message->to($user->email)->subject('Order status changed');
            });
        }


        //for Cancelled
        if ($status == 'Cancelled') {
            $data = [
                'name' => $user->name,
                'mailmessage' => 'Your order is Cancelled',
            ];
            Mail::send('frontend.email.cancel', $data, function ($message) use ($user) {
                $message->to($user->email)->subject('Order status changed');
            });
        }


        return redirect(route('orders.index'))->with('success', 'Status change to ' . $status);
    }
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
        $data = $request->validate([


            // 'payment_method'=>'required',
            'shipping_address' => 'required',
            'phone' => 'required',
            'person_name' => 'required',
        ]);
        $data['user_id'] = auth()->user()->id;
        $data['order_date'] = date('Y-m-d');
        $data['status'] = 'Pending';
        $data['payment_method'] = $request->payment_method;
        $carts = Cart::where('user_id', auth()->user()->id)->where('is_ordered', false)->get();
        $totalamount = 0;
        foreach ($carts as $cart) {
            $total = $cart->qty * $cart->product->price;
            $totalamount += $total;
        }
        $data['amount'] = $totalamount;
        $ids = $carts->pluck('id')->toArray();
        $data['cart_id'] = implode(',', $ids);
        Order::create($data);
        Cart::whereIn('id', $ids)->update(['is_ordered' => true]);

        //Mail when order is placed
        $data = [
            'name' => auth()->user()->name,
            'mailmessage' => 'New Order has been placed',
        ];
        Mail::send('frontend.email.email', $data, function ($message) {
            $message->to(auth()->user()->email)->subject('New Order Placed');
        });

        return redirect(route('confirmation'))->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $order->delete();

        //Mail when order is cancled
        $data = [
            'name' => $user->name,
            'mailmessage' => 'Your Order has been Deleted',
        ];
        Mail::send('frontend.email.cancel', $data, function ($message) use ($user) {
            $message->to($user->email)->subject(' Order Deleted');
        });
        return redirect(route('orders.index'))->with('success', 'Order deleted Sucessfully!');
    }
    public function khaltiverifiy(Request $request)
    {

        $args = http_build_query(array(
            'token' => $request->_token,
            'amount'  => 1000
        ));

        $url = "https://khalti.com/api/v2/payment/verify/";

        # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $headers = ['Authorization: Key test_secret_key_7c7b42f11a354052a8d4630359e50a24'];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($status_code == 200) {
            

            return response()->json(([
                'success' => 1,
                'redirectto' => '/test',
            ]));
        } else {
            return response()->json([
                'message' => 'Something Went Wrong'
            ]);
        }
    }
}
