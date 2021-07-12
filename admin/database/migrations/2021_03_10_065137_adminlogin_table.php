<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminloginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
Schema::create('admin',function(Blueprint $table){
    $table->bigIncrements('id');
    $table->string('name');
$table->string('passwords');
    $table->string('userName');
    $table->string('email');

});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
