# CzProject\PathHelper

[![Build Status](https://github.com/czproject/path-helper/workflows/Build/badge.svg)](https://github.com/czproject/path-helper/actions)
[![Downloads this Month](https://img.shields.io/packagist/dm/czproject/path-helper.svg)](https://packagist.org/packages/czproject/path-helper)
[![Latest Stable Version](https://poser.pugx.org/czproject/path-helper/v/stable)](https://github.com/czproject/path-helper/releases)
[![License](https://img.shields.io/badge/license-New%20BSD-blue.svg)](https://github.com/czproject/path-helper/blob/master/license.md)

Helper class for creating relative paths, absolutizing paths,...

<a href="https://www.janpecha.cz/donate/"><img src="https://buymecoffee.intm.org/img/donate-banner.v1.svg" alt="Donate" height="100"></a>


## Installation

[Download a latest package](https://github.com/czproject/path-helper/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/path-helper
```

Library requires PHP 8.0 or later.


## Usage


``` php
use CzProject\PathHelper;
```

### Absolutize path

``` php
PathHelper::absolutizePath($path);

PathHelper::absolutizePath('path/to/my/../text/./file.txt');
```

Returns ```/path/to/text/file.txt```

You can use second parameter ```$prefix```:

``` php
PathHelper::absolutizePath('path/to/my/../text/./file.txt', NULL); // returns path/to/text/file.txt
PathHelper::absolutizePath('path/to/my/../text/./file.txt', '/file/root/'); // returns /file/root/path/to/text/file.txt
```


### Creating relative path

``` php
$source = 'root/dir/docs/1.0/index.html';
$dest = 'root/dir/imgs/image.jpg';

PathHelper::createRelativePath($source, $dest);
```

Returns ```../../imgs/image.jpg```


### Is path current?

``` php
PathHelper::isPathCurrent($path, $mask);

PathHelper::isPathCurrent('dir/file.txt', 'dir/file-2.txt'); // returns FALSE
PathHelper::isPathCurrent('dir/file.txt', 'dir/*'); // returns TRUE
PathHelper::isPathCurrent('dir/sub/file.txt', 'dir/*'); // returns FALSE
PathHelper::isPathCurrent('dir/sub/file.txt', 'dir/*/*'); // returns TRUE
PathHelper::isPathCurrent('dir/sub/file.txt', 'dir/**'); // returns TRUE
```

| Mask     | Meaning
| -------- | ------------------------------------------
| ```**``` | means *everything*
| ```*```  | means *everything <b>except</b> ```/```*


### Normalize path

Normalizes path delimiters to `/`.

``` php
PathHelper::normalizePath($path);

PathHelper::normalizePath('\\path\\to\\file.txt');
```

Returns `/path/to/file.txt`.


### Helper instance

``` php
$helper = new CzProject\PathHelper;
$helper->absolutizePath('/path/to/to/../file');
$helper->createRelativePath('/path/to/file', '/path/to');
$helper->isPathCurrent('/path/file', '/path/*');
```


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, https://www.janpecha.cz/
