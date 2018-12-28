<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkpTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp_task', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('task');
            $table->integer('id_skp')->index();
            $table->timestamps();
        });
        Schema::table('skp_task',function (Blueprint $table){
            $table->foreign('id_skp')
                ->on('skp')
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
        Schema::table('skp_task',function (Blueprint $table){
            $table->dropForeign('skp_task_id_skp_foreign');
        });
        Schema::dropIfExists('skp_task');
    }
}
