<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ips', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gateway');
            $table->integer('type')->default(0);
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('mikrotik_id');

            $table->timestamps();

            $table->foreign('group_id')->references('id')
                ->on('groups')->onDelete('cascade');
            $table->foreign('mikrotik_id')->references('id')
                ->on('mikrotiks')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ips');
    }
}
