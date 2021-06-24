<?php

namespace App\Http\Controllers;
use App\Contact;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request) {

        if (Auth::check() && $request->path() == 'login' || $request->path() == 'register') {
            return redirect('/');
        }
        return view('website.index');
    }
    public function register(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =bcrypt( $request->password);
        $user->save();
    }
    public function login(Request $request) {

//        return $password = bcrypt($request->password);

        if (Auth::attempt(['email' => $request->email,'password' => $request->password])) {
            return response()->json([
                'msg' => 'You are logged in',
                'status' => true
            ]);
        }else {
            return response()->json([
                'msg' => 'Incorrect Login Detail',
                'status' => false
            ]);
        }
    }
    public function logout() {
       return  Auth::logout();
    }
    public function get_profile() {
        $user_id = Auth::user()->id;
        $profile = User::where('id',$user_id)->first();
        $city = DB::table('cities')->where('id',$profile->city_id)->value('city_name');
        $country = DB::table('countries')->where('id',$profile->country_id)->value('name');
        $cities = DB::table('cities')->get();
        $countries = DB::table('countries')->get();
        return response()->json(
            [
                'countries' =>$countries,
                'cities' => $cities,
                'user' => $profile,
                'city_name' => $city,
                'country_name'=>$country
            ]);
    }
    public function update_profile(Request $request) {
        $user_id = Auth::user()->id;
        if (trim($request->password) != '') {
            $password = bcrypt($request->password);
           User::where('id',$user_id)->update(['password'=>$password]);
        }
        // Upload Image Code
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/img/chat'), $imageName);
            User::where('id',$user_id)->update(['image'=>$imageName]);
        }

        $user = User::where('id',$user_id)
                        ->update([
                            'name' => $request->name,
                            'contact' => $request->contact,
                            'country_id' => $request->selected_country,
                            'city_id' => $request->selected_city,
                        ]);
        return $user;
    }

    public function contact_us(Request $request) {
        $contact = new Contact();
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->description = $request->description;
        if ($contact->save()) {
            return response()->json(['status' => true ]);
        }else {
            return response()->json(['status' => false ]);
        }
    }
}
