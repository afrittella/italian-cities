<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('italian_states', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('italian_region_id')->unsigned()->index();
            $table->string('code', 3);
            $table->string('code_metro', 3);
            $table->boolean('is_metropolitan')->default('0')->comment('flag metropolitan city');
            $table->string('name', 255);
            $table->string('abbreviation', 2);

            $table->foreign('italian_region_id')->references('id')->on('italian_regions')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('italian_states');
    }
}
