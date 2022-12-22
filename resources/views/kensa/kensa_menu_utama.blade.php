@extends('layout.master')
@section('title')
    Menu Utama
@endsection

@push('page-styles')
    <style>
        h7 {
            font-size: 48pt;
        }

        input[type="text"] {
            font-size: 38px;
        }

        span {
            font-size: 24px;
        }
        card{
            height: 50pt;
        }
    </style>
@endpush

@section('breadcrumb')
    @parent
    <li class="active"> > Kensa > Menu Utama</li>
@endsection


@section('content')
    <section class="content">
        <form action="{{ route('kensa.utama') }}" method="GET">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control" name="date" id="date" value="{{ $date }}">
                </div>
                <div class="col-md-4">
                    <label for="" class="text-white">Filter</label> <br>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header bg-success">
                        <i class="far fa-check-circle fa-7x"></i>
                    </div>
                    <div class="card-footer"
                        style="
                    padding-top: 0px;
                    padding-left: 0px;
                    padding-bottom: 0px;
                    padding-right: 0px;
                ">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <h7> <b> OK </b> </h7>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="description-block">
                                    <h7> <b> {{ number_format($total_ok, 2) }}% </b> </h7>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h1 class="text-center"> <b> NG PLATING </b></h1>
                    <div class="row">
                        <?php
                        $data1 = collect([['type' => 'plating', 'name' => 'Nikel', 'val' => $nikel], ['type' => 'plating', 'name' => 'Butsu', 'val' => $butsu], ['type' => 'plating', 'name' => 'Hadare', 'val' => $hadare], ['type' => 'plating', 'name' => 'Hage', 'val' => $hage], ['type' => 'plating', 'name' => 'Moyo', 'val' => $moyo], ['type' => 'plating', 'name' => 'Fukure', 'val' => $fukure], ['type' => 'plating', 'name' => 'Crack', 'val' => $crack], ['type' => 'plating', 'name' => 'Henkei', 'val' => $henkei], ['type' => 'plating', 'name' => 'Hanazaki', 'val' => $hanazaki], ['type' => 'plating', 'name' => 'Kizu', 'val' => $kizu], ['type' => 'plating', 'name' => 'Kaburi', 'val' => $kaburi], ['type' => 'plating', 'name' => 'Other', 'val' => $other]]);

                        $data2 = collect([['type' => 'molding', 'name' => 'Gores', 'val' => $gores], ['type' => 'molding', 'name' => 'Regas', 'val' => $regas], ['type' => 'molding', 'name' => 'Silver', 'val' => $silver], ['type' => 'molding', 'name' => 'Hike', 'val' => $hike], ['type' => 'molding', 'name' => 'Burry', 'val' => $burry], ['type' => 'molding', 'name' => 'Others', 'val' => $others]]);

                        $dataMerge = $data1->merge($data2);

                        $dataSort1 = $dataMerge->sortByDesc('val')->slice(0, 3);
                        ?>

                        @foreach ($data1 as $key1 => $d)
                            <?php
                            $p = $d['name'];
                            $t = $d['type'];
                            $filter = $dataSort1->filter(function ($i, $k) use ($p, $t) {
                                return $i['name'] === $p && $i['type'] === $t && $i['val'] > 0;
                            });
                            ?>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <span class="text-center ml-2"> {{ $d['name'] }} </span>
                                    <input type="text"
                                        class="form-control ml-2 {{ $filter->count() === 1 ? 'bg-danger' : 'bg-white' }} border"
                                        value="{{ number_format($d['val'], 2) }}%" readonly>
                                        <br>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-widget widget-user">
                    <div class="widget-user-header bg-danger">
                        <i class="far fa-times-circle fa-7x"></i>
                    </div>
                    <div class="card-footer"
                        style="
                    padding-top: 0px;
                    padding-left: 0px;
                    padding-bottom: 0px;
                    padding-right: 0px;
                ">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <h7> <b> NG </b> </h7>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="description-block">
                                    <h7> <b> {{ number_format($total_ng, 2) }}% </b> </h7>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h1 class="text-center"> <b> NG MOLDING </b></h1>
                    <div class="row">
                        <?php
                        $data1 = collect([['type' => 'plating', 'name' => 'Nikel', 'val' => $nikel], ['type' => 'plating', 'name' => 'Butsu', 'val' => $butsu], ['type' => 'plating', 'name' => 'Hadare', 'val' => $hadare], ['type' => 'plating', 'name' => 'Hage', 'val' => $hage], ['type' => 'plating', 'name' => 'Moyo', 'val' => $moyo], ['type' => 'plating', 'name' => 'Fukure', 'val' => $fukure], ['type' => 'plating', 'name' => 'Crack', 'val' => $crack], ['type' => 'plating', 'name' => 'Henkei', 'val' => $henkei], ['type' => 'plating', 'name' => 'Hanazaki', 'val' => $hanazaki], ['type' => 'plating', 'name' => 'Kizu', 'val' => $kizu], ['type' => 'plating', 'name' => 'Kaburi', 'val' => $kaburi], ['type' => 'plating', 'name' => 'Other', 'val' => $other]]);

                        $data2 = collect([['type' => 'molding', 'name' => 'Gores', 'val' => $gores], ['type' => 'molding', 'name' => 'Regas', 'val' => $regas], ['type' => 'molding', 'name' => 'Silver', 'val' => $silver], ['type' => 'molding', 'name' => 'Hike', 'val' => $hike], ['type' => 'molding', 'name' => 'Burry', 'val' => $burry], ['type' => 'molding', 'name' => 'Others', 'val' => $others]]);

                        $dataMerge = $data1->merge($data2);

                        $dataSort1 = $dataMerge->sortByDesc('val')->slice(0, 3);
                        ?>

                        @foreach ($data2 as $key2 => $d2)
                            <?php
                            $p2 = $d2['name'];
                            $t2 = $d2['type'];
                            $filter = $dataSort1->filter(function ($i, $k) use ($p, $t) {
                                return $i['name'] === $p && $i['type'] === $t && $i['val'] > 0;
                            });
                            ?>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <span class="text-center"> {{ $d2['name'] }} </span>
                                    <input type="text"
                                        class="form-control {{ $filter->count() === 1 ? 'bg-danger' : 'bg-white' }} border"
                                        value="{{ number_format($d['val'], 2) }}%" readonly>
                                        <br><br><br><br><br>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control border border-dark "
                                value=" C1 | {{ number_format($c1_p) }}%">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control border border-dark"
                                value=" C2 | {{ number_format($c2_p) }}%">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control border border-dark"
                                value=" CS | {{ number_format($cooper_p) }}%">
                        </div>
                    </div>
                    <div class="col-md-3 mt-2">
                        <div class="form-group">
                            <input type="text" class="form-control border border-dark"
                                value=" FS | {{ number_format($final_p) }}%">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Perbandingan Total NG Hari ini</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="doughnutChart"
                                style="display: block; box-sizing: border-box; height: 310px; width: 310px;" width="310"
                                height="310"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Perbandingan Total NG Hari ini</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('doughnutChart');
        const doughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['nikel', 'butsu', 'hadare', 'hage', 'moyo', 'fukure', 'crack', 'henkei', 'hanazaki',
                    'kizu', 'kaburi', 'other', 'gores', 'regas', 'silver', 'hike', 'burry', 'others'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $sum_nikel }}, {{ $sum_butsu }}, {{ $sum_hadare }},
                        {{ $sum_hage }}, {{ $sum_moyo }}, {{ $sum_fukure }},
                        {{ $sum_crack }}, {{ $sum_henkei }}, {{ $sum_hanazaki }},
                        {{ $sum_kizu }}, {{ $sum_kaburi }}, {{ $sum_other }},
                        {{ $sum_gores }}, {{ $sum_regas }}, {{ $sum_silver }},
                        {{ $sum_hike }}, {{ $sum_burry }}, {{ $sum_others }}
                    ],
                    backgroundColor: [
                        'rgb(244, 67, 54)',
                        'rgb(232, 30, 99)',
                        'rgb(156, 39, 176)',
                        'rgb(103, 58, 183)',
                        'rgb(63, 81, 181)',
                        'rgb(33, 150, 243)',
                        'rgb(3, 169, 244)',
                        'rgb(0, 188, 212)',
                        'rgb(0, 150, 136)',
                        'rgb(76, 175, 80)',
                        'rgb(139, 195, 74)',
                        'rgb(205, 220, 57)',
                        'rgb(255, 235, 59)',
                        'rgb(255, 193, 7)',
                        'rgb(255, 152, 0)',
                        'rgb(255, 87, 34)',
                        'rgb(255, 255, 255)',
                        'rgb(0, 0, 0)'
                    ]
                }]
            },
        });
    </script>

    <script>
        const ctr = document.getElementById('barChart');
        const barChart = new Chart(ctr, {
            type: 'bar',
            data: {
                labels: ['nikel', 'butsu', 'hadare', 'hage', 'moyo', 'fukure', 'crack', 'henkei', 'hanazaki',
                    'kizu', 'kaburi', 'other', 'gores', 'regas', 'silver', 'hike', 'burry', 'others'
                ],
                datasets: [{
                        label: 'Total NG',
                        data: [{{ $sum_nikel }}, {{ $sum_butsu }}, {{ $sum_hadare }},
                            {{ $sum_hage }}, {{ $sum_moyo }}, {{ $sum_fukure }},
                            {{ $sum_crack }}, {{ $sum_henkei }}, {{ $sum_hanazaki }},
                            {{ $sum_kizu }}, {{ $sum_kaburi }}, {{ $sum_other }},
                            {{ $sum_gores }}, {{ $sum_regas }}, {{ $sum_silver }},
                            {{ $sum_hike }}, {{ $sum_burry }}, {{ $sum_others }}
                        ],
                        backgroundColor: [
                            'rgb(244, 67, 54)',
                            'rgb(232, 30, 99)',
                            'rgb(156, 39, 176)',
                            'rgb(103, 58, 183)',
                            'rgb(63, 81, 181)',
                            'rgb(33, 150, 243)',
                            'rgb(3, 169, 244)',
                            'rgb(0, 188, 212)',
                            'rgb(0, 150, 136)',
                            'rgb(76, 175, 80)',
                            'rgb(139, 195, 74)',
                            'rgb(205, 220, 57)',
                            'rgb(255, 235, 59)',
                            'rgb(255, 193, 7)',
                            'rgb(255, 152, 0)',
                            'rgb(255, 87, 34)',
                            'rgb(255, 255, 255)',
                            'rgb(0, 0, 0)'
                        ],
                        borderWidth: 1
                    },

                ]

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
