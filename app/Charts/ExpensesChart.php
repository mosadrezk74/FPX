<?php

namespace App\Charts;

use App\Models\Standing;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class ExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {

        $user = Auth::user();
        $club_id = $user->club_id;
        $stand_data = Standing::with('club')->where('club_id', $club_id)->get()->sortByDesc('n_1')->sortByDesc('n_2')->sortByDesc('n_3')->sortByDesc('n_4')->sortByDesc('n_5')->take(3);

        $data = $stand_data->pluck('n_1')->toArray();
        $labels = $stand_data->pluck('name')->toArray();

        return $this->chart->donutChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData($data)
            ->setLabels($labels);
    }
}
