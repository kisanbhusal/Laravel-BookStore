@extends('frontend.layouts.maincontainer')
<style>
  .profile-card {
    max-width: 350px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
   
  }
  .profile-picture {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 10px;
    object-fit: cover;
  }
  .profile-name {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  .profile-info {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
    text-align:left;
  }
</style>
@section('main-container')
  


  <div class="container">
    
      
    <h2 class="text-center">Your Profile</h2>
    <div class="profile-card" style="margin-bottom: 3rem;" >
      <img class="profile-picture" src="https://st3.depositphotos.com/15648834/17930/v/450/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg" alt="Profile Picture">
      <div class="profile-info">
        <p>Name:{{ auth()->user()->name }}</p>
        <p>Email:{{ auth()->user()->email}} </p>
        <p>Location:{{ auth()->user()->address}}</p>
        <p>Phone:{{ auth()->user()->phone}}</p>
        <a href="{{ route('editprofile',  auth()->user()->id ) }}"  class="btn btn-primary">Edit Profile</></a>
        <a  class="btn btn-primary" href="{{ route('confirmation') }}">My Orders</a>
      </div>
     
    </div>
     
    
    </div>
  


 @endsection
