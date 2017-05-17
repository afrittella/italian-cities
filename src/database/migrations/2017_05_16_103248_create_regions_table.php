<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('italian_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 3);
            $table->string('name');

            $table->index('name', 'name');
            $table->index('code', 'code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('italian_regions');
    }
}
