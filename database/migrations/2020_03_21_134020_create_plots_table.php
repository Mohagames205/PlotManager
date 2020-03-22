<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->id();
            $table->integer("plot_id");
            $table->string("plot_name");
            $table->string("plot_owner")->nullable();
            $table->json("plot_location");
            $table->json("plot_members");
            $table->json("plot_permissions")->nullable();
            $table->integer("max_members");
            $table->string("plot_price")->nullable();
            $table->json("plot_size");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plots');
    }
}
