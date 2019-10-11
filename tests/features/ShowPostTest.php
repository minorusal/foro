<?php

class ShowPostTest extends FeatureTestCase
{
   	function test_a_user_can_see_the_post_details(){

   		$user = $this->defaultUser([
   			'name' => 'Minoru Salazar',
   		]);
   		$post = $this->createPost([
   			'title' => 'Como instalar Laravel',
   			'content' => 'Este es el contenido del post',
   			'user_id' => $user->id
   		]);
   		$this->visit($post->url)
   		->seeInElement('h1', $post->title)
   		->see($post->content)
   		->see('Minoru Salazar');
   	}

   	function test_old_url_are_redirected(){
   		$post = $this->createPost([
   			'title' => 'Old title'
   		]);
   		$url = $post->url;
   		$post->update(['title' => 'New title']);
   		$this->visit($url)
   			->seePageIs($post->url);
   	}
}
