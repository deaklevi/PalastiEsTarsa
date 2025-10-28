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
        Schema::create('urna_tombstones', function (Blueprint $table) {
            $table->id();
            $table->integer("order");
            $table->string("tombstone_id", 10);
            $table->string("name", 50);
            $table->text("description");
            $table->string("image_name", 25);
            $table->string("group", 50)->nullable();
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
        Schema::dropIfExists('urna_tombstones');
    }
};
