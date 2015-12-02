# CzProject\PathHelper

Helper class for creating relative paths, absolutizing paths, ...

## Usage


``` php
$helper = new CzProject\PathHelper;
```

### Absolutize path

``` php
$helper->absolutizePath($path);

$helper->absolutizePath('path/to/my/../text/./file.txt');
```

Returns ```/path/to/text/file.txt```

You can use second parameter ```$prefix```:

``` php
$helper->absolutizePath('path/to/my/../text/./file.txt', NULL); // returns path/to/text/file.txt
$helper->absolutizePath('path/to/my/../text/./file.txt', '/file/root/'); // returns /file/root/path/to/text/file.txt
```


### Creating relative path

``` php
$source = 'root/dir/docs/1.0/index.html';
$dest = 'root/dir/imgs/image.jpg';

$helper->createRelativePath($source, $dest);
```

Returns ```../../imgs/image.jpg```


### Is path current?

``` php
$helper->isPathCurrent($path, $mask);

$helper->isPathCurrent('dir/file.txt', 'dir/file-2.txt'); // returns FALSE
$helper->isPathCurrent('dir/file.txt', 'dir/*'); // returns TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*'); // returns FALSE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/*/*'); // returns TRUE
$helper->isPathCurrent('dir/sub/file.txt', 'dir/**'); // returns TRUE
```

| Mask     | Meaning
| -------- | ------------------------------------------
| ```**``` | means *everything*
| ```*```  | means *everything <b>except</b> ```/```*


## Installation

[Download a latest package](https://github.com/czproject/path-helper/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/path-helper
```

Library requires PHP 5.3.0 or later.


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, http://janpecha.iunas.cz/

