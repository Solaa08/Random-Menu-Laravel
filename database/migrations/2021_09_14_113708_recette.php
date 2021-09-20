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
            $table->id();
            $table->string('nom');
            $table->string('url')->nullable()->default(null);
            $table->string('type');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('recette');
        Schema::table('recette', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('ingredient_id');
        });
    }
}
