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
        Schema::create('Communities', function (Blueprint $table) {
            $table->string('CommunityId')->unique();
            $table->string('Name');
            $table->text('Description');
            $table->string('Owner');
            $table->integer('FollowerCount')->default(0);
            $table->timestamp('CreatedAt')->useCurrent();
            $table->string('BannerPath');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
