<?php

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

Assert::same('/', PathHelper::absolutizePath(''));
Assert::same('/', PathHelper::absolutizePath('..'));
Assert::same('/', PathHelper::absolutizePath('.'));

Assert::same('/lorem/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/ipsum/dolor/sit'));

Assert::same('/lorem/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././ipsum/dolor/sit'));
Assert::same('/ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././dolor/../../ipsum/dolor/sit'));

Assert::same('/ipsum/dolor/sit', PathHelper::absolutizePath('./../.././lorem/././dolor/../../ipsum/dolor/sit/../sit/amet/..'));

Assert::same('ipsum/dolor/sit', PathHelper::absolutizePath('lorem/././dolor/../../ipsum/dolor/sit', NULL));
