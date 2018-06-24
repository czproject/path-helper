<?php

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

Assert::same('/path/to/file', PathHelper::normalizePath('\\path\\to\\file'));
