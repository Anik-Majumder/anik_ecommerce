<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('basicinfos', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('short_desc');
            $table->text('dark_logo');
            $table->text('light_logo');
            $table->string('address');
            $table->string('email');
            $table->integer('phone_1');
            $table->integer('phone_2');
            $table->string('fb_link');
            $table->string('insta_link');
            $table->string('linkdin_link');
            $table->string('youtube_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basicinfos');
    }
};
