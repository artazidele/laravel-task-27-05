<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuditDataController;

class ItemController extends Controller
{
    // Create new item
    public function createnewitem(Request $request) {
        // check input
        if (trim($request->title) === "" || trim($request->count) === "" || trim($request->price) === "") {
            return view('newitem', [
                "error" => "Visiem ievades laukiem jābūt aizpildītiem."
            ]);
        } elseif (!is_numeric($request->count) || !is_numeric($request->price)) {
            return view('newitem', [
                "error" => "Preces daudzums un cena jānorāda ar skaitļiem."
            ]);
        }
        // save item to database
        $item = new Item;
        $item->title = $request->title;
        $item->count = $request->count;
        $item->price = $request->price;
        $item->save();
        // save audit data to database
        $itemId = $item->id;
        $auditController = new AuditDataController;
        $auditController->addAuditData($itemId, Auth::user()['id'], "create");
        // return user to all item page
        return redirect('table');
    }

    // Show all items
    public function showitemtable(Request $req){
        $items = Item::all();
        // save audit data to database
        $auditController = new AuditDataController;
        $auditController->addAuditData(0, Auth::user()['id'], "read");
        // show all items
        return view('table')->with("items",$items);
    }

    // Delete item from database
    public function deleteitem(Request $req){
        $item = Item::find($req->id);
        // delete item
        $item->delete();
        // save audit data to database
        $auditController = new AuditDataController;
        $auditController->addAuditData($req->id, Auth::user()['id'], "delete");
        // show all items
        return redirect('table');
    }

    // Show edititem.blade.php
    public function edititem(Request $req){
        // find item
        $item = Item::find($req->id);
        // return view with item
        return view('edititem')->with("item",$item);
    }

    // Show one item page
    public function viewitem(Request $req) {
        // find item
        $item = Item::find($req->id);
        // return view with item
        return view('oneitem')->with("item",$item);
    }

    // Update item in the database
    public function updateitem(Request $request){
        // find item in database
        $item = Item::find($request->id);
        // check input
        if (trim($request->title) === "" || trim($request->count) === "" || trim($request->price) === "") {
            return view('edititem',[
                "item" => $item,
                "error" => "Visiem ievades laukiem jābūt aizpildītiem."
            ]);
        } elseif (!is_numeric($request->count) || !is_numeric($request->price)) {
            return view('edititem', [
                "item" => $item,
                "error" => "Preces daudzums un cena jānorāda ar skaitļiem."
            ]);
        }
        // update item
        $item->update([
            'title' => $request->title,
            'count' => $request->count,
            'price' => $request->price,
        ]);
        // save audit data to database
        $auditController = new AuditDataController;
        $auditController->addAuditData($request->id, Auth::user()['id'], "update");
        // show all items
        return redirect('table');
    }

    // Show newitem.blade.php
    public function newitempage() {
        return view('newitem');
    }
}
