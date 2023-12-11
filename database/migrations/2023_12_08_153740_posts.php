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
            $table->integer('UpvoteCount')->default(0);
            $table->string('UserId')->references('UserId')->on('User')->onDelete('cascade');
            $table->string('ImagePath');
            $table->boolean('HasImage');
            $table->timestamp('PostedAt')->useCurrent();
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
