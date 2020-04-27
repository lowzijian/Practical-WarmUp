<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('code', 10)->unique();
            $table->string('name', 100)->index();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE seats AUTO_INCREMENT = 104');

        DB::table('seats')->insert([
            ['code' => 'P104', 'name' => 'Subang'],
            ['code' => 'P105', 'name' => 'Petaling Jaya'],
            ['code' => 'P106', 'name' => 'Damansara'],
            ['code' => 'P107', 'name' => 'Sungai Buloh'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seats');
    }
}
