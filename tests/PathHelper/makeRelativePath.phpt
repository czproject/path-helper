<?php
/**
 * @dataProvider data-relative-path.ini
 */

use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathsHelper.php';

$args = Tester\DataProvider::loadCurrent();

$h = new Cz\PathsHelper;
Assert::same($args['result'], $h->makeRelativePath($args['source'], $args['dest']));
