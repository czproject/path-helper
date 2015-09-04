<?php
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$h = new CzProject\PathHelper;

Assert::same('.', $h->createRelativePath('index.html', ''));
Assert::same('.', $h->createRelativePath('', ''));
Assert::same('..', $h->createRelativePath('contact/index.html', '')); // ..

Assert::same('../root/index.html', $h->createRelativePath('index.html', '../root/index.html'));
Assert::same('root/index.html', $h->createRelativePath('index.html', 'root/index.html'));

Assert::same('index.html', $h->createRelativePath('index.html', 'index.html')); // or ''

Assert::same('contact.html', $h->createRelativePath('index.html', 'contact.html'));
Assert::same('docs/', $h->createRelativePath('index.html', 'docs/'));
Assert::same('v1.0.0/', $h->createRelativePath('docs/', 'docs/v1.0.0/'));
Assert::same('docs/v1.0.0/', $h->createRelativePath('docs', 'docs/v1.0.0/')); // ??
Assert::same('docs/v0.9/index.html', $h->createRelativePath('index.html', 'docs/v0.9/index.html'));

Assert::same('ka', $h->createRelativePath('root/ro/ka', 'root/ro/ka'));
Assert::same('.', $h->createRelativePath('root/ro/ka/', 'root/ro/ka/'));
Assert::same('ka/', $h->createRelativePath('root/ro/ka', 'root/ro/ka/'));
Assert::same('../ka', $h->createRelativePath('root/ro/ka/', 'root/ro/ka'));
Assert::same('../ka', $h->createRelativePath('ka/', 'ka'));

Assert::same('../help/', $h->createRelativePath('docs/', 'help/'));
Assert::same('help', $h->createRelativePath('docs', 'help'));
Assert::same('../../index.html', $h->createRelativePath('docs/v0.9/index.html', 'index.html'));
Assert::same('../../help/v1.0.0/download/index.html', $h->createRelativePath('docs/v0.9/index.html', 'help/v1.0.0/download/index.html'));
Assert::same('../v1.0.0/download/step-1.html', $h->createRelativePath('docs/v0.9/index.html', 'docs/v1.0.0/download/step-1.html'));

Assert::same('download.html', $h->createRelativePath('docs/v0.9/index.html', 'docs/v0.9/download.html'));

Assert::same('../sub', $h->createRelativePath('section/sub/page', 'section/sub'));
Assert::same('../../section', $h->createRelativePath('section/sub/page', 'section'));

