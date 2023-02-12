<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodMenu;
// use Auth;

class HomeController extends Controller
{
    public function index() {
        $foods = FoodMenu::all();
        return view("home", compact('foods'));
    }

    public function redirects() {

        $foods = FoodMenu::all();

        $usertype = Auth::user()->usertype;

        if($usertype=='1'){
            return view('admin.adminhome');
        }else {
            return view('home', compact('foods'));
        }
    }

}
