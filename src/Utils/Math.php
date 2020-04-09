<?php

namespace App\Utils;

/**
 * Class Math
 * @package App\Utils
 */
class Math
{
    /**
     * Calculate percentage
     *
     * @param int $successful
     * @param int $failed
     * @return rounded percentage
     * @throws \OutOfBoundsException
     */
    public static function roundedPercentage(int $successful, int $failed): int
    {
        if ($successful < 0 || $failed < 0) {
            throw new \OutOfBoundsException('Won and lost must not be < 0');
        }
        $total = $successful + $failed;
        if ($total === 0) {
            return 0;
        }

        return round($successful / $total * 100);
    }
}
