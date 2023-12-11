@extends('layouts.app')
@section('content')
@include('layouts.message')




<h2 class="fond-bold text-4xl text-blue-700">Users</h2>
<hr class="h-1 bg-blue-200">

<div class="my-4 text-right px-10">
    <a href="{{ route('users.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Admin</a> 
</div>



<table id="mytable" class="display">
     <thead>
        <th>S.N</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Role</th>
        <th>Action</th>
     </thead>
     <tbody>
        @foreach ($users as $user)
            
        
        <tr>
            
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name}}</td> 
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->role }}</td>
            <td>

                <a onclick="return confirm('Are you sure to delete?')" href="{{ route('users.delete',$user->id) }}"class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a>
            </td>
        </tr>
        @endforeach
     </tbody>


</table>
<script>
    new DataTable('#mytable');
</script>
@endsection