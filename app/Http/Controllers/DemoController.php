<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DemoController extends Controller
{
    //step 1:
    function addAccount(Request $request)
    {
        $account = new Account();
        $account->email=$request->get('email');
        $account->password=$request->get('pass');
        //Hash::make($request->newPassword)
        $created = $account->save();
        if($created)
        {
            return redirect('/Login')->with('msg','Account successfully created, please login');
        }
        echo "new user created ";
    }
    function readAll(Request $request)
    {
        return Account::all();
    }
    //read specific user
    function readUser(Request $request,$id)
    {
        $account = Account::find($id)->first();
        return $account;

    }
    //login settings
    public function Login()
    {
        return view('Login');

    }
    public function checkAccount(Request $req)
    {
        $email=$req->in_email;
        $pass=$req->in_pass;

       /* $session= Account::where('email',$email)->where('password',$pass)->get();
        if(count($session)>0)
        {
            $req->session()->put('id',$session[0]->id);
            $req->session()->put('email',$session[0]->email);

            return redirect('/home');
        }
        else
        {
            return redirect('/Login')->with('msg','Email or Password incorrect');
        }*/
    }

    public function protect(Request $r)
    {
        if($r->session()->get('account_id')== " ")
        {
            return redirect('/Login');
        }
        else
        {
            $user = $r->session()->get('email');
            $capsule = array('email'=> $user);

            return view('home')->with($capsule);
        }
    }
    /*public function profile(Request $req)
    {

        if($req->session()->get('account_id')== " ")
        {
            return redirect('/Login');
        }
        else
        {
            $user = $req->session()->get('email');
            $id = $req->session()->get('id');
            $capsule = array('email'=> $user,'id'=>$id);
            return view('profile')->with($capsule);
        }

    } */
    public function shoppingListdata(Request $req)
    {

        //$session= shoppingList::where('title',$title)->where('description',$desc)->get();
        /*
        if($req->session()->get('account_id')== " ")
        {
            return redirect('/Login');
        }
        else
        {
            $user = $req->session()->get('email');
            $id = $req->session()->get('id');
            $capsule = array('email'=> $user,'id'=>$id);
            return view('shoppingList')->with($capsule);
        }
        */
    }
    public function editAcc(Request $r)
    {

        $edt_id=$r->id;
        //search for id
        $edt_data=Account::where('id',$edt_id)->get();
        $capsule = array('u_data'=>$edt_data);

        return view('edit_acc')->with($capsule);
    }
    public function  logout(Request $req)
    {
        /*
        $req->session()->forget('id');
        $req->session()->forget('email');*/
        return redirect('/login');

    }
    //
    public function displayUserShoppingList(Request $req)
    {
        /*
        if($req->session()->get('account_id')== " ")
        {
            return redirect('/Login');
        }
        else{
        $userId = $req->session()->get('id');
        $account = Account::find($userId);
        $shoppingLists = $account->shoppingLists;
        $query = shopping_lists::table('shopping_lists')->where('account_id','=', $userId)->get();


        return $shoppingLists;
        }
        */
    }
    public function updateUserAccount(Request $r)
    {
        $upadte_id=$r->uid;
        $name=$r->n_name;
        $email=$r->n_email;
        $pass=$r->Hash::make(n_pass);


        $user = Auth::user()->id;
        $update=User::find($upadte_id);
        $update->name=$name;
        $update->email=$email;
        $update->password=$pass;
        $updated=$update->save();
        if($updated)
        {
            return redirect('/login')->with('msg','Data updated');
        }
    }
    public function deleteAcc(Request $r)
    {
        $del_id=$r->id;
        $delete_data=User::find($del_id);

        $deleted=$delete_data->delete();

        if($deleted)
        {
            return redirect('/Login')->with('msg','Data has been deleted');
        }
    }

}
