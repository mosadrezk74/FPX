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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->index()->unique();
            $table->string('name_ar')->index()->unique();
            $table->string('image')->nullable();
            $table->integer('date_of_creation')->nullable()->default(1907);
            $table->boolean('status')->default(1);
            $table->string('stadium_name')->nullable()->default('others');



            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('coach_id');
//            $table->foreign('coach_id')
//                ->references('id')
//                ->on('coaches')->onDelete('cascade');
//


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
