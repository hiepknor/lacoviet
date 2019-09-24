<?php

const STATUS_VALUES = [
    '0' => 'Not Active',
    '1' => 'Active'
];

function formatPrice($input) {
    return number_format($input, 0, '', '.');
}