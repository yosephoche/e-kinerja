<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiSkpTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai_skp_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('skp_task_id')->unsigned()->index();
            $table->string('nip')->index();
            $table->timestamp('tgl_penunjukan');
            $table->timestamp('tgl_tunda')->useCurrent();
            $table->timestamp('tgl_selesai')->useCurrent();
            $table->timestamps();
        });

        Schema::table('pegawai_skp_tasks',function (Blueprint $table){
            $table->foreign('skp_task_id')
                ->on('skp_task')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('nip')
                ->on('pegawai')
                ->references('nip')
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
        Schema::dropIfExists('pegawai_skp_tasks');
    }
}
