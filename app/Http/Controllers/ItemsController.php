<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\ShoppingList;
use App\Models\Items;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    function addItem(Request $request)
    {

        $listId = $request->get('lid');
        $item = new Items();
        $shoppingLists = ShoppingList::find($listId);
        $item->name=$request->get('i_name');
        $item->QuantityDescription=$request->get('q_desc');
        $item->Checked=$request->get('checked');
        $item->shopping_list_id=$listId;
        $item->save();
        return redirect('/shoppingList')->with('msg','Data updated');

    }

    function itemCreatePage(Request $request)
    {
        $listId = $request->id;
        $l_data = ShoppingList::where('id',$listId)->get();
        $capsule = array('data' => $l_data);
        return view('createItems')->with($capsule);
    }
    function getItems(Request $r)
    {
        $listId = $r->id;
        $shoppingLists = ShoppingList::find($listId);
        $itemsdata = $shoppingLists->items;
        $capsule = array('data'=>$itemsdata);
        return view('items')->with($capsule);
    }
    function editItem(Request $r)
    {
        $edt_id=$r->id;
        //search for id
        $edt_data=Items::where('id',$edt_id)->get();
        $capsule = array('i_data'=>$edt_data);
        return view('edit_item')->with($capsule);

    }

    public function update(Request $r)
    {
        $upadte_id=$r->uid;
        $name=$r->i_name;
        $QuantityDescription=$r->u_desc;
        $checked=$r->checked;
        $shopId=$r->shop_id;

        $update=Items::find($upadte_id);
        $update->name=$name;
        $update->QuantityDescription=$QuantityDescription;
        $update->Checked=1;
        $update->shopping_list_id=$shopId;
        $updated=$update->save();
        if($updated)
        {
            return redirect('/shoppingList')->with('msg','Data updated');
        }


    }



    public function deleteItem(Request $r)
    {
        $del_id=$r->id;
        $delete_data=Items::find($del_id);

        $deleted=$delete_data->delete();

        if($deleted)
        {
            return redirect('/shoppingList')->with('msg','Data updated');
        }
    }
}
