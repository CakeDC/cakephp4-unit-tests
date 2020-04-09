<?php

namespace App\Utils;

class Formatter
{
    /**
     * Format percentage of won/lost games
     *
     * @param int $won won games
     * @param int $lost lost games
     * @return string formatted percentage
     * @throws \OutOfBoundsException
     */
    public function formatStatPercentage(int $won, int $lost): string
    {
        if ($won < 0 || $lost < 0) {
            throw new \OutOfBoundsException('Won and lost must not be < 0');
        }
        $percentage = Math::roundedPercentage($won, $lost);
        if ($percentage === 0) {
            return __('Play more games!');
        }

        return $percentage . '%';
    }
}
