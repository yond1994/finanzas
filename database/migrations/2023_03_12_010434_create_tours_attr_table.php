<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours_attr', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->double('price');
            $table->integer('id_tours');
            $table->timestamps();
        });
        
        Schema::table('tours_attr', function (Blueprint $table) {
            $table->index('tours_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours_attr');
    }
}
