<?php
/**
 * @dataProvider data-is-path-current.ini
 */

use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathsHelper.php';

$args = Tester\DataProvider::loadCurrent();

$h = new Cz\PathsHelper;
if ($args['result'] === '1') {
	Assert::true($h->isPathCurrent($args['source'], $args['mask']));
} else {
	Assert::false($h->isPathCurrent($args['source'], $args['mask']));
}
