<?php
/**
 * @dataProvider data-relative-path.ini
 */

use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$args = Tester\Environment::loadData();

$h = new CzProject\PathHelper;
Assert::same($args['result'], $h->makeRelativePath($args['source'], $args['dest']));
