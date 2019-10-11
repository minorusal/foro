<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowPostTest extends TestCase
{
   	function test_a_user_can_see_the_post_detail(){

   		$user = $this->defaultUser([
   			'name' => 'Minoru Salazar',
   		]);
   		$post = factory(\App\Post::class)->make([
   			'title' => 'Como instalar Laravel',
   			'content' => 'Este es el contenido del post'
   		]);
   		$user->posts()->save($post);
   		$this->visit($post->url)
   		->seeInElement('h1', $post->title)
   		->see($post->content)
   		->see($user->name);
   	}

   	function test_old_url_are_redirected(){
   		$user = $this->defaultUser();
   		$post = factory(\App\Post::class)->make([
   			'title' => 'Old title'
   		]);
   		$user->posts()->save($post);
   		$url = $post->url;
   		$post->update(['title' => 'New title']);
   		$this->visit($url)
   			->seePageIs($post->url);
   	}
}
