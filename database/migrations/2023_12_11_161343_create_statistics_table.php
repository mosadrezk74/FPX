<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')->onDelete('cascade');
            $table->integer('matches_played');
            $table->integer('goals');
            $table->double('xg');
            $table->integer('assists');
            $table->double('xa');
            $table->string('heatmap');
            $table->integer('passes');
            $table->integer('clean_sheets');
            $table->integer('red_cards');
            $table->integer('yellow_cards');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
