<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('air force');
            $table->string('army');
            $table->string('marine');
            $table->string('navy');
            $table->string('coast guard');
            $table->string('speed');
            $table->string('rocket');
            $table->string('weapon');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}

