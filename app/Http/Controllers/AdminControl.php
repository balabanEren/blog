<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use function Sodium\compare;

class AdminControl extends Controller
{
    public function index(){
        return view("back.dashboard_admin");
    }

    public function login(){
        return view("back..auth.login");
    }







    public function loginPost(Request $request){
        $validator=Validator::make(
          $request->all(),
          Admin::$rules['login'],
            [],
            []
        );

        if ($validator->fails()){
            return redirect()->back();
        }
        $inputs=$validator->validate();
        $admin=Admin::query()
            ->where('email',$inputs['email'])
            ->where('password',md5($inputs['password']))
            ->first();

        if (!$admin) {
            return redirect()->route("login")->withErrors("error sended");
        }

        Auth::login($admin);
        return redirect()->route('admin_dasboard');

    }
}
