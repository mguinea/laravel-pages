<?php

use Illuminate\Support\Facades\Route;
use Mguinea\Pages\Http\Controllers\SitemapController;

Route::get('sitemap.xml', SitemapController::class);
// Route::get('robots.txt'); // TODO use laravel-robots, administrate in backoffice
