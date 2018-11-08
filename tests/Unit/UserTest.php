<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_create_user()
    {
        User::create([
            'name' => 'Nome_teste',
            'email' => 'email_teste@teste.com',
            'password' => bcrypt(123456)
        ]);

        $this->assertDatabaseHas('users',['email'=>'email_teste@teste.com']);
    }
    
}
