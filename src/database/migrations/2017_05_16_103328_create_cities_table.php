<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('italian_cities', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('italian_state_id')->unsigned()->index();
            $table->boolean('is_chieftown')->default('0');
            $table->string('code_istat', 6);
            $table->string('code_cadastre', 4);
            $table->string('name', 255);

            $table->foreign('italian_state_id')->references('id')->on('italian_states')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('italian_cities');
    }
}
