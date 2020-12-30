<?php

namespace Fifthgate\Calendarservice\Tests;

use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;

class CalendarServiceTestCase extends BaseTestCase
{
	public $baseUrl = 'http://localhost';

    /**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		$app['config']->set('key', 'base64:j84cxCjod/fon4Ks52qdMKiJXOrO5OSDBpXjVUMz61s=');
	    // Setup default database to use sqlite :memory:
	    $app['config']->set('database.default', 'testbench');
	    $app['config']->set('database.connections.testbench', [
	        'driver'   => 'sqlite',
	        'database' => ':memory:',
	        'prefix'   => '',
	    ]);
	}

	/**
	 * Setup the test environment.
	 */
	protected function setUp(): void {
	    parent::setUp();
	    $this->loadLaravelMigrations();
	}

    protected function getPackageProviders($app) {
	    return ['Fifthgate\GDPR\GDPRServiceProvider'];
	}

	/**
	 * Setup the test environment.
	 */
	protected function setUp(): void {
	    parent::setUp();
	}
}