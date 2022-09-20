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
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('produ_cod');
            $table->string('produ_nombre')->nullable();
            $table->integer('cat_cod');
            $table->foreign('cat_cod')->references('cat_cod')->on('categorias');
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
        Schema::dropIfExists('productos');
    }
};
