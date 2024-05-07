@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('site/css/rating.css')}}" />
@endsection

@section('contact')

    <div class="heroContent">
        <div class="container">
            <h1 class="my-5">Rating</h1>
            <div class="rating_content">
                <div class="single_rating_row">
                    <h2 class="mb-5">mega star a</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="single_card">
                                <div class="row">
                                    @foreach($players as $player)
                                    @if($player->stat->Goals >=10 || $player->stat->Assists >=10)

                                    <div class="col-5">
                                        <p class="mb-0">99</p>
                                        <i  class="fa-solid fa-star mb-0 text-warning"></i>
                                        <hr class="w-25 my-1 m-auto">
                                        <img class="mb-0" src="{{asset('site/images/rating/flag.png')}}" alt="">
                                    </div>
                                    <div class="col-7 pe-5">
                                        <img src="{{$player->photo}}" style="width:100px ; height:100px"  alt="">
                                    </div>
                                </div>
                                <h4 class="mb-0">{{$player->name_ar}}</h4>
                                <hr class="m-0 mt-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2  border-end border-1 border-secondary pe-3">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">88</p>
                                                <p class="mb-0">PAC</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Shots*$player->stat->MP)}}</p>
                                                <p class="mb-0">SHO</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->PasTotCmp_per)}}</p>
                                                <p class="mb-0">PAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{rand(70,90)}}</p>
                                                <p class="mb-0">DRI</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Clr*$player->stat->MP)}}</p>
                                                <p class="mb-0">DEF</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval(($player->stat->Starts/$player->stat->MP )* 100)}}</p>
                                                <p class="mb-0">PHY</p>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- single_rating_row  -->
                <div class="single_rating_row">
                    <h2 class="mb-5">mega star b</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="single_card">
                                <div class="row">
                                    @foreach($players as $player)
                                        @if($player->stat->Goals >=10 || $player->stat->Assists >=10)

                                            <div class="col-5">
                                                <p class="mb-0">99</p>
                                                <i  class="fa-solid fa-star mb-0 text-warning"></i>
                                                <hr class="w-25 my-1 m-auto">
                                                <img class="mb-0" src="{{asset('site/images/rating/flag.png')}}" alt="">
                                            </div>
                                            <div class="col-7 pe-5">
                                                <img src="{{$player->photo}}" style="width:100px ; height:100px"  alt="">
                                            </div>
                                </div>
                                <h4 class="mb-0">{{$player->name_ar}}</h4>
                                <hr class="m-0 mt-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2  border-end border-1 border-secondary pe-3">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">88</p>
                                                <p class="mb-0">PAC</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Shots*$player->stat->MP)}}</p>
                                                <p class="mb-0">SHO</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->PasTotCmp_per)}}</p>
                                                <p class="mb-0">PAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{rand(70,90)}}</p>
                                                <p class="mb-0">DRI</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Clr*$player->stat->MP)}}</p>
                                                <p class="mb-0">DEF</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval(($player->stat->Starts/$player->stat->MP )* 100)}}</p>
                                                <p class="mb-0">PHY</p>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- row -->
                </div><!-- single_rating_row  -->
                <div class="single_rating_row">
                    <h2 class="mb-5">mega star c</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="single_card">
                                <div class="row">
                                    @foreach($players as $player)
                                        @if($player->stat->Goals >=10 || $player->stat->Assists >=10 || $player->stat->Saves >=10)

                                            <div class="col-5">
                                                <p class="mb-0">99</p>
                                                <i  class="fa-solid fa-star mb-0 text-warning"></i>
                                                <hr class="w-25 my-1 m-auto">
                                                <img class="mb-0" src="{{asset('site/images/rating/flag.png')}}" alt="">
                                            </div>
                                            <div class="col-7 pe-5">
                                                <img src="{{$player->photo}}" style="width:100px ; height:100px"  alt="">
                                            </div>
                                </div>
                                <h4 class="mb-0">{{$player->name_ar}}</h4>
                                <hr class="m-0 mt-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2  border-end border-1 border-secondary pe-3">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">88</p>
                                                <p class="mb-0">PAC</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Shots*$player->stat->MP)}}</p>
                                                <p class="mb-0">SHO</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->PasTotCmp_per)}}</p>
                                                <p class="mb-0">PAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{rand(70,90)}}</p>
                                                <p class="mb-0">DRI</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Clr*$player->stat->MP)}}</p>
                                                <p class="mb-0">DEF</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval(($player->stat->Starts/$player->stat->MP )* 100)}}</p>
                                                <p class="mb-0">PHY</p>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- row -->
                </div><!-- single_rating_row  -->
                <div class="single_rating_row">
                    <h2 class="mb-5">mega star d</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="single_card">
                                <div class="row">
                                    @foreach($players as $player)
                                        @if($player->stat->Goals >=10 || $player->stat->Assists >=10 || $player->stat->Saves >=10)

                                            <div class="col-5">
                                                <p class="mb-0">99</p>
                                                <i  class="fa-solid fa-star mb-0 text-warning"></i>
                                                <hr class="w-25 my-1 m-auto">
                                                <img class="mb-0" src="{{asset('site/images/rating/flag.png')}}" alt="">
                                            </div>
                                            <div class="col-7 pe-5">
                                                <img src="{{$player->photo}}" style="width:100px ; height:100px"  alt="">
                                            </div>
                                </div>
                                <h4 class="mb-0">{{$player->name_ar}}</h4>
                                <hr class="m-0 mt-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2  border-end border-1 border-secondary pe-3">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">88</p>
                                                <p class="mb-0">PAC</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Shots*$player->stat->MP)}}</p>
                                                <p class="mb-0">SHO</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->PasTotCmp_per)}}</p>
                                                <p class="mb-0">PAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{rand(70,90)}}</p>
                                                <p class="mb-0">DRI</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Clr*$player->stat->MP)}}</p>
                                                <p class="mb-0">DEF</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval(($player->stat->Starts/$player->stat->MP )* 100)}}</p>
                                                <p class="mb-0">PHY</p>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- row -->
                </div><!-- single_rating_row  -->
                <div class="single_rating_row">
                    <h2 class="mb-5">mega star e</h2>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="single_card">
                                <div class="row">
                                    @foreach($players as $player)
                                        @if($player->stat->Goals >=10 || $player->stat->Assists >=10 || $player->stat->Saves >=10)

                                            <div class="col-5">
                                                <p class="mb-0">99</p>
                                                <i  class="fa-solid fa-star mb-0 text-warning"></i>
                                                <hr class="w-25 my-1 m-auto">
                                                <img class="mb-0" src="{{asset('site/images/rating/flag.png')}}" alt="">
                                            </div>
                                            <div class="col-7 pe-5">
                                                <img src="{{$player->photo}}" style="width:100px ; height:100px"  alt="">
                                            </div>
                                </div>
                                <h4 class="mb-0">{{$player->name_ar}}</h4>
                                <hr class="m-0 mt-1">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2  border-end border-1 border-secondary pe-3">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">88</p>
                                                <p class="mb-0">PAC</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Shots*$player->stat->MP)}}</p>
                                                <p class="mb-0">SHO</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->PasTotCmp_per)}}</p>
                                                <p class="mb-0">PAS</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex align-items-center flex-column mt-2">
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{rand(70,90)}}</p>
                                                <p class="mb-0">DRI</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval($player->stat->Clr*$player->stat->MP)}}</p>
                                                <p class="mb-0">DEF</p>
                                            </div>
                                            <div class="d-flex align-items-center  gap-4">
                                                <p class="mb-0">{{intval(($player->stat->Starts/$player->stat->MP )* 100)}}</p>
                                                <p class="mb-0">PHY</p>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- row -->
                </div><!-- single_rating_row  -->
            </div>
            <!-- rating_content -->
        </div>
    </div>
    <!-- heroContent -->
    </section>
    <!-- hero -->
@endsection
