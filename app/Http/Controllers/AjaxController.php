<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function run(){

        $plots = DB::table("plots")->orderBy("plot_id")->get();


        return view("ajax.index", ["plots" => $plots]);
    }
}
