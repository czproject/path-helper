Cz\Paths-helper
===============

Helper class for generating relative paths, absolutizing paths, ...

Usage
-----

``` php
<?php
$helper = new Cz\PathsHelper;
$helper->absolutizePath('path/to/my/../text/./file.txt');
// Prints: 'path/to/text/file.txt'

$source = 'root/dir/docs/1.0/index.html';
$dest = 'root/dir/imgs/image.jpg';
$helper->makeRelativePath($source, $dest);
// Prints: '../../imgs/image.jpg'

$helper->isPathCurrent('dir/file.txt', 'dir/file-2.txt'); // return FALSE
$helper->isPathCurrent('dir/file.txt', 'dir/*'); // return TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*'); // return FALSE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*/*'); // return TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/**'); // return TRUE
```

**Mask:** ```**``` means *everything*, ```*``` means *everything <b>except</b> ```/```*.


Installation
------------

[Download a latest package](https://github.com/nette/tester/releases) or use [Composer](http://getcomposer.org/):

```
composer require [--dev] czproject/paths-helper
```

Library requires PHP 5.3.0 or later.


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, http://janpecha.iunas.cz/

