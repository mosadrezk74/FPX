@extends('site.layout')

@section('css')
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('site/css/rating.css')}}" />
@endsection

@section('contact')

    <div class="heroContent">

        <!--  discover-->
            <section class="py-3 py-md-5 py-xl-8">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                            <p class="fs-5 text-secondary mb-5 text-center">{{trans('site/index.Partners')}}</p>
                            <h1 class="fs-6 text-secondary mb-2 text-uppercase text-center">
                                {{trans('site/index.join_with_us')}}

                            </h1>
                            <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                        </div>
                    </div>
                </div>
                <div class="container overflow-hidden">
                    <div class="row gy-4">
                        @foreach($clubs as $club)
                            <div class="col-6 col-md-4 col-xl-3">
                                <div class="card text-center" style="background-color: transparent; border: none;">
                                    <div class="card-body">
                                        <img src="{{$club->image}}" title="{{$club->name_en}}"
                                             class="card-img-top" alt="Club Image" style="filter: grayscale(100%); width: 50%; height: 55%;">

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
    </div>


        </section>
    </div>
    <!-- heroContent -->
    </section>
    <!-- hero -->
@endsection
