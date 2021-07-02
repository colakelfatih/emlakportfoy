<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfoys', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('street')->nullable();
            $table->string('block')->nullable();
            $table->string('plot')->nullable();
            $table->string('price')->nullable();
            $table->string('centare')->nullable();
            $table->string('name')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('portfoys');
    }
}
