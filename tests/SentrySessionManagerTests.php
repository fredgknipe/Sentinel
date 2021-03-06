<?php

use Illuminate\Support\Facades\DB;
use Sentinel\Repositories\Session\SentrySessionRepository;
use Sentinel\Repositories\Session\SentinelSessionRepositoryInterface;

class SentrySessionTests extends SentinelTestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->repo = app()->make(SentinelSessionRepositoryInterface::class);
    }

    /**
     * Test the instantiation of the Sentinel SentryUser repository
     */
    public function testRepoInstantiation()
    {
        // Test that we are able to properly instantiate the SentryUser object for testing
        $this->assertInstanceOf(SentrySessionRepository::class, $this->repo);
    }

    /**
     * Test that the seed data exists and is reachable
     */
    public function testDatabaseSeeds()
    {
        // Check that the test data is present and correctly seeded
        $user = DB::table('users')->where('email', 'user@user.com')->first();
        $this->assertEquals('user@user.com', $user->email);
    }

    /**
     * Test the creation of a user using the default configuration options
     */
    public function testCreatingSession()
    {
        // This is the code we are testing
        $result = $this->repo->store([
            'email' => 'user@user.com',
            'password' => 'sentryuser'
        ]);

        // Assertions
        $this->assertTrue($result->isSuccessful());
    }
}
