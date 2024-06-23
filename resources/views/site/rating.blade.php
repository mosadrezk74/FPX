@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('site/css/rating.css') }}" />
@endsection
<style>
    .card-image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .card-image {
        width: 70px;
        height: 80px;
    }
</style>
@section('title')
    {{ trans('site/index.rating') }}
@endsection
@section('contact')
    <div class="heroContent">
        <div class="container">
            <h1 class="my-5">{{ trans('site/index.rating') }}</h1>
            <div class="rating_content">
                @php
                    $categories = [
                        'A' => 'mega star ',
                        'B' => 'class a',
                        'C' => 'class b',
                        'D' => 'class c',
                        'E' => 'squad player',
                    ];

                    $playersByCategory = [
                        'A' => [],
                        'B' => [],
                        'C' => [],
                        'D' => [],
                        'E' => [],
                    ];

                    foreach ($players as $player) {
                        if ($player->rate == 1) {
                            $playersByCategory['A'][] = $player;
                        } elseif ($player->rate == 2) {
                            $playersByCategory['B'][] = $player;
                        } elseif ($player->rate == 3) {
                            $playersByCategory['C'][] = $player;
                        } elseif ($player->rate == 4) {
                            $playersByCategory['D'][] = $player;
                        } else {
                            $playersByCategory['E'][] = $player;
                        }
                    }
                @endphp

                @foreach ($categories as $key => $megaStar)
                    <div class="single_rating_row">
                        <h2 class="mb-5 text-uppercase">{{ $megaStar }}</h2>
                        <div class="row">
                            @foreach ($playersByCategory[$key] as $player)
                                @if ($player->position != 0)
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                                        <div class="single_card">
                                            <div class="row">
                                                <div class="col-5">
                                                    <p class="mb-0">{{ rand(85, 95) }}</p>
                                                    <i class="fa-solid fa-star mb-0 text-warning"></i>
                                                    <hr class="w-25 my-1 m-auto">
                                                    @if (App::getLocale() == 'ar')
                                                        <p class="mb-0 p-0">{{ $player->country->name_ar }}</p>
                                                    @else
                                                        <p class="mb-0">{{ $player->country->name_en }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-7 pe-5 card-image-container">
                                                    <img src="{{ $player->photo }}" class="img-fluid card-image"
                                                        alt="{{ $player->name_ar }}">
                                                </div>


                                            </div>
                                            @if (App::getLocale() == 'ar')
                                                <h4 class="mb-0">{{ $player->name_ar }}</h4>
                                            @else
                                                <h5 class="mb-0">{{ $player->name_en }}</h5>
                                            @endif

                                            <hr class="m-0 mt-1">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div
                                                        class="d-flex align-items-center flex-column mt-2 border-end border-1 border-secondary pe-3">
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">PAC</p>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">SHO</p>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">PAS</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center flex-column mt-2">
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">DRI</p>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">DEF</p>
                                                        </div>
                                                        <div class="d-flex align-items-center gap-4">
                                                            <p class="mb-0">{{ rand(80, 90) }}</p>
                                                            <p class="mb-0">PHY</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div><!-- row -->
                    </div><!-- single_rating_row -->
                @endforeach
            </div><!-- rating_content -->
        </div>
    </div><!-- heroContent -->
@endsection
