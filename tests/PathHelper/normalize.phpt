<?php

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

Assert::same('/path/to/file', PathHelper::normalizePath('\\path\\to\\file'));
