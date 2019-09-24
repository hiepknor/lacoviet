<?php

const STATUS_VALUES = [
    '1' => 'Active',
    '2' => 'Not Active'
];

function formatPrice($input) {
    return number_format($input, 0, '', '.');
}