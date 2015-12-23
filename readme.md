# CzProject\PathHelper

Helper class for creating relative paths, absolutizing paths, ...

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


### Helper instance

``` php
$helper = new CzProject\PathHelper;
$helper->absolutizePath('/path/to/to/../file');
$helper->createRelativePath('/path/to/file', '/path/to');
$helper->isPathCurrent('/path/file', '/path/*');
```


## Installation

[Download a latest package](https://github.com/czproject/path-helper/releases) or use [Composer](http://getcomposer.org/):

```
composer require czproject/path-helper
```

Library requires PHP 5.3.0 or later.


------------------------------

License: [New BSD License](license.md)
<br>Author: Jan Pecha, http://janpecha.iunas.cz/

