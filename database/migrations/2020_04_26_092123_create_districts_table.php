<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('code', 10)->unique();
            $table->string('name', 100)->index();
            $table->char('seat_id', 20)->index();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE districts AUTO_INCREMENT = 1123');

        DB::table('districts')->insert([
            ['code' => '106/37/4', 'name' => 'Bukit Lanjan', 'seat_id' => '106'],
            ['code' => '106/36/18', 'name' => 'Sunway
            Damansara', 'seat_id' => '106'],
            ['code' => '106/36/14', 'name' => 'Bandar Utama BU
            3 - BU 10', 'seat_id' => '106'],
            ['code' => '106/36/4', 'name' => 'SS 23', 'seat_id' => '106'],
            ['code' => '106/35/11', 'name' => 'Sungai Way Ten-
            gah Dua', 'seat_id' => '106'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
