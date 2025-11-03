<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tombstones', function (Blueprint $table) {
            $table->id();
            $table->integer("order");
            $table->string("tombstone_id", 10);
            $table->string("name", 50);
            $table->text("description");
            $table->string("image_url", 255)->nullable();
            $table->string("group", 50);
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
        Schema::dropIfExists('tombstones');
    }
};
