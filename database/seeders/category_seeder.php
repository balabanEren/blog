<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class category_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catİnsert=["Travel","Science","Sport","Daily","Fun"];
        foreach ($catİnsert as $cat){
            DB::table("categories")->insert([
                "name"=>$cat,
                "slug"=>"Undefined",
                "created_at"=>now(),
                "updated_at"=>now(),
            ]);
        }

    }
}
