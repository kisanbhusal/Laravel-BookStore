@extends('layouts.app')
@section('content')
@include('layouts.message')




<h2 class="fond-bold text-4xl text-blue-700">Categories</h2>
<hr class="h-1 bg-blue-200">
<div class="my-4 text-right px-10">
    <a href="{{ route('Categories.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Category</a> 
</div>



<table id="mytable" class="display">
     <thead>
        <th>Order</th>
        <th>Category Name</th>
        <th>Action</th>
     </thead>
     <tbody>
        @foreach ($category as $c)
            
        
        <tr>
            {{-- <td>{{ $c['id'] }}</td>
            <td>{{ $c['name']}}</td> --}}
            <td>{{ $c->priority }}</td>
            <td>{{ $c->name}}</td> 
            
            <td>
                <a href="{{ route('Categories.edit',$c->id) }}"class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400"> <i class="fas fa-edit"></i></a>

                <a onclick="return confirm('Are you sure to delete?')" href="{{ route('Categories.delete',$c->id) }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">  <i class="fas fa-trash-alt mr-1"></i> </a>
                
            </td>
        </tr>
        @endforeach
     </tbody>


</table>
<script>
    new DataTable('#mytable');
</script>
@endsection