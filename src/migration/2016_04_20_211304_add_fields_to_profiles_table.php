<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(Schema::hasTable('profiles')){

          Schema::table('profiles', function ($table) {

            $table->string('uid');
            $table->string('username');
            $table->string('provider'); 
            $table->string('access_token');

        });

       }else{

        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('uid');
            $table->string('username');
            $table->string('provider'); 
            $table->string('access_token');          
            $table->timestamps();
        });

       }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
