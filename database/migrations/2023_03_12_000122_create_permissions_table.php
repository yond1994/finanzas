<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
                $table->id();
                $table->integer('id_user');
                $table->integer('saldo')->nullable();
                $table->integer('movimientos')->nullable();
                $table->integer('categoria')->nullable();
                $table->integer('cuentas')->nullable();
                $table->integer('usuario')->nullable();
                $table->integer('transferencia')->nullable();
                $table->integer('tours')->nullable();
                $table->integer('m_futuros')->nullable();
                $table->integer('bitacora')->nullable();
                $table->integer('adjuntos')->nullable();
                $table->integer('pdf')->nullable();
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
        Schema::dropIfExists('permissions');
    }
}
