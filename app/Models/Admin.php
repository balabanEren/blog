<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
class Admin extends Authenticable
{
    public static $rules=[
      'add'=>[
          'name'=>'required',
          'email'=>'required|email|unique',
          'password'=>'required| min:6',

      ] ,

        'login'=>[
            'email'=>'required |email',
            'password'=>'required | min:6',
        ]
        ];
    use HasFactory;
}
