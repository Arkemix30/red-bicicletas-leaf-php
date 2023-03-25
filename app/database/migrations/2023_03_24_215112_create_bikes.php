<?php

use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateBikes extends Database
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('bikes')) :
            static::$capsule::schema()->create('bikes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('model');
                $table->string('color');
                $table->string('description');
                $table->float('rent_price');
                $table->string('image');
                $table->float('lat');
                $table->float('lng');
                $table->timestamps();
            });
        endif;

        // you can now build your migrations with schemas
        // Schema::build(static::$capsule, dirname(__DIR__) . '/Schema/bikes.json');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('bikes');
    }
}
