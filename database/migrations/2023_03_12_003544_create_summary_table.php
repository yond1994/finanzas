<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary', function (Blueprint $table) {
            $table->id();
            $table->timestamp('created_at')->nullable();
            $table->text('concept');
            $table->enum('type', ['add', 'out', 'transfer'])->nullable();
            $table->double('amount')->nullable();
            $table->double('tax')->nullable();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('categories_id');
            $table->string('factura', 100)->nullable();
            $table->unsignedBigInteger('id_attr')->nullable();
            $table->unsignedBigInteger('id_transfer')->nullable();
            $table->unsignedBigInteger('tours_id')->nullable();
            $table->unsignedBigInteger('id_attr_tours')->nullable();
            $table->unsignedBigInteger('id_autor');
            $table->enum('future', ['1', '2'])->default('1');
            $table->timestamps();
        });
        Schema::table('summary', function (Blueprint $table) {
            $table->foreign('account_id')->references('id')->on('account')->onDelete('no action')->onUpdate('no action');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary');
    }
}
