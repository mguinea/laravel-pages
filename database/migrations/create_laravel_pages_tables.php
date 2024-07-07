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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('localization');
            $table->boolean('default');
        });

        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('base');
            $table->timestamps();
        });

        Schema::create('views', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->string('title');
            $table->string('description');
            $table->datetime('published_at')->nullable();
            $table->string('robotIndex')->default('Index');
            $table->string('robotFollow')->default('Follow');
            $table->string('canonical');
            $table->longText('content');
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');


            $table->unsignedBigInteger('entry_id');
            $table->foreign('entry_id')->references('id')->on('entries');

            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on('locales');

            $table->unsignedBigInteger('view_id');
            $table->foreign('view_id')->references('id')->on('views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
        Schema::dropIfExists('entries');
        Schema::dropIfExists('views');
        Schema::dropIfExists('pages');
    }
};
