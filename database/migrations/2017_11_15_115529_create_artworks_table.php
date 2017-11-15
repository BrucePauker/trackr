<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artworks', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('title', 45);
            $table->text('description')->nullable();
            $table->string('path_image', 255);
            $table->unsignedInteger('artist_id');
            $table->unsignedDecimal('amount', 8, 2);
            $table->foreign('artist_id')
                ->references('id')->on('artists')
                ->onDelete('cascade');
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
        Schema::dropIfExists('artworks');
    }
}
