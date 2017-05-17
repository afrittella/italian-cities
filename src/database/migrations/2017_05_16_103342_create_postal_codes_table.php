<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostalCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('italian_postal_codes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('italian_city_id')->unsigned()->index();
            $table->string('code', 6);

            $table->unique(['italian_city_id', 'code'],'italian_city_id_2');

            $table->foreign('italian_city_id')->references('id')->on('italian_cities')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('italian_postal_codes');
    }
}
