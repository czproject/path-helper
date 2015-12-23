<?php
/**
 * @dataProvider data-absolutize-path.ini
 */

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$args = Tester\Environment::loadData();

Assert::same($args['result'], PathHelper::absolutizePath($args['path']));
