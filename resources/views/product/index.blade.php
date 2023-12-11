@extends('layouts.app')
@section('content')
@include('layouts.message')




<h2 class="fond-bold text-4xl text-blue-700">Product</h2>
<hr class="h-1 bg-blue-200">
<div class="my-4 text-right px-10">
    <a href="{{ route('product.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Product</a> 
</div>



<table id="mytable" class="display">
     <thead>
        <th>S.N</th>
        <th>Product Name</th>
        <th>Language</th>
        <th>Picture</th>
        <th>Description</th>
        <th>Old Price</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
        <th>Author</th>
        <th>Publisher</th>
        <th>Action</th>
     </thead>
     <tbody>
        @foreach ($products as $product)
            
        
        <tr>
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name}}</td> 
            <td>{{ $product->language }}</td>
            <td><img  class="w-20" src="{{ asset('images/products/'.$product->photopath) }}" alt="" ></td>
            <td>{{ $product->description}}</td>
            <td>{{ $product->oldprice}}</td>
            <td>{{ $product->price}}</td>
            <td>{{ $product->stock}}</td>
            <td>{{ $product->category->name}}</td>  
            <td>{{ $product->author->name}}</td>
            <td>{{ $product->publisher->name}}</td>       
            
            <td>
                
                <a href="{{ route('product.edit',$product->id) }}"class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Are you sure to delete?')" href="{{ route('product.delete',$product->id) }}"class="bg-red-600 text-white px-2 py-1  rounded shadow hover:shadow-red-400">  <i class="fas fa-trash-alt mr-1"></i> </a>
           
            </td>
        </tr>
        @endforeach
     </tbody>


</table>
<script>
    new DataTable('#mytable');
</script>
@endsection
