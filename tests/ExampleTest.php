<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Minoru Salazar',
            'email' => 'minorusal@hotmail.com',
        ]);
        $this->actingAs($user, 'api')
            ->visit('api/user')
            ->see('Minoru Salazar')
            ->see('minorusal@hotmail.com');
    }
}
