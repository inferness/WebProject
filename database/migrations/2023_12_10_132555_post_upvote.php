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
        Schema::create('userUpvote', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // $table->string('PostId');
            // $table->foreign('PostId')->references('PostId')->on('Posts')->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
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
