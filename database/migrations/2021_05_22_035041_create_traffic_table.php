<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrafficTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traffic', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("address");
            $table->double("latitude");
            $table->double("longitude");
            $table->integer("vehiclesDensityInMinutes");
            $table->timestamps();
        });
        DB::table('traffic')->insert(
            array(
                ['name' => 'Jl. Setya Budi Selatan','address' => 'Jl. Setya Budi, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.01943076946253','longitude' => '111.46641152842764','vehiclesDensityInMinutes' => '5',],
                ['name' => 'Jl. Setya Budi 1','address' => 'Jl. Setya Budi, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.015751611784646','longitude' => '111.46630100231302','vehiclesDensityInMinutes' => '4',],
                ['name' => 'Jl. Setya Budi 2','address' => 'Jl. Setya Budi, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur 63462','latitude' => '-8.013365321172662','longitude' => '111.46674537723798','vehiclesDensityInMinutes' => '2',],
                ['name' => 'Jl. Setya Budi 3','address' => 'Jl. Setya Budi, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur 63462','latitude' => '-8.011366221894964','longitude' => '111.46705958557014','vehiclesDensityInMinutes' => '7',],
                ['name' => 'Jl. Hayam Wuruk Tengah','address' => 'Jl. Hayam Wuruk, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.008979468348121','longitude' => '111.4674482558978','vehiclesDensityInMinutes' => '4',],
                ['name' => 'Jl. Hayam Wuruk Timur','address' => 'Jl. Hayam Wuruk, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.009196584046236','longitude' => '111.47057423654356','vehiclesDensityInMinutes' => '9',],
                ['name' => 'Jl. Hayam Wuruk Barat','address' => 'Jl. Hayam Wuruk, Bibis, Pager, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.00880835587363','longitude' => '111.4657023730692','vehiclesDensityInMinutes' => '10',],
                ['name' => 'Perempatan Desa Belang','address' => 'Jl. Hayam Wuruk, Pondok, Belang, Bungkal, Kabupaten Ponorogo, Jawa Timur','latitude' => '-8.00859723289362','longitude' => '111.46228599830972','vehiclesDensityInMinutes' => '23',],
                 
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('traffic');
    }
}
