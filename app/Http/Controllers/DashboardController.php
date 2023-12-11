<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   

    public function dashboard(){
        $totalbooks = Product::count();
        $totalauthors = Author::count();
         $totalcategories= Category::count();
         $totalpublishers= Publisher::count();
         $users= User::count();
         $order=Order::count();
        


        
        $chartdata =DB::table('carts')
        ->selectRaw('DATE(carts.created_at) AS date')
        ->selectRaw('COUNT(DATE(carts.created_at)) as orders')
        ->selectRaw('SUM(derived_products.profit) as profit')
        ->selectRaw('SUM(derived_products.sales) as sales')
        ->joinSub(function ($query) {
            $query->selectRaw('id, (oldprice - price) as profit, price as sales')
                ->from('products');
        }, 'derived_products', function ($join) {
            $join->on('carts.product_id', '=', 'derived_products.id');
        })
        ->groupBy('date')
        ->get();

        $month = date('Y-m');

        $chartdata = $chartdata->whereBetween('date', [$month . '-01', $month . '-31']);
        
  

        $orderdates=$chartdata->pluck('date');
        $profits=$chartdata->pluck('profit');
        $sales=$chartdata->pluck('sales');
        $ordercount=$chartdata->pluck('orders');
        

          $totalSales = $chartdata->sum('sales');
          $totalProfit = $chartdata->sum('profit');
          $totalOrders = $chartdata->sum('orders');





        return view('dashboard',compact('totalauthors','totalbooks','totalcategories','order','users','totalpublishers','orderdates','profits','sales','ordercount','totalSales','totalProfit','totalOrders'));


    }
    public function changemonth(Request $request){



        $chartdata =DB::table('carts')
               ->selectRaw('DATE(carts.created_at) AS date')
               ->selectRaw('COUNT(DATE(carts.created_at)) as orders')
               ->selectRaw('SUM(derived_products.profit) as profit')
               ->selectRaw('SUM(derived_products.sales) as sales')
               ->joinSub(function ($query) {
                   $query->selectRaw('id, (oldprice - price) as profit, price as sales')
                       ->from('products');
               }, 'derived_products', function ($join) {
                   $join->on('carts.product_id', '=', 'derived_products.id');
               })
               ->groupBy('date')
               ->get();
       
               $month = $request->month;
               
               $chartdata = $chartdata->whereBetween('date', [$month . '-01', $month . '-31']);
               
         
       
               $orderdates=$chartdata->pluck('date');
               $profits=$chartdata->pluck('profit');
               $sales=$chartdata->pluck('sales');
                 $ordercount=$chartdata->pluck('orders');
       
          // Calculate total sales, total profit, and total orders
          $totalSales = $sales->sum();
          $totalProfit = $profits->sum();
          $totalOrders = $ordercount->sum();
       
          $response = [
              'orderdates' => $orderdates,
              'profits' => $profits,
              'sales' => $sales,
              'ordercounts' => $ordercount,
              'totalSales' => $totalSales,
              'totalProfit' => $totalProfit,
              'totalOrders' => $totalOrders
          ];
       
       
       
       
               return response()->json($response);
       
       
           }
       }

