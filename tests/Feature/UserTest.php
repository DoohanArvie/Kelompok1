<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /** @test */
    public function it_checks_if_user_name_is_a_string()
    {
        $user = new User();
        $user->name = 'John Doe';

        $this->assertIsString($user->name);
    }
}
