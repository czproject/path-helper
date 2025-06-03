<?php

declare(strict_types=1);

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

Assert::true(PathHelper::isPathCurrent('index.html', '*'));

Assert::true(PathHelper::isPathCurrent('en/contact/index.html', 'en/*/index.html'));
Assert::false(PathHelper::isPathCurrent('en/about/contact/index.html', 'en/*/index.html'));

Assert::true(PathHelper::isPathCurrent('en/contact/index.html', 'en/**/index.html'));
Assert::true(PathHelper::isPathCurrent('en/about/contact/index.html', 'en/**/index.html'));

Assert::true(PathHelper::isPathCurrent('en/', 'en/*'));
Assert::true(PathHelper::isPathCurrent('en/contact.html', 'en/*'));
Assert::true(PathHelper::isPathCurrent('en/about/contact/index.html', 'en/**'));

Assert::true(PathHelper::isPathCurrent('cs/contact', '*/contact'));
Assert::true(PathHelper::isPathCurrent('en/contact', '*/contact'));
Assert::false(PathHelper::isPathCurrent('en/about/contact', '*/contact'));
