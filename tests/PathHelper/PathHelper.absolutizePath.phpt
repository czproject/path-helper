<?php

declare(strict_types=1);

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

Assert::same('/', PathHelper::absolutizePath(''));
Assert::same('/', PathHelper::absolutizePath('..'));
Assert::same('/', PathHelper::absolutizePath('.'));

Assert::same('/lorem/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/ipsum/dolor/sit'));

Assert::same('/lorem/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././ipsum/dolor/sit'));
Assert::same('/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././dolor/../../ipsum/dolor/sit'));

Assert::same('/ipsum/dolor/sit', PathHelper::absolutizePath('./../.././lorem/././dolor/../../ipsum/dolor/sit/../sit/amet/..'));

Assert::same('ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././dolor/../../ipsum/dolor/sit', NULL));
