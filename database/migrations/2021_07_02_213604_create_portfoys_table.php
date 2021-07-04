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
            $table->string('kategori')->nullable();
            $table->string('portfoy_tip')->nullable();
            $table->string('ilan_baslik')->nullable();
            $table->string('ilan_aciklama')->nullable();
            $table->string('mahalle')->nullable();
            $table->integer('ada')->nullable();
            $table->integer('parsel')->nullable();
            $table->integer('fiyat')->nullable();
            $table->integer('metrekare')->nullable();
            $table->integer('oda')->nullable();
            $table->integer('bina')->nullable();
            $table->integer('kat')->nullable();
            $table->integer('banyo')->nullable();
            $table->integer('balkon')->nullable();
            $table->string('isinma')->nullable();
            $table->string('isimsoyisim')->nullable();
            $table->string('telefon')->nullable();
            $table->text('not')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
