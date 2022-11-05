<?php

namespace Modules\Test\Interfaces;

interface ChartInterface
{
    public function daysOfWeek($entity);

    public function weeksOfMonth($entity);

    public function monthsOfYear($entity);

    public function monthPeriodForPlayedItems($entity);

    public function weeklyPlayedForPodcast($entity);

    public function yearLyPlayedForItems($entity);

    public function allTimePlayedItems($entity);

    public function listeningDays($entity);
}
