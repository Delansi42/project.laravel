<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../config/blade.php';


if(!isset($_GET['id'])){
    throw new Error('not found');
}

$tag = \Tests\Model\Tag::find($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tag->title = $_POST['title'];
    $tag->slug = $_POST['slug'];
    $tag->save();
    header('Location: index.php');
}

/** @var $blade */

echo $blade->make('tag/update', compact('tag'))->render();