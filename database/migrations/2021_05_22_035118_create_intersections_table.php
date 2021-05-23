<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntersectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intersections', function (Blueprint $table) {
            $table->id();
            $table->integer("traffic_id");
            $table->string("name");
            $table->double("latitude");
            $table->double("longitude");
            $table->integer("waitingTimeInSeconds");
            $table->integer("currentStatus"); // enum(RED, YELLOW, GREEN)
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
        Schema::dropIfExists('intersections');
    }
}
