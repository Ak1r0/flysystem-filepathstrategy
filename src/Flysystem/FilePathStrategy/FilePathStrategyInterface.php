<?php

namespace Ak1r0\Flysystem\FilePathStrategy;

/**
 * FilePathStrategy Interface
 */
interface FilePathStrategyInterface
{
    /**
     * Create a new path from another
     *
     * @param string $path
     *
     * @return string
     */
    public function computePath($path);
}