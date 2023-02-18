<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\FoodMenu;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;
// use Auth;
use Auth;

class HomeController extends Controller
{
    public function index() {

        if(Auth::id()) {
            return redirect('redirects');
        }else

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

    // Show Cart
    public function showcart(Request $request, $id) {
        $count = Cart::where('user_id', $id)->count();

        if(Auth::id()== $id) {
            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();

            $data = Cart::where('user_id', $id)->join('food_menus', 'carts.food_id', '=', 'food_menus.id')->get();

            return view('showcart', compact('count', 'data', 'data2'));
        } else

            return redirect()->back();
    }

    // Empty show cart
    public function emptyshowcart() {
        return view('show-empty-cart');
    }

    // Remove cart
    public function remove($id) {
        $data= Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    // Order
    public function orderconfirm( Request $request ) {

        foreach($request->food_name as $key=>$food_name){
            $data = new Order();
            $data->food_name= $food_name;
            $data->price=$request->price[$key];
            $data->quantity=$request->quantity[$key];

            $data->user_name=$request->name;
            $data->phone=$request->phone;
            $data->address=$request->address;

            $data->save();
        }

        return redirect()->back();
    }

}
