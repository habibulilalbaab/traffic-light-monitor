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
        DB::table('intersections')->insert(
            array(
                ['traffic_id' => 1,'name' => 'north','latitude' => '-8.019305321877692','longitude' => '111.46642950303038','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 1,'name' => 'east','latitude' => '-8.019466241188075','longitude' => '111.46651307882316','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 1,'name' => 'south','latitude' => '-8.019544401973004','longitude' => '111.46631342554043','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 2,'name' => 'north','latitude' => '-8.015625294672311','longitude' => '111.46632663052272','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 2,'name' => 'east','latitude' => '-8.015774030868535','longitude' => '111.46647683421774','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 2,'name' => 'south','latitude' => '-8.015874958970715','longitude' => '111.46628371518128','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 3,'name' => 'north','latitude' => '-8.013215246580645','longitude' => '111.466761408639','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 3,'name' => 'east','latitude' => '-8.013376762250285','longitude' => '111.466890377987','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 3,'name' => 'south','latitude' => '-8.013496959916331','longitude' => '111.46670830361333','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 4,'name' => 'north','latitude' => '-8.011230090647476','longitude' => '111.4670760369248','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 4,'name' => 'east','latitude' => '-8.011362750689848','longitude' => '111.46717172797987','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 4,'name' => 'south','latitude' => '-8.01147330069213','longitude' => '111.46703776050276','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 4,'name' => 'west','latitude' => '-8.0113406406858','longitude' => '111.46696439736054','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 5,'name' => 'east','latitude' => '-8.008985411733686','longitude' => '111.46755817033198','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 5,'name' => 'south','latitude' => '-8.009067749192134','longitude' => '111.46744551756072','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 5,'name' => 'west','latitude' => '-8.008964163354596','longitude' => '111.46733018258062','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 6,'name' => 'north','latitude' => '-8.009099362199771','longitude' => '111.47060709983802','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 6,'name' => 'east','latitude' => '-8.009213572186358','longitude' => '111.4706875661032','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 6,'name' => 'west','latitude' => '-8.009192323819189','longitude' => '111.47045153172532','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 7,'name' => 'north','latitude' => '-8.00871675670291','longitude' => '111.46574383919308','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 7,'name' => 'east','latitude' => '-8.00885257615556','longitude' => '111.46587461696838','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 7,'name' => 'west','latitude' => '-8.008824148832012','longitude' => '111.46559392320678','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 8,'name' => 'north','latitude' => '-8.008439237441126','longitude' => '111.46222167144732','waitingTimeInSeconds' => 12,'currentStatus' => 2,],
                ['traffic_id' => 8,'name' => 'east','latitude' => '-8.008597167140588','longitude' => '111.46248003729605','waitingTimeInSeconds' => 12,'currentStatus' => 3,],
                ['traffic_id' => 8,'name' => 'south','latitude' => '-8.008764572555142','longitude' => '111.46232374190608','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
                ['traffic_id' => 8,'name' => 'west','latitude' => '-8.0086066429206','longitude' => '111.46212917009407','waitingTimeInSeconds' => 12,'currentStatus' => 1,],
            ));
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
