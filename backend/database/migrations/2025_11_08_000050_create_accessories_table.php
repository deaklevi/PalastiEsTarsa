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
        Schema::create('accessories', function (Blueprint $table) {
            $table->id();
            $table->integer("order");
            $table->string("accessory_id", 10);
            $table->string("name", 50);
            $table->text("type");
            $table->text("size");
            $table->text("recommended_type");
            $table->text("manufacturing_technology");
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
        Schema::dropIfExists('accessories');
    }
};
