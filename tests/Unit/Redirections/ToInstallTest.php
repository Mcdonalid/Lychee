<?php

/**
 * SPDX-License-Identifier: MIT
 * Copyright (c) 2017-2018 Tobias Reich
 * Copyright (c) 2018-2025 LycheeOrg.
 */

/**
 * We don't care for unhandled exceptions in tests.
 * It is the nature of a test to throw an exception.
 * Without this suppression we had 100+ Linter warning in this file which
 * don't help anything.
 *
 * @noinspection PhpDocMissingThrowsInspection
 * @noinspection PhpUnhandledExceptionInspection
 */

namespace Tests\Unit\Redirections;

use App\Http\Redirections\ToInstall;
use Tests\AbstractTestCase;

class ToInstallTest extends AbstractTestCase
{
	public function testRedirection(): void
	{
		$response = ToInstall::go();
		self::assertEquals(307, $response->getStatusCode());
		self::assertEquals(route('install-welcome'), $response->headers->get('Location'));
	}
}