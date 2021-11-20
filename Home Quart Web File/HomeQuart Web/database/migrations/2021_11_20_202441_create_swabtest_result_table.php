<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwabtestResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swabtest_result', function (Blueprint $table) {
            $table->id();
            $table->string('type_result')->nullable();
            $table->string('swabtest_proof')->nullable();
            $table->timestamps();
        });

        
        DB::table('swabtest_result')->insert([
            ['type_result' => 'Positive'],
            ['type_result' => 'Negative']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swabtest_result');
    }
}
