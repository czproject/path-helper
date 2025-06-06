<?php

declare(strict_types=1);

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

$helper = new PathHelper;
Assert::same('/path/to/file', $helper->absolutizePath('/path/to/to/../file'));
Assert::same('../to', $helper->createRelativePath('/path/to/file', '/path/to'));
Assert::true($helper->isPathCurrent('/path/file', '/path/*'));
