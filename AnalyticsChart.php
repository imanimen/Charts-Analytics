<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait AnalyticsChart
{

    public function daysOfWeek($listening): array
    {
        $today = Carbon::now();

        $today_name = $today;
        $last_day_name = Carbon::now()->subDay();
        $last_day_2_name = Carbon::now()->subDays(2);
        $last_day_3_name = Carbon::now()->subDays(3);
        $last_day_4_name = Carbon::now()->subDays(4);
        $last_day_5_name = Carbon::now()->subDays(5);
        $last_day_6_name = Carbon::now()->subDays(6);
        $last_day_7_name = Carbon::now()->subDays(7);


        $days = [
            $today_name->format('D') => $this->query($listening, $last_day_name, $today),

            $last_day_name->format('D') => $this->query($listening, $last_day_2_name, $last_day_name),

            $last_day_2_name->format('D') => $this->query($listening, $last_day_3_name, $last_day_2_name),

            $last_day_3_name->format('D') => $this->query($listening, $last_day_4_name, $last_day_3_name),

            $last_day_4_name->format('D') => $this->query($listening, $last_day_5_name, $last_day_4_name),

            $last_day_5_name->format('D') => $this->query($listening, $last_day_6_name, $last_day_5_name),

            $last_day_6_name->format('D') => $this->query($listening, $last_day_7_name, $last_day_6_name),
        ];


        return $days;
    }

    public function monthsOfYear($listening): array
    {
        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonthsNoOverflow();
        $last_2_month = Carbon::now()->subMonthsNoOverflow(2);
        $last_3_month = Carbon::now()->subMonthsNoOverflow(3);
        $last_4_month = Carbon::now()->subMonthsNoOverflow(4);
        $last_5_month = Carbon::now()->subMonthsNoOverflow(5);
        $last_6_month = Carbon::now()->subMonthsNoOverflow(6);
        $last_7_month = Carbon::now()->subMonthsNoOverflow(7);
        $last_8_month = Carbon::now()->subMonthsNoOverflow(8);
        $last_9_month = Carbon::now()->subMonthsNoOverflow(9);
        $last_10_month = Carbon::now()->subMonthsNoOverflow(10);
        $last_11_month = Carbon::now()->subMonthsNoOverflow(11);
        $last_12_month = Carbon::now()->subMonthsNoOverflow(12);

        $months = [
            $currentMonth->format('M') => $this->query($listening, $lastMonth, $currentMonth),

            $lastMonth->format('M') => $this->query($listening, $last_2_month, $lastMonth),

            $last_2_month->format('M') => $this->query($listening, $last_3_month, $last_2_month),

            $last_3_month->format('M') => $this->query($listening, $last_4_month, $last_3_month),

            $last_4_month->format('M') => $this->query($listening, $last_5_month, $last_4_month),

            $last_5_month->format('M') => $this->query($listening, $last_6_month, $last_5_month),

            $last_6_month->format('M') => $this->query($listening, $last_7_month, $last_6_month),

            $last_7_month->format('M') => $this->query($listening, $last_8_month, $last_7_month),

            $last_8_month->format('M') => $this->query($listening, $last_9_month, $last_8_month),

            $last_9_month->format('M') => $this->query($listening, $last_10_month, $last_9_month),

            $last_10_month->format('M') => $this->query($listening, $last_11_month, $last_10_month),

            $last_11_month->format('M') => $this->query($listening, $last_12_month, $last_11_month),

        ];

        return $months;
    }

    public function weeksOfMonth($listening): array
    {
        $today = Carbon::now();

        $firstWeek = Carbon::now()->subWeek();
        $secondWeek = Carbon::now()->subWeeks(2);
        $thirdWeek = Carbon::now()->subWeeks(3);
        $fourthWeek = Carbon::now()->subWeeks(4);


        $weeks = [
            "first_week" => $this->query($listening, $firstWeek, $today),
            "second_week" => $this->query($listening, $secondWeek, $firstWeek),
            "third_week" => $this->query($listening, $thirdWeek, $secondWeek),
            "fourth_week" => $this->query($listening, $fourthWeek, $thirdWeek),
        ];

        return $weeks;
    }

    protected function query($listening, Carbon $end, Carbon $start): mixed
    {
        return $listening->whereBetween('created_at', [$end, $start])->count();
    }


    // for played podcasts

    public function monthPeriodForPlayedPodcasts($listening): array
    {
        $currentMonth = Carbon::now();
        $lastMonth = Carbon::now()->subMonthsNoOverflow();
        $last_2_month = Carbon::now()->subMonthsNoOverflow(2);
        $last_3_month = Carbon::now()->subMonthsNoOverflow(3);
        $last_4_month = Carbon::now()->subMonthsNoOverflow(4);
        $last_5_month = Carbon::now()->subMonthsNoOverflow(5);
        $last_6_month = Carbon::now()->subMonthsNoOverflow(6);
        $last_7_month = Carbon::now()->subMonthsNoOverflow(7);
        $last_8_month = Carbon::now()->subMonthsNoOverflow(8);
        $last_9_month = Carbon::now()->subMonthsNoOverflow(9);
        $last_10_month = Carbon::now()->subMonthsNoOverflow(10);
        $last_11_month = Carbon::now()->subMonthsNoOverflow(11);
        $last_12_month = Carbon::now()->subMonthsNoOverflow(12);

        $months = [
            $currentMonth->format('M') => $this->period($listening, $lastMonth, $currentMonth),

            $lastMonth->format('M') => $this->period($listening, $last_2_month, $lastMonth),

            $last_2_month->format('M') => $this->period($listening, $last_3_month, $last_2_month),

            $last_3_month->format('M') => $this->period($listening, $last_4_month, $last_3_month),

            $last_4_month->format('M') => $this->period($listening, $last_5_month, $last_4_month),

            $last_5_month->format('M') => $this->period($listening, $last_6_month, $last_5_month),

            $last_6_month->format('M') => $this->period($listening, $last_7_month, $last_6_month),

            $last_7_month->format('M') => $this->period($listening, $last_8_month, $last_7_month),

            $last_8_month->format('M') => $this->period($listening, $last_9_month, $last_8_month),

            $last_9_month->format('M') => $this->period($listening, $last_10_month, $last_9_month),

            $last_10_month->format('M') => $this->period($listening, $last_11_month, $last_10_month),

            $last_11_month->format('M') => $this->period($listening, $last_12_month, $last_11_month),

        ];

        return $months;
    }

    protected function period($listening, Carbon $end, Carbon $start): mixed
    {
        $playedInMonth =  $listening->whereBetween('created_at', [$end, $start])->sum("value") / 60 ;
        return floor($playedInMonth);
    }


    public function monthPeriodForPlayedItems($data)
    {
        $playedInWeek = $data->whereBetween('created_at', [
            Carbon::now()->startOfWeek(Carbon::SATURDAY), Carbon::now()->endOfWeek(Carbon::FRIDAY)
        ])->sum("value") / 60;
        return floor($playedInWeek);
    }

    public function yearLyPlayedForItems($data)
    {
        $playedInYear = $data->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear()])
            ->sum("value") / 60;
        return floor($playedInYear);
    }

    public function allTimePlayedItems($data)
    {
        $allTime = $data->sum("value") / 60;
        return floor($allTime);
    }

    // sum for listenings 


    public function listeningDays($listening): array
    {
        $today = Carbon::now();

        $today_name = $today;
        $last_day_name = Carbon::now()->subDay();
        $last_day_2_name = Carbon::now()->subDays(2);
        $last_day_3_name = Carbon::now()->subDays(3);
        $last_day_4_name = Carbon::now()->subDays(4);
        $last_day_5_name = Carbon::now()->subDays(5);
        $last_day_6_name = Carbon::now()->subDays(6);
        $last_day_7_name = Carbon::now()->subDays(7);


        $days = [
            $today_name->format('D') => $this->sumItems($listening, $last_day_name, $today),

            $last_day_name->format('D') => $this->sumItems($listening, $last_day_2_name, $last_day_name),

            $last_day_2_name->format('D') => $this->sumItems($listening, $last_day_3_name, $last_day_2_name),

            $last_day_3_name->format('D') => $this->sumItems($listening, $last_day_4_name, $last_day_3_name),

            $last_day_4_name->format('D') => $this->sumItems($listening, $last_day_5_name, $last_day_4_name),

            $last_day_5_name->format('D') => $this->sumItems($listening, $last_day_6_name, $last_day_5_name),

            $last_day_6_name->format('D') => $this->sumItems($listening, $last_day_7_name, $last_day_6_name),
        ];


        return $days;
    }
    protected function sumItems($listening, Carbon $end, Carbon $start): mixed
    {
        $data =  $listening->whereBetween('created_at', [$end, $start])->sum("value") / 60;
        return floor($data);
    }


}
