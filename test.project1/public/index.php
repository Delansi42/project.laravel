<?php
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/database.php';

use Tests\Model\Category;
use Tests\Model\Post;
use Tests\Model\Tag;

//$model = Category::all();
//print_r($model);

//$model = new Category();
//$model->title = 'test2';
//$model->slug = 'test2';
//$model->save();

//$model = Category::find(6);
//$model->update();
//$model->title = '111';
//$model->slug = '111';
//$model->save();

//$model = Category::find(3);
//$model->delete();

//$model = Category::find(5);
//$post = new Post();
//$post->title = 'test10';
//$post->slug = 'test10';
//$post->body = 'test10';
//$post->category_id =$model->id;
//$post->save();

//$post = Post::find(6);
//$post->update();
//$post->title = '111';
//$post->slug = '111';
//$post->body = '111';
//$post->category_id = 1;
//$post->save();

//$post = Post::find(5);
//$post->delete();

//$tag = new Tag();
//$tag->title = 'test9';
//$tag->slug = 'test9';
//$tag->save();

//$post = Post::find(10);
//$post->tags()->sync([10,9,8]);

$posts = Post::all();
foreach ($posts as $post){
    echo $post->id .' '. $post->title .': <br>';
    foreach ($post->tags as $tag){
        echo $tag->title .': <br>';
    }
}
