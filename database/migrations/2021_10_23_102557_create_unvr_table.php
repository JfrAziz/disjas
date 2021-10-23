<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnvrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unvr', function (Blueprint $table) {
            $table->id();
            $table->decimal('unvr', 8, 2);
            $table->decimal('rasio', 8, 2);
            $table->bigInteger('spesimen');
            $table->date('tanggal');
            $table->decimal('reg_unvr', 8, 2);
            $table->decimal('reg_rasio', 8, 2);
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
        Schema::dropIfExists('unvr');
    }
}
