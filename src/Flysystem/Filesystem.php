<?php

namespace Ak1r0\Flysystem;

use League\Flysystem;
use League\Flysystem\AdapterInterface;
use Ak1r0\Flysystem\FilePathStrategy\DefaultStrategy;
use Ak1r0\Flysystem\FilePathStrategy\FilePathStrategyInterface;

/**
 * @method string  resolveUid(string $uid)
 * @method array|false  concatenate(string[] $paths)
 * @method array|false  concatenateByUids(string[] $uids)
 * @method array|false  convert(string $path, string $mimetype);
 */
class Filesystem extends Flysystem\Filesystem implements Flysystem\FilesystemInterface
{
    /** @var FilePathStrategyInterface|null */
    protected $filePathStrategy;

    /**
     * Filesystem constructor.
     *
     * @param AdapterInterface               $adapter
     * @param null                           $config
     * @param FilePathStrategyInterface|null $strategy
     */
    public function __construct(AdapterInterface $adapter, $config = null, FilePathStrategyInterface $strategy = null)
    {
        parent::__construct($adapter, $config);
        $this->filePathStrategy = $strategy ?: new DefaultStrategy();
    }

    /**
     * @inheritdoc
     */
    public function write($path, $contents, array $config = [])
    {
        return parent::write($this->filePathStrategy->computePath($path), $contents, $config);
    }

    /**
     * @inheritdoc
     */
    public function writeStream($path, $resource, array $config = [])
    {
        return parent::writeStream($this->filePathStrategy->computePath($path), $resource, $config);
    }

    /**
     * @inheritdoc
     */
    public function rename($path, $newpath)
    {
        return parent::rename(
            $this->filePathStrategy->computePath($path),
            $this->filePathStrategy->computePath($newpath)
        );
    }

    /**
     * @inheritdoc
     */
    public function copy($path, $newpath)
    {
        return parent::copy(
            $this->filePathStrategy->computePath($path),
            $this->filePathStrategy->computePath($newpath)
        );
    }

    /**
     * @inheritdoc
     */
    public function createDir($dirname, array $config = [])
    {
        return parent::createDir($this->filePathStrategy->computePath($dirname), $config);
    }
}
