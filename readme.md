# CzProject\PathHelper

Helper class for generating relative paths, absolutizing paths, ...

## Usage


``` php
$helper = new CzProject\PathHelper;
```

### Absolutize paths

``` php
$helper->absolutizePath('path/to/my/../text/./file.txt');
```

Returns ```/path/to/text/file.txt```

You can use second parameters ```$prefix```:

``` php
$helper->absolutizePath('path/to/my/../text/./file.txt', NULL); // returns path/to/text/file.txt
$helper->absolutizePath('path/to/my/../text/./file.txt', '/file/root/'); // returns /file/root/path/to/text/file.txt
```


### Generating relative paths

``` php
$source = 'root/dir/docs/1.0/index.html';
$dest = 'root/dir/imgs/image.jpg';
$helper->makeRelativePath($source, $dest);
```

Returns ```../../imgs/image.jpg```


### Is given paths current?

``` php
$helper->isPathCurrent('dir/file.txt', 'dir/file-2.txt'); // returns FALSE
$helper->isPathCurrent('dir/file.txt', 'dir/*'); // returns TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*'); // returns FALSE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*/*'); // returns TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/**'); // returns TRUE
```

**Mask:** ```**``` means *everything*, ```*``` means *everything <b>except</b> ```/```*.


## Installation

[Download a latest package](https://github.com/nette/tester/releases) or use [Composer](http://getcomposer.org/):

```
composer require [--dev] czproject/paths-helper
```

Library requires PHP 5.3.0 or later.


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, http://janpecha.iunas.cz/

