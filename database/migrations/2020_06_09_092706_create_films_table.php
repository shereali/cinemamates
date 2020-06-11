<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user_id')->default(0);
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('release')->default(0)->comment('0 = Not Release, 1 = Release');
            $table->dateTime('date')->nullable();
            $table->tinyInteger('rating')->default(0);
            $table->bigInteger('ticket')->nullable();
            $table->float('price', 11, 2)->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('genre_id')->nullable();
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('films');
    }
}
