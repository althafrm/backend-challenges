<?php

namespace App\Services;

class GroupByOwnersService
{
    public function processArray(array $items)
    {
        $grouped = [];

        foreach ($items as $file => $owner) {
            if (!isset($grouped[$owner])) {
                $grouped[$owner] = [];
            }

            $grouped[$owner][] = $file;
        }

        return $grouped;
    }
}
