<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attached', function (Blueprint $table) {
            $table->id();
            $table->text('path');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->comment('fecha de edicion');
            $table->unsignedBigInteger('summary_id');
            $table->foreign('summary_id')->references('id')->on('summary')->onDelete('cascade');
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
        Schema::dropIfExists('attached');
    }
}
