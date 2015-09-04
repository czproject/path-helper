<?php
/**
 * @dataProvider data-absolutize-path.ini
 */

use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathsHelper.php';

$args = Tester\DataProvider::loadCurrent();

$h = new Cz\PathsHelper;
Assert::same($args['result'], $h->absolutizePath($args['path']));
