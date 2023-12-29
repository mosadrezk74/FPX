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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->index();
            $table->string('name_en')->index();
            $table->string('photo');
            $table->string('nationality')->default('Egypt');
            $table->string('age')->default(21);

            $table->unsignedBigInteger('club_id')->index();
            $table->foreign('club_id')
                ->references('id')
                ->on('clubs')

                ->onDelete('cascade');

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
        Schema::dropIfExists('coaches');
    }
};
