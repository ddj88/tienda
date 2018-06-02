<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
   public function update(){

        $client = auth()->user();
       $cart = auth()->user()->cart;
       $cart->status = 'pending';
       $cart->order_date = Carbon::now();
       $cart->save();


       $admins = User::where('admin', true)->get();
       Mail::to($admins)->send(new NewOrder($client, $cart));

       $notification = "pedido realizado correctamente";

       return back()->with(compact('notification'));


   }
}
