@extends('layouts.app')
@section('content')
<h2  class="font-bold text-4xl" text-blue-700>Dashboard</h2>
<hr class="h-1 bg-blue-200">


<div class="mt-4 grid grid-cols-3 gap-10">
    <a href="{{ route('product.index') }}" class="px-4 py-8 rounded-lg bg-blue-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total Books</p>
        <p class="font-bold text-5xl">{{ $totalbooks }}</p>
    </a>

    <a href="{{ route('author.index') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total Authors</p>
        <p class="font-bold text-5xl">{{ $totalauthors }}</p>
    </a>

    <a href="{{ route('Categories.index') }}" class="px-4 py-8 rounded-lg bg-red-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total Categories</p>
        <p class="font-bold text-5xl">{{ $totalcategories }}</p>
    </a>

    <a href="{{ route('publisher.index') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total Publishers</p>
        <p class="font-bold text-5xl">{{ $totalpublishers }}</p>
    </a>

    <a href="{{ route('users.index') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total Users</p>
        <p class="font-bold text-5xl">{{ $users }}</p>
    </a>

    <a href="{{ route('orders.index') }}" class="px-4 py-8 rounded-lg bg-green-600 text-white felx justify-between">
        <p class="font-bold text-lg">Total order</p>
        <p class="font-bold text-5xl">{{ $order }}</p>
    </a>
</div>
<!DOCTYPE html>
<html>
<head>
  <title>Line Chart with Tailwind CSS</title>
  
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  {{-- <div class="container mx-auto px-4 py-8">
    <canvas id="myLineChart" class="w-full h-64"></canvas>
  </div> --}}
  <div class=" text-left mx-8 mt-10">
    <!-- Chart wrapper -->
    <input type="month" onchange="changemonth(this.value)" value="{{date('Y-m')}}">
  </div>
  <div class="text-right mx-4">
    <h2 class="font-bold text-4xl">Monthly Update</h2>
    <p>Total Sales: <span id="totalSales">{{ $totalSales }}</span></p>
    <p>Total Profit: <span id="totalProfit">{{ $totalProfit }}</span></p>
    <p>Total Orders: <span id="totalOrders">{{ $totalOrders }}</span></p>
</div>



  <div class="container mx-auto px-4 py-8">
    
    <canvas id="myLineChart" class="w-full h-100 mt-4"></canvas>
  </div>

  <script>

function changemonth(date){

$.ajax({
      url: "{{ route('changemonth')}}", // Replace with your server API endpoint
      method: "POST",
      dataType: "json",
      data:{
        month:date,
        _token:"{{csrf_token()}}"
      },
      success: function(response) {
        // Update the content with the fetched data
      //  console.log(response.sales);
       myLineChart.data.datasets[0].data=response.sales; 
       myLineChart.data.datasets[1].data=response.profits; 
       myLineChart.data.datasets[2].data=response.ordercounts; 

        
       myLineChart.data.labels=response.orderdates; 



       myLineChart.update();
       document.getElementById("totalSales").textContent = response.totalSales;
      document.getElementById("totalProfit").textContent = response.totalProfit;
      document.getElementById("totalOrders").textContent = response.totalOrders;


       console.log(response);

      },
      error: function(jqXHR, textStatus, errorThrown) {
        // Handle error if the request fails
        console.error("AJAX request failed: " + textStatus, errorThrown);
      }
    });
}
    // Sample data for the line chart
    const labels = @json($orderdates);
    const totalSalesData = @json($sales); // Replace with your total sales data for each day of the month
    const totalProfitData = @json($profits); // Replace with your total profit data for each day of the month
    const totalOrdersData = @json($ordercount); // Replace with your total orders data for each day of the month

    // Configuration options
    const options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    };

    // Get the canvas element and initialize the chart
    const ctx = document.getElementById('myLineChart').getContext('2d');
    const myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Total Sales',
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            data: totalSalesData,
            fill: true,
          },
          {
            label: 'Total Profit',
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            data: totalProfitData,
            fill: true,
          },
          {
            label: 'Total Orders',
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            data: totalOrdersData,
            fill: true,
          },
        ]
      },
      options: options
    });



    console.log(myLineChart.data.labels);
    
  </script>
</body>
</html>

@endsection

