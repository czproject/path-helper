<?php

declare(strict_types=1);

/**
 * @dataProvider data-is-path-current.ini
 */

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$args = Tester\Environment::loadData();

if ($args['result'] === '1' || $args['result'] === TRUE) {
	Assert::true(PathHelper::isPathCurrent($args['source'], $args['mask']));

} else {
	Assert::false(PathHelper::isPathCurrent($args['source'], $args['mask']));
}
