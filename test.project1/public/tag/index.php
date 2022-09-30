<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';

$tags = \Tests\Model\Tag::all();

/** @var $blade */

echo $blade->make('tag/index', compact('tags'))->render();