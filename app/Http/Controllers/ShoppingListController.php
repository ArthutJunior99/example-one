<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Account;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    public function addList(Request $request)
    {
        $user = $request->session()->get('id');
        $shopList = new ShoppingList();
        $shopList->title=$request->get('name');
        $shopList->description=$request->get('desc');
        $shopList->account_id=$user;
        $shopList->save();
        return redirect('/home');

    }


    public function fetch(Request $req)
    {
        $userId = $req->session()->get('id');
        $account = Account::find($userId);
        $shoppingLists = $account->shoppingLists;
        $capsule = array('data'=>$shoppingLists);
        return view('shoppingList')->with($capsule);
    }
    public function editlist(Request $r)
    {
        $edt_id=$r->id;
        //search for id
        $edt_data=ShoppingList::where('id',$edt_id)->get();
        $capsule = array('e_data'=>$edt_data);
        return view('UpdateList')->with($capsule);

    }
    public function updateShopList(Request $r)
    {
        $upadte_id=$r->uid;
        $title=$r->uname;
        $description=$r->udesc;
        $ac_id=$r->uaccount_id;

        $update=ShoppingList::find($upadte_id);
        $update->title=$title;
        $update->description=$description;
        $update->account_id=$ac_id;
        $updated=$update->save();
        if($updated)
        {
            return redirect('/shoppingList')->with('msg','Data updated');
        }


    }
    public function deletelist(Request $r)
    {
        $del_id=$r->id;
        $delete_data=ShoppingList::find($del_id);

        $deleted=$delete_data->delete();

        if($deleted)
        {
            return redirect('/shoppingList')->with('msg','Data has been deleted');
        }
    }

}
