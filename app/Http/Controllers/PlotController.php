<?php

namespace App\Http\Controllers;

use App\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlotController extends Controller
{
    public function index(){
        $plots = DB::table("plots")->orderBy("plot_id")->get();

        return view("welcome", ["plots" => $plots]);
    }


    public function get(Plot $plot){

    }


    public function update(int $id)
    {
        $request = request();
        $plot_id = $request->get("plot_id");
        $plot_name = $request->get("plot_name");
        $plot_owner = $request->get("plot_owner");
        $plot_location = $request->get("plot_location");
        $plot_members = $request->get("plot_members");
        $plot_permissions = $request->get("plot_permissions");
        $max_members = $request->get("plot_max_members");
        $price = $request->get("plot_price");
        $size = $request->get("plot_size");


        Plot::where("plot_id", $id)->update(["plot_size" => $size, "plot_name" => $plot_name, "plot_owner" => $plot_owner, "plot_location" => $plot_location, "plot_members" => $plot_members, "plot_permissions" => $plot_permissions, "max_members" => $max_members, "plot_price" => $price]);

        return response("Plot is geupdate!");

    }



    public function delete(int $id){

        Plot::where("plot_id", $id)->delete();

        return response("Plot is gedelete.");
    }


    public function create(Request $request){

        if(!Plot::where("plot_id", $request->get("plot_id"))->exists()) {
            $plot = new Plot();
            $plot->plot_id = $request->get("plot_id");
            $plot->plot_name = $request->get("plot_name");
            $plot->plot_owner = $request->get("plot_owner");
            $plot->plot_location = $request->get("plot_location");
            $plot->plot_members = $request->get("plot_members");
            $plot->plot_permissions = $request->get("plot_permissions");
            $plot->max_members = $request->get("plot_max_members");
            $plot->plot_price = $request->get("plot_price");
            $plot->plot_size = $request->get("plot_size");

            $plot->save();

            return response("Plot is opgeslagen.");
        }
        else{
            return response("Plot bestaat al!");
        }
    }




}
