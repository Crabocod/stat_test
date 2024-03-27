<?php

function countTuesdaysBetweenDates($startDate, $endDate) {
    $count = 0;
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);

    if ($start->format('N') == 2)
        $count++;

    $start->modify('next tuesday');

    $interval = DateInterval::createFromDateString('1 week');
    $period = new DatePeriod($start, $interval, $end);

    $count += iterator_count($period);

    return $count;
}

$startDate = '2022-01-01';
$endDate = '2022-12-31';
echo countTuesdaysBetweenDates($startDate, $endDate);
