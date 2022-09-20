<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->increments('cat_cod');
            $table->string('cat_nombre')->nullable();
            $table->char('baja',1);
            $table->integer('usua_reg')->nullable();
            $table->date('fecha_reg')->nullable();
            $table->integer('usua_mod')->nullable();
            $table->date('fecha_mod')->nullable();
            $table->integer('usua_baja')->nullable();
            $table->date('fecha_baja')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
