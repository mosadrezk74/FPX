@extends('Dashboard.layouts.master')
@section('css')

@endsection

<style>
    body{margin-top:20px;}

    .comparison-table {
        width: 100%;
        font-size: .875rem;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        -ms-overflow-style: -ms-autohiding-scrollbar
    }

    .comparison-table table {
        min-width: 41rem;
        table-layout: fixed
    }

    .comparison-table table tbody+tbody {
        border-top-width: 1px
    }

    .comparison-table .table-bordered thead td {
        border-bottom-width: 1px
    }

    .comparison-table .comparison-item {
        position: relative;
        padding: .875rem .75rem 1.125rem;
        border: 1px solid #e7e7e7;
        background-color: #fff;
        text-align: center
    }

    .comparison-table .comparison-item .comparison-item-thumb {
        display: block;
        width: 5rem;
        margin-right: auto;
        margin-bottom: .75rem;
        margin-left: auto
    }

    .comparison-table .comparison-item .comparison-item-thumb>img {
        display: block;
        width: 100%
    }

    .comparison-table .comparison-item .comparison-item-title {
        display: block;
        width: 100%;
        margin-bottom: 14px;
        color: #222;
        font-weight: 600;
        text-decoration: none
    }

    .comparison-table .comparison-item .comparison-item-title:hover {
        text-decoration: underline
    }

    .comparison-table .comparison-item .btn {
        margin: 0
    }

    .comparison-table .comparison-item .remove-item {
        display: block;
        position: absolute;
        top: -.3125rem;
        right: -.3125rem;
        width: 1.375rem;
        height: 1.375rem;
        border-radius: 50%;
        background-color: #f44336;
        color: #fff;
        text-align: center;
        cursor: pointer
    }

    .comparison-table .comparison-item .remove-item .feather {
        width: .875rem;
        height: .875rem
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #e7e7e7;
    }
    .bg-white {
        background-color: #f7f7f7 !important;
    }
</style>



