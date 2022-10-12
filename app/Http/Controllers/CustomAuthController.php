<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Hash;
use Session;
use App\Models\User;
use App\Models\Users;



class CustomAuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function apiLogin(Request $request)
    {

        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');
        if(!(Auth::attempt($credentials))){
            return response(['message'=> 'invalid credentials']);


        }
        $user = Auth::user();
        $id= $user->id;
        $data= User::where('id',$id)->get();
        $token = Auth::user()->createToken('Token')->accessToken;

        $capsule = array('data'=> $data);


        return response(['user'=> Auth::user(), 'access token'=> $token]);


    }
    public function customLogin(Request $request)
    {
         $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $credentials = $request->only('email','password');
        if(!(Auth::attempt($credentials))){
            return response(['message'=> 'invalid credentials']);
                //redirect('home')->with(

        }
        $user = Auth::user();
        $id= $user->id;
        $data= User::where('id',$id)->get();
        $token = Auth::user()->createToken('Token')->accessToken;
        //return response(['user'=> Auth::user(), 'access token'=> $token])->view('home');
        $capsule = array('data'=> $data);


        $response =Response::view('home')->header('Content-Type',$capsule);
        return $response;
        //return redirect('home')->with($capsule);
        //return response(['user'=> Auth::user(), 'access token'=> $token]);



    }

    public function Registration()
    {
        return view('auth.registration');
    }
    public function customRegistration(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',//unique user in database
            'password'=>'required|min:6',

        ]);
        $data = $request->all();
        $check = $this->create($data);//creates all data?

        return redirect("login")->withSuccess('You have signed-in');
    }

    public function apiRegistration(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',//unique user in database
            'password'=>'required|min:6',

        ]);
        $data = $request->all();
        $check = $this->create($data);//creates all data?


            return response('regResult:'. $data,200);

    }

    public function create(Array $data)
    {
        return User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'remember_token' => Str::random(60)
         ]);
    }

    public function home()
    {
        if(Auth::check())
        {
            return view('home');
        }
        return redirect('login')->withSuccess('You are not allowed to access');
    }

    public function profile(Request $req)
    {
        $user = Auth::user();
        $id= $user->id;
        if($req->$id== " ")
        {
            return redirect('/Login');
        }
        else
        {
            $account = $user->email;
            $id = $user->id;
            $capsule = array('email'=> $account,'id'=>$id);
            return view('profile')->with($capsule);
        }
    }

    public function signout()
    {
        Session:flush();
        Auth::logout();
        return redirect('login');

    }



}
