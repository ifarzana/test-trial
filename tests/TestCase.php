<?php

namespace Tests;

use Tests\Traits\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginAsUser() {
        $this->actingAs($this->createUser());
    }

    public function createUser()
    {
        return factory(\App\User::class, 1)->create([
            'company' => 'OnSecurity',
        ])->first();
    }

    /**
     * Override
     * Boot the testing helper traits.
     *
     * @return array
     */
    protected function setUpTraits()
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[DatabaseMigrations::class])) {
            $this->runDatabaseMigrations();
        }

        return parent::setupTraits();
    }
}
