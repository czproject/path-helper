<?php

declare(strict_types=1);

/**
 * @dataProvider data-relative-path.ini
 */

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$args = Tester\Environment::loadData();

Assert::same($args['result'], PathHelper::createRelativePath($args['source'], $args['dest']));
