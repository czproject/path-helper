<?php
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$h = new Cz\PathHelper;

Assert::true($h->isPathCurrent('index.html', '*'));

Assert::true($h->isPathCurrent('en/contact/index.html', 'en/*/index.html'));
Assert::false($h->isPathCurrent('en/about/contact/index.html', 'en/*/index.html'));

Assert::true($h->isPathCurrent('en/contact/index.html', 'en/**/index.html'));
Assert::true($h->isPathCurrent('en/about/contact/index.html', 'en/**/index.html'));

Assert::true($h->isPathCurrent('en/', 'en/*'));
Assert::true($h->isPathCurrent('en/contact.html', 'en/*'));
Assert::true($h->isPathCurrent('en/about/contact/index.html', 'en/**'));

Assert::true($h->isPathCurrent('cs/contact', '*/contact'));
Assert::true($h->isPathCurrent('en/contact', '*/contact'));
Assert::false($h->isPathCurrent('en/about/contact', '*/contact'));

