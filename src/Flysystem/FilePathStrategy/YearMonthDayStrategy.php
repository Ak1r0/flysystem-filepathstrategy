<?php

namespace Ak1r0\Flysystem\FilePathStrategy;

/**
 * Add the current Year, month and day as directories before the path
 */
class YearMonthDayStrategy implements FilePathStrategyInterface
{
    /**
     * @inheritdoc
     */
    public function computePath($path)
    {
        return '/'.date('/Y/m/d/').trim($path, '/');
    }
}