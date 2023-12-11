@extends('layouts.app')
@section('content')
@include('layouts.message')




<h2 class="fond-bold text-4xl text-blue-700">Orders</h2>
<hr class="h-1 bg-blue-200">



<table id="mytable" class="display">
     <thead>
        <th>Order Data</th>
        <th> Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Amount</th>
        <th>Payment Method</th>
        <th>Status</th>
        <th>Action</th>
     </thead>
     <tbody>
        @foreach ($orders as $order)
            
        
        <tr>
           <td>{{ $order->order_date }}</td>
           <td>{{ $order->person_name }}</td>
           <td>{{ $order->phone }}</td>
           <td>{{ $order->shipping_address }}</td>
           <td>{{ $order->amount }}</td>
           <td>{{ $order->payment_method }}</td>
           <td>{{ $order->status }}</td>
            <td>
               
                
                <a href="{{ route('order.details',$order->id) }}"class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fa-sharp fa-solid fa-eye"></i></a>

                @if( $order->status=='Pending' )
                <a onclick="return confirm('Are you sure to change status')" href="{{ route('order.status',[$order->id,"Processing"] )}}"class="bg-green-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-spinner fa-spin mr-1"></i></a>

                <a onclick="return confirm('Are you sure to change status')" href="{{ route('order.status',[$order->id,"Cancelled"] )}}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-times-circle mr-1"></i></a>

                @elseif ( $order->status=='Processing')
                <a onclick="return confirm('Are you sure to change status')" href="{{ route('order.status',[$order->id,"Completed"] )}}"class="bg-green-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fa-solid fa-check"></i></a>
                
                @endif
            </td>
        </tr>
        @endforeach
     </tbody>


</table>
<script>
    new DataTable('#mytable');
</script>
@endsection