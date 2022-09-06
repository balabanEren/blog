<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articleCount(){
        return $this->hasMany("App\Models\article","category_id","id")->count();
    //yukarıdaki has many parametreleri//1) bağlanacağı model// 2)bağlanacağı sütun//3) aricle id de
    }
    use HasFactory;
}
