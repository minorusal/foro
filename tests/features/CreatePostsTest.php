<?php

class CreatePostsTest extends FeatureTestCase{

	function test_a_user_create_a_post(){
		// Having
		$route = 'posts.create';
		$title = 'Esta es una pregunta';
		$content = 'Este es el contenido';

		$this->actingAs($user = $this->defaultUser());

		// When
		$this->visit(route($route))
			->type($title, 'title')
			->type($content, 'content')
			->press('Publicar');

		// Then	
		$this->seeInDatabase('posts', [
			'title' => $title,
			'content' => $content,
			'pending' =>true,
			'user_id' => $user->id,
		]);

		// Test a user is redirected to the post details after creating it.
		$this->see($title);
	}


	function test_creating_a_post_requires_authentication(){
		
		// When
		$this->visit(route('posts.create'))
			->seePageIs(route('login'));
	}
}