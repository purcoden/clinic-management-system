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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
			$table->integer('clinic_id');
			$table->string('first_name');
			$table->string('no_str');
			$table->double('experience')->nullable();
			$table->string('twitter_url');
			$table->string('linkedin_url');
			$table->string('instagram_url');
			$table->string('profile_image');
            $table->timestamps;

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