@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('index.compare')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/{{trans('index.veiw_all')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card" id="basic">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="dropdown">
                                <button aria-expanded="false" aria-haspopup="true"
                                        class="btn ripple btn-primary"
                                        data-toggle="dropdown"
                                        id="dropdownMenuButton"
                                        type="button">
                                    اختار لاعب للمقارنة
                                    <i class="fas fa-caret-down ml-1"></i>
                                </button>
                                <div class="dropdown-menu tx-13">
                                    @foreach($players as $pl)
                                        <a class="dropdown-item compare-dropdown-item" href="#"
                                           data-player-id="{{ $pl->id }}">{{ $pl->name_ar }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="container pb-5 mb-2">
                            <div class="comparison-table">
                                <table class="table table-bordered" id="comparison-table">

                                    <thead class="bg-white">
                    <tr>
                        <td class="align-middle">
                            <select class="form-control custom-select" id="compare-criteria" data-filter="trigger">
                                <option value="all">General *</option>
                                <option value="attack">Attack</option>
                                <option value="defend">Defend</option>
                                <option value="pass">Pass</option>
                                <option value="shoot">Shoot</option>
                                <option value="touches">Touches</option>
                                <option value="dribble">Dribble</option>
                                <option value="play">Team Play</option>
                            </select>
                        </td>
                        <td>
                            <div class="comparison-item">
                                <a class="comparison-item-thumb" href=""><img src="{{ asset('uploads/players/'. $player->photo) }}" alt="Apple iPhone Xs Max"></a>
                                <a class="comparison-item-title">{{$player->name_ar}}</a>
                            </div>
                        </td>
                        <td>
                            <div class="comparison-item">
                                
                                <a class="comparison-item-thumb" href=""><img src="{{ asset('uploads/players/'. $player->photo) }}" alt="Apple iPhone Xs Max"></a>
                                <a class="comparison-item-title">
                                    here is selected player
                                </a>
                            </div>
                        </td>
                    </tr>
                    </thead>
                    <tbody id="all" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Summary</th>
                        <td><span class="text-dark font-weight-semibold">{{$player->name_ar}}</span></td>
                        <td><span class="text-dark font-weight-semibold">other player </span></td>
                    </tr>
                    <tr>
                        <th>Performance</th>
                        <td>Hexa Core</td>
                        <td>Octa Core</td>
                    </tr>
                    <tr>
                        <th>Display</th>
                        <td>6.5-inch</td>
                        <td>6.4-inch</td>
                    </tr>
                    <tr>
                        <th>Storage</th>
                        <td>64 GB</td>
                        <td>128 GB</td>
                    </tr>
                    <tr>
                        <th>Camera</th>
                        <td>Dual 12-megapixel</td>
                        <td>12.2-megapixel</td>

                    </tr>
                    <tr>
                        <th>Battery</th>
                        <td>3,174 mAh</td>
                        <td>3,430 mAh</td>

                    </tr>
                    </tbody>
                    <tbody id="attack" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">General</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Quick charging</th>
                        <td>Yes</td>
                        <td>Yes</td>

                    </tr>
                    <tr>
                        <th>Operating system</th>
                        <td>iOS v12</td>
                        <td>Android v9.0 Pie </td>

                    </tr>
                    <tr>
                        <th>Sim slots</th>
                        <td>Single SIM, GSM</td>
                        <td>Single SIM, GSM</td>

                    </tr>
                    <tr>
                        <th>Launch date</th>
                        <td>September 12, 2018 (Official)</td>
                        <td>November 1, 2018 (Official)</td>

                    </tr>
                    <tr>
                        <th>Sim size</th>
                        <td>SIM1: Nano</td>
                        <td>SIM1: Nano</td>

                    </tr>
                    <tr>
                        <th>Network</th>
                        <td>4G: Available (supports Indian bands) 3G: Available, 2G: Available</td>
                        <td>4G: Available (supports Indian bands) 3G: Available, 2G: Available</td>

                    </tr>
                    <tr>
                        <th>Fingerprint sensor</th>
                        <td>None (Face ID)</td>
                        <td>Back cover</td>

                    </tr>
                    </tbody>
                    <tbody id="defend" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Multimedia</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>

                    </tr>
                    <tr>
                        <th>Loudspeaker</th>
                        <td>Yes</td>
                        <td>Yes</td>

                    </tr>
                    <tr>
                        <th>FM radio</th>
                        <td>No</td>
                        <td>No</td>

                    </tr>
                    <tr>
                        <th>Headphone jack</th>
                        <td>No</td>
                        <td>Yes</td>
                    </tr>
                    </tbody>
                    <tbody id="pass" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Performance</th>
                        <td><span class="text-dark font-weight">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight">Google Pixel 3 XL</span></td>

                    </tr>
                    <tr>
                        <th>Processor</th>
                        <td>Apple A12 Bionic</td>
                        <td>Qualcomm Snapdragon 845 (2.5GHz octa-core)</td>
                    </tr>
                    <tr>
                        <th>Graphics</th>
                        <td>Apple GPU (4-core graphics)</td>
                        <td>Adreno 630</td>
                    </tr>
                    <tr>
                        <th>Architecture</th>
                        <td>64 bit</td>
                        <td>64 bit</td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td>4 GB</td>
                        <td>8 GB</td>
                    </tr>
                    </tbody>
                    <tbody id="shoot" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Design</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Build material</th>
                        <td>Case: AluminiumBack: Mineral Glass</td>
                        <td>Case: AluminiumBack: Aluminium</td>
                    </tr>
                    <tr>
                        <th>Thickness</th>
                        <td>7.7 mm</td>
                        <td>7.9 mm</td>
                    </tr>
                    <tr>
                        <th>Width</th>
                        <td>70.9 mm</td>
                        <td>76.7 mm</td>
                    </tr>
                    <tr>
                        <th>Height</th>
                        <td>143.6 mm</td>
                        <td>157.9 mm</td>
                    </tr>
                    <tr>
                        <th>Weight</th>
                        <td>174 grams</td>
                        <td>189 grams</td>
                    </tr>
                    <tr>
                        <th>Waterproof</th>
                        <td>Yes Water resistant (up to 30 minutes in a depth of 1 meter), IP67</td>
                        <td>Yes Water resistant (up to 30 minutes in a depth of 1 meter), IP67</td>
                    </tr>
                    <tr>
                        <th>Colors</th>
                        <td>Silver, Space Grey</td>
                        <td>Midnight Black, Coral Blue, Lilac Purple</td>
                    </tr>
                    </tbody>
                    <tbody id="display" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Display</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Display type</th>
                        <td>Super Retina OLED</td>
                        <td>'flexible' OLED</td>
                    </tr>
                    <tr>
                        <th>Pixel density</th>
                        <td>458 ppi</td>
                        <td>522 ppi</td>
                    </tr>
                    <tr>
                        <th>Screen protection</th>
                        <td>Yes</td>
                        <td>Corning Gorilla Glass v5</td>
                    </tr>
                    <tr>
                        <th>Screen size</th>
                        <td>6.5 inches</td>
                        <td>6.3 inches</td>
                    </tr>
                    <tr>
                        <th>Screen resolution</th>
                        <td>1125 x 2436 pixels</td>
                        <td>1440 x 2880 pixels</td>

                    </tr>
                    <tr>
                        <th>Touch screen</th>
                        <td>Yes, 3D Touch Touchscreen, Multi-touch</td>
                        <td>Yes, Capacitive Touchscreen, Multi-touch</td>

                    </tr>
                    </tbody>
                    <tbody id="touches" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Storage</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Internal memory</th>
                        <td>64 GB</td>
                        <td>64 GB</td>
                    </tr>
                    <tr>
                        <th>Expandable memory</th>
                        <td>No</td>
                        <td>No</td>
                    </tr>
                    </tbody>
                    <tbody id="dribble" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Camera</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Settings</th>
                        <td>Exposure compensation, ISO control</td>
                        <td>Exposure compensation, ISO control</td>
                    </tr>
                    <tr>
                        <th>Aperture</th>
                        <td>F2.2</td>
                        <td>F2.4</td>
                    </tr>
                    <tr>
                        <th>Camera features</th>
                        <td>10 x Digital zoom, Optical zoom, Auto flash, Face detection, Touch to focus</td>
                        <td>Fixed zocus</td>
                    </tr>
                    <tr>
                        <th>Image resolution</th>
                        <td>4000 x 3000 pixels</td>
                        <td>4000 x 3000 pixels</td>
                    </tr>
                    <tr>
                        <th>Sensor</th>
                        <td>BSI sensor</td>
                        <td>CMOS image sensor</td>
                    </tr>
                    <tr>
                        <th>Autofocus</th>
                        <td>Yes</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <th>Shooting modes</th>
                        <td>Continuos shooting, High dynamic range mode (HDR), Burst mode</td>
                        <td>Continuos shooting, High dynamic range mode (HDR)</td>
                    </tr>
                    <tr>
                        <th>Optical image stabilisation</th>
                        <td>Yes, Dual optical image stabilization</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <th>Flash</th>
                        <td>Yes, Retina flash</td>
                        <td>Yes, Dual LED flash</td>
                    </tr>
                    </tbody>
                    <tbody id="battery" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Battery</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>
                    </tr>
                    <tr>
                        <th>Talktime</th>
                        <td>Up to 21 hours(4G)</td>
                        <td>Up to 24 hours(4G)</td>
                    </tr>
                    <tr>
                        <th>Quick charging</th>
                        <td>Yes, fast, 50 % in 30 minutes</td>
                        <td>Yes</td>

                    </tr>
                    <tr>
                        <th>Wireless charging</th>
                        <td>Yes</td>
                        <td>Yes</td>

                    </tr>
                    <tr>
                        <th>Type</th>
                        <td>Li-ion</td>
                        <td>Li-ion</td>

                    </tr>
                    <tr>
                        <th>Capacity</th>
                        <td>3,174 mAh</td>
                        <td>3,430 mAh</td>

                    </tr>
                    </tbody>
                    <tbody id="play" data-filter="target">
                    <tr class="bg-white">
                        <th class="text-uppercase">Price &amp; rating</th>
                        <td><span class="text-dark font-weight-semibold">Apple iPhone Xs Max</span></td>
                        <td><span class="text-dark font-weight-semibold">Google Pixel 3 XL</span></td>

                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>$1,099</td>
                        <td>$899</td>

                    </tr>
                    <tr>
                        <th>Rating</th>
                        <td>4.5/5</td>
                        <td>4.5/5</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    </div>
    </div>


@endsection
@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.compare-dropdown-item').on('click', function(e) {
                e.preventDefault();
                var playerId = $(this).data('player-id');
                $.ajax({
                    type: 'GET',
                    url: '/compare/' + playerId,
                    success: function(data) {
                        // Update comparison table with data returned from the server
                        $('.comparison-table').html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
