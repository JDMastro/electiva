<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            
            $table->bigInteger('startup_id')->unsigned();

            $table->bigInteger('statu_id')->unsigned();

            $table->string('requeriments');

            $table->string('case_study');

            $table->foreign('statu_id')->references('id')->on('status')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            
                  $table->foreign('startup_id')->references('id')->on('startups')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');


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
        Schema::dropIfExists('requests');
    }
}
