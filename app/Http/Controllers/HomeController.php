<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodMenu;
use App\Models\Chef;
use App\Models\Cart;
// use Auth;

class HomeController extends Controller
{
    public function index() {
        $foods = FoodMenu::all();
        $chefs = Chef::all();
        return view("home", compact('foods', 'chefs'));
    }

    public function redirects() {

        $foods = FoodMenu::all();
        $chefs = Chef::all();

        $usertype = Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.adminhome');
        }else {

            $user_id=Auth::id();

            $count = Cart::where('user_id', $user_id)->count();

            return view('home', compact('foods', 'chefs', 'count'));
        }
    }

// Add to cart
    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user_id = Auth::id();

            $food_id =$id;
            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id=$user_id;
            $cart->food_id=$food_id;
            $cart->quantity=$quantity;

            $cart->save();

            return redirect()->back();
        }
        else {
            return redirect('/login');
        }
    }

}
