<?php
use Tester\Assert;

require __DIR__ . '/bootstrap.php';
require __DIR__ . '/../../src/PathHelper.php';

$h = new CzProject\PathHelper;

Assert::same('.', $h->makeRelativePath('index.html', ''));
Assert::same('.', $h->makeRelativePath('', ''));
Assert::same('..', $h->makeRelativePath('contact/index.html', '')); // ..

Assert::same('../root/index.html', $h->makeRelativePath('index.html', '../root/index.html'));
Assert::same('root/index.html', $h->makeRelativePath('index.html', 'root/index.html'));

Assert::same('index.html', $h->makeRelativePath('index.html', 'index.html')); // or ''

Assert::same('contact.html', $h->makeRelativePath('index.html', 'contact.html'));
Assert::same('docs/', $h->makeRelativePath('index.html', 'docs/'));
Assert::same('v1.0.0/', $h->makeRelativePath('docs/', 'docs/v1.0.0/'));
Assert::same('docs/v1.0.0/', $h->makeRelativePath('docs', 'docs/v1.0.0/')); // ??
Assert::same('docs/v0.9/index.html', $h->makeRelativePath('index.html', 'docs/v0.9/index.html'));

Assert::same('ka', $h->makeRelativePath('root/ro/ka', 'root/ro/ka'));
Assert::same('.', $h->makeRelativePath('root/ro/ka/', 'root/ro/ka/'));
Assert::same('ka/', $h->makeRelativePath('root/ro/ka', 'root/ro/ka/'));
Assert::same('../ka', $h->makeRelativePath('root/ro/ka/', 'root/ro/ka'));
Assert::same('../ka', $h->makeRelativePath('ka/', 'ka'));

Assert::same('../help/', $h->makeRelativePath('docs/', 'help/'));
Assert::same('help', $h->makeRelativePath('docs', 'help'));
Assert::same('../../index.html', $h->makeRelativePath('docs/v0.9/index.html', 'index.html'));
Assert::same('../../help/v1.0.0/download/index.html', $h->makeRelativePath('docs/v0.9/index.html', 'help/v1.0.0/download/index.html'));
Assert::same('../v1.0.0/download/step-1.html', $h->makeRelativePath('docs/v0.9/index.html', 'docs/v1.0.0/download/step-1.html'));

Assert::same('download.html', $h->makeRelativePath('docs/v0.9/index.html', 'docs/v0.9/download.html'));

Assert::same('../sub', $h->makeRelativePath('section/sub/page', 'section/sub'));
Assert::same('../../section', $h->makeRelativePath('section/sub/page', 'section'));

