# flysystem-filepathstrategy
Add a "File path strategy" to Flysystem. Allow to set globaly how files must be stored.

This is usefull to have the same archive/backup strategy whatever adapter you use.

## Todos

+ Units tests
+ PHP 7 version

## Install
```
composer require ak1r0/flysystem-filepathstrategy
```

## Usage

```php
$adapter = new \League\Flysystem\Adapter\Local();
$config = new \League\Flysystem\Config();

$strategy = new \Ak1r0\Flysystem\FilePathStrategy\YearMonthDayStrategy();

$filesystem = new \Ak1r0\Flysystem\Filesystem($adapter, $config, $strategy);

// and then, basic usage.
// For every 'write' method it will automatically add current "/year/month/day/" before your path
```
