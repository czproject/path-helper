<?php

use CzProject\PathHelper;
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

Assert::same('.', PathHelper::createRelativePath('index.html', ''));
Assert::same('.', PathHelper::createRelativePath('', ''));
Assert::same('..', PathHelper::createRelativePath('contact/index.html', '')); // ..

Assert::same('../root/index.html', PathHelper::createRelativePath('index.html', '../root/index.html'));
Assert::same('root/index.html', PathHelper::createRelativePath('index.html', 'root/index.html'));

Assert::same('index.html', PathHelper::createRelativePath('index.html', 'index.html')); // or ''

Assert::same('contact.html', PathHelper::createRelativePath('index.html', 'contact.html'));
Assert::same('docs/', PathHelper::createRelativePath('index.html', 'docs/'));
Assert::same('v1.0.0/', PathHelper::createRelativePath('docs/', 'docs/v1.0.0/'));
Assert::same('docs/v1.0.0/', PathHelper::createRelativePath('docs', 'docs/v1.0.0/')); // ??
Assert::same('docs/v0.9/index.html', PathHelper::createRelativePath('index.html', 'docs/v0.9/index.html'));

Assert::same('ka', PathHelper::createRelativePath('root/ro/ka', 'root/ro/ka'));
Assert::same('.', PathHelper::createRelativePath('root/ro/ka/', 'root/ro/ka/'));
Assert::same('ka/', PathHelper::createRelativePath('root/ro/ka', 'root/ro/ka/'));
Assert::same('../ka', PathHelper::createRelativePath('root/ro/ka/', 'root/ro/ka'));
Assert::same('../ka', PathHelper::createRelativePath('ka/', 'ka'));

Assert::same('../help/', PathHelper::createRelativePath('docs/', 'help/'));
Assert::same('help', PathHelper::createRelativePath('docs', 'help'));
Assert::same('../../index.html', PathHelper::createRelativePath('docs/v0.9/index.html', 'index.html'));
Assert::same('../../help/v1.0.0/download/index.html', PathHelper::createRelativePath('docs/v0.9/index.html', 'help/v1.0.0/download/index.html'));
Assert::same('../v1.0.0/download/step-1.html', PathHelper::createRelativePath('docs/v0.9/index.html', 'docs/v1.0.0/download/step-1.html'));

Assert::same('download.html', PathHelper::createRelativePath('docs/v0.9/index.html', 'docs/v0.9/download.html'));

Assert::same('../sub', PathHelper::createRelativePath('section/sub/page', 'section/sub'));
Assert::same('../../section', PathHelper::createRelativePath('section/sub/page', 'section'));

