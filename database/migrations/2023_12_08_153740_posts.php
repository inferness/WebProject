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
        Schema::create('Posts', function (Blueprint $table) {
            $table->string('PostId')->unique();

            $table->string('CommunityId');
            $table->foreign('CommunityId')->references('CommunityId')->on('Communities')->onDelete('cascade');
            $table->string('Title');
            $table->text('Description');
            $table->string('Owner');
            $table->string('ImagePath');
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
