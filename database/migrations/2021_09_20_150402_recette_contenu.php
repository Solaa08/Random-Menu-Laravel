<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecetteContenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recette_contenu', function (Blueprint $table) {
            $table->foreignId('ingredient_id')
                ->references('id')
                ->on('ingredient')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('recette_id')
                ->references('id')
                ->on('recette')
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
        Schema::dropIfExists('recette_contenu');
        Schema::table('recette_contenu', function (Blueprint $table) {
            $table->dropForeign('ingredient_id');
            $table->dropForeign('recette_id');
        });
    }
}
