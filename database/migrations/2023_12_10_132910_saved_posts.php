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
        //
        Schema::create('savedPosts', function (Blueprint $table) {
            $table->string('UserId');
            $table->foreign('UserId')->references('UserId')->on('User');

            $table->string('PostId');
            $table->foreign('PostId')->references('PostId')->on('Posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
