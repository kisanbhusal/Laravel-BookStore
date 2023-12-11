<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function include(){
        if(!auth()->user()){
                    return 0;
                 }
                 else{
                     return  Cart::where('user_id',auth()->user()->id)->where('is_ordered',false)->count();
                 }
    }

   

    public function userregister(){
        $categories= Category::orderBy('priority')->get();
        return view('userregister',compact('categories'));
    }

    public function userstore(Request $request){
            $data = $request->validate([
                'name' => ['required', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
                'phone' => ['required', 'regex:/^(98|97)\d{8}$/'],
                'email' => ['required', 'email', Rule::unique('users')],
                'address' => ['required', 'regex:/^[a-zA-Z]/'],
                'password' => ['required', 'confirmed', 'min:8'],
            ]);
            $data['password']= Hash::make($data['password']);


            if(auth()->user()){
                if(auth()->user()->role=='admin'){
                $data['role']='admin';
                User::create($data);
                return redirect(route('users.index'))->with('success','Admin Create Sucessfully!');
            }
        }
            else{
            $data['role']='users';
            User::create($data);
            return redirect(route('userlogin'));
            }
           
    }
    public function editprofile(Request $id){
        
        $categories=Category::all();
        $itemincart= $this->include();
        $users=User::find($id);
        return view('frontend.editprofile',compact('users','categories','itemincart'));
    }
    public function userupdate(Request $request){
       
        $user = User::find(auth()->user()->id);
        $data = $request->validate([
            'name' => ['required', 'regex:/^(?![0-9])[A-Za-z\s]+$/'],
            'phone' => ['required', 'regex:/^(98|97)\d{8}$/'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'address' => ['required', 'regex:/^[a-zA-Z]/'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // if ($request->has('password')) {
        //     $data['password'] = Hash::make($data['password']);
        // }
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
            $data['role']='admin';
            $user->update($data);
            return redirect(route('adminprofile.index'));
        }
        else{
            $data['role']='users';
            $user->update($data);
            return redirect()->route('userprofile',$user->id);
            } 
    }
         
    }
    
    public function destroy(string $id){
        $user=User::find($id);
        if($user->delete()){
            
        return redirect(route('users.index'))->with('success',' Deleted Sucessfully!');

        }
        else
        return redirect(route('users.index'))->with('success',' Cannot delete this users!');
        }
    
    public function userprofile(Request $id){
       
        $orders=Order::all();
        $categories=Category::all();
        $itemincart= $this->include();
        $users=User::find($id);
        return view('frontend.userprofile',compact('users','categories','itemincart','orders'));
    }
    public function index(){
        $users=User::all();
        return view('users.index',compact('users'));

    }
    public function usercreate(){
        return view('users.create');
    }
    public function adminprofile(){
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
        return view('adminprofile.index');
            }
    }
    
    }
    public function adminedit(){
        if(auth()->user()){
            if(auth()->user()->role=='admin'){
        return view('adminprofile.edit');
            }
    }
    }
}
