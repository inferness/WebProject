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
        Schema::create('FollowedCommunity', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('CommunityId');
            $table->foreign('CommunityId')->references('CommunityId')->on('Communities')->onDelete('cascade');
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
