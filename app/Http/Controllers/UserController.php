<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Product;

class UserController extends Controller
{
    public function balance(){
        $bal = DB::table('users')->where('id', Auth::id())->value('balance');
        //$bal = User::find(1)->balance()->get();
        return $bal;
    }

    public function changeBal($id, $chaBal){
        $currentBal = balance($id);
        $newBal = $currentBal +($chaBal);
        DB::table('users')->where('id', $id)->update(['balance' => $chaBal]);
        return response()->json([
            'balance' => $bal
            ]);
    }

    public function shop(){
        $userBal = $this->balance();
        $products = DB::table('products')->get();
        return view('pointshop')->with('userBal', $userBal)->with('products', $products);
        //return response()->json($products);
    }
}
