<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$categories = \Tests\Model\Category::all();

/** @var $blade */

echo $blade->make('category/index-category', compact('categories'))->render();