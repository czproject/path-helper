<?php
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$h = new Cz\PathHelper;

Assert::same('/', $h->absolutizePath(''));
Assert::same('/', $h->absolutizePath('..'));
Assert::same('/', $h->absolutizePath('.'));

Assert::same('/lorem/ipsum/dolor/sit', $h->absolutizePath('lorem/ipsum/dolor/sit'));

Assert::same('/lorem/ipsum/dolor/sit', $h->absolutizePath('lorem/././ipsum/dolor/sit'));
Assert::same('/ipsum/dolor/sit', $h->absolutizePath('lorem/././dolor/../../ipsum/dolor/sit'));

Assert::same('/ipsum/dolor/sit', $h->absolutizePath('./../.././lorem/././dolor/../../ipsum/dolor/sit/../sit/amet/..'));

Assert::same('ipsum/dolor/sit', $h->absolutizePath('lorem/././dolor/../../ipsum/dolor/sit', NULL));
