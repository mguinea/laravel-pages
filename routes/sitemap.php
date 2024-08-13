<?php

use Illuminate\Support\Facades\Route;
use Mguinea\Pages\Http\Controllers\SitemapController;

Route::get('sitemap.xml', SitemapController::class);
