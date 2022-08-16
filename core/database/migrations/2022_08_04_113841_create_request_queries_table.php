<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_queries', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nallable();
            $table->string('name')->nallable();
            $table->string('email')->nallable();
            $table->string('phone')->nallable();
            $table->longText('message')->nallable();
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
        Schema::dropIfExists('request_queries');
    }
}
