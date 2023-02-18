<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FoodMenu;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\Order;
use Auth;

class AdminController extends Controller
{
    public function user() {
        $data = user::all();
        return view('admin.users', compact('data'));
    }

    public function delete($id) {
        $data= user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu(){
        $foods = FoodMenu::all();

        return view('admin.foodmenu', compact('foods'));
    }

    public function editfoodmenu($id){
        $food = FoodMenu::find($id);

        return view('admin.updatefoodmenu', compact('food'));
    }

    public function updatefoodmenu(Request $request, $id){
        $food = FoodMenu::find($id);

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $food->image=$imagename;

        $food->food_name=$request->foodname;
        $food->price=$request->price;
        $food->description=$request->description;

        $food->save();
        return redirect()->back();
    }


    public function upload(Request $request) {

        $data= new FoodMenu();

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage', $imagename);

        $data->image=$imagename;

        $data->food_name=$request->foodname;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();
        return redirect()->back();
    }

    public function deletefoodmenu($id) {
        $food= FoodMenu::find($id);
        $food->delete();
        return redirect()->back();
    }

    // Reservation
    public function reservation(Request $request) {

        $data= new Reservation();

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;

        $data->save();
        return redirect()->back();
    }

    public function viewreservation() {
        if(Auth::id()) {
            $data = Reservation::all();
            return view('admin.viewreservation', compact('data'));
        }else
        return redirect('login');
    }

    // chefs
    public function viewchefs() {
        $chefs = Chef::all();
        return view('admin.chefs', compact('chefs'));
    }

    public function uploadchef(Request $request) {

        $chef= new Chef();

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage', $imagename);

        $chef->image=$imagename;

        $chef->name=$request->name;
        $chef->speciality=$request->speciality;

        $chef->save();
        return redirect()->back();
    }

    public function editchef($id){
        $chef = Chef::find($id);

        return view('admin.updatechef', compact('chef'));
    }

    public function updatechef(Request $request, $id){
        $chef = Chef::find($id);

        $image = $request->image;

        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage', $imagename);
            $chef->image=$imagename;
        }

        $chef->name=$request->name;
        $chef->speciality=$request->speciality;

        $chef->save();
        return redirect()->back();
    }

    public function deletechef($id) {
        $chef = Chef::find($id);
        $chef->delete();
        return redirect()->back();
    }

    public function orders(){
        $orders= Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Search
    public function search(Request $request){
        $search = $request->search;

        $orders= Order::where('user_name', 'Like', '%'.$search.'%')->orWhere('food_name', 'Like', '%'.$search.'%')->get();

        return view('admin.orders', compact('orders'));
    }

}
