<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('nama');
            $table->integer('id_skpd')->index();
            $table->timestamps();
        });
        Schema::table('skp',function (Blueprint $table){
            $table->foreign('id_skpd')
                ->on('skpd')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skp',function (Blueprint $table){
            $table->dropForeign('skp_id_skpd_foreign');
        });
        Schema::dropIfExists('skp');
    }
}
