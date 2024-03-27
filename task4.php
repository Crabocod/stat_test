<?php
function getNeighborSum($matrix, $row, $col) {
    $sum = 0;
    $rows = count($matrix);
    $cols = count($matrix[0]);

    // Check left neighbor
    if ($col > 0) {
        $sum += $matrix[$row][$col - 1];
    }
    // Check right neighbor
    if ($col < $cols - 1) {
        $sum += $matrix[$row][$col + 1];
    }
    // Check top neighbor
    if ($row > 0) {
        $sum += $matrix[$row - 1][$col];
    }
    // Check bottom neighbor
    if ($row < $rows - 1) {
        $sum += $matrix[$row + 1][$col];
    }

    return $sum;
}