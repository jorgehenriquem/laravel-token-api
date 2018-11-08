<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Comments;

class CommentsTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_create_comment()
    {
        Comments::create([
            'comentario' => 'Comentario_teste',
            'created_by' => 'usuario_teste',
            'user_id' => '000',
        ]);

        $this->assertDatabaseHas('comments',['user_id'=>'000']);
    }
    
}
