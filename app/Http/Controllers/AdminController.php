<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\FoodMenu;
use App\Models\Reservation;

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
        $data = Reservation::all();
        return view('admin.viewreservation', compact('data'));
    }

}
