<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recette extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recette', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->index();
            $table->string('nom');
            $table->string('url')->nullable()->default(null);
            $table->foreignId('ingredient_id')
                ->references('id')
                ->on('ingredient')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recette');
        Schema::table('recette', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('ingredient_id');
        });
    }
}
