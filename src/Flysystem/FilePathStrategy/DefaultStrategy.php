<?php

namespace Ak1r0\Flysystem\FilePathStrategy;

/**
 * Default strategy, no changes made here
 */
class DefaultStrategy implements FilePathStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function computePath($path)
    {
        return $path;
    }
}