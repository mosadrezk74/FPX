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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->index();
            $table->string('name_en')->index();
            $table->string('photo');
             $table->string('nationality')->default('Egypt');
            $table->string('age')->default(21);
            $table->double('height');
            $table->string('position');
            $table->integer('shirt_number') ->nullable();

            $table->unsignedBigInteger('club_id');
            $table->foreign('club_id')
                ->references('id')
                ->on('clubs');


            $table->string('email')->unique();
             $table->string('password');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
