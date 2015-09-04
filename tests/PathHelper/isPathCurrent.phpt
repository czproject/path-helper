<?php
/**
 * @dataProvider data-is-path-current.ini
 */

use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$args = Tester\Environment::loadData();

$h = new Cz\PathHelper;
if ($args['result'] === '1') {
	Assert::true($h->isPathCurrent($args['source'], $args['mask']));
} else {
	Assert::false($h->isPathCurrent($args['source'], $args['mask']));
}
