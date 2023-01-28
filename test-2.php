<?php

$array = [2, 3, 1, 2, 3];

echo 'array: [' . implode(',', $array) . "]<br>";

$multiple = array_filter(array_count_values($array), function ($count) {
    return $count > 1;
});

echo 'multiple: ' . implode(',', array_keys($multiple));
