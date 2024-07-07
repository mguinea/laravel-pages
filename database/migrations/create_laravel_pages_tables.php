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
        $tableNames = config('laravel-pages.table_names');

        Schema::create($tableNames['locales'], function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('localization');
            $table->boolean('default');
        });

        Schema::create($tableNames['entries'], function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->timestamps();
        });

        Schema::create($tableNames['views'], function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create($tableNames['pages'], function (Blueprint $table) use ($tableNames) {
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
            $table->foreign('user_id')->references('id')->on($tableNames['users']);

            $table->unsignedBigInteger('entry_id');
            $table->foreign('entry_id')->references('id')->on($tableNames['entries']);

            $table->unsignedBigInteger('locale_id');
            $table->foreign('locale_id')->references('id')->on($tableNames['locales']);

            $table->unsignedBigInteger('view_id');
            $table->foreign('view_id')->references('id')->on($tableNames['views']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tableNames = config('laravel-pages.table_names');

        Schema::dropIfExists($tableNames['locales']);
        Schema::dropIfExists($tableNames['entries']);
        Schema::dropIfExists($tableNames['views']);
        Schema::dropIfExists($tableNames['pages']);
    }
};
