@extends('Dashboard.layouts.master')
@section('css')
@endsection
@php
    use Carbon\Carbon;

        $startYear = 1966;
             $endYear = 1980;

             $year = rand($startYear, $endYear);
             $month = rand(1, 12);
             $day = rand(1, 28);

             $randomDate = Carbon::create($year, $month, $day);

             $formattedRandomDate = $randomDate->toDateString();

@endphp
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
                            @if(App::getlocale()=='ar')
							<h4 class="content-title mb-0 my-auto">تحديث البيانات</h4>
                                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$coach->club->name_ar}}</span>
                            @else
                                <h4 class="content-title mb-0 my-auto">Update Profile</h4>
                                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$coach->club->name_en}}</span>
                            @endif

						</div>
					</div>


					</div>

				<!-- breadcrumb -->
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- row -->
				<div class="row row-sm">
                    <div class="container">
                        <div class="row flex-lg-nowrap">


                            <div class="col">
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="e-profile">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div class="d-flex justify-content-center align-items-center rounded" >
                                                                     @if($coach && $coach->photo)
                                                                        <img alt="user-img" class="d-flex justify-content-center align-items-center rounded" src="{{ asset('uploads/coach_logo/'. $coach->photo) }}">
                                                                    @else
                                                                        <img alt="user-img" class="avatar avatar-xl brround" src="{{ asset('Dashboard/img/faces/6.jpg') }}">
                                                                    @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                @if(App::getlocale() == 'ar')
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-center">{{$coach->name_ar}}</h4>
                                                                @else
                                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap text-center" >{{$coach->name_en}}</h4>
                                                                @endif

                                                                <div class="text-muted text-center"><small>{{$coach->email}}</small></div>

                                                            </div>
                                                            <div class="text-center text-sm-right">
                                                                <span class="badge badge-secondary">
                                                                    @if(Auth::guard('coach')->check())
                                                                        @if(App::getlocale() == 'ar')
                                                                             مــدرب  {{$coach->club->name_ar}}
                                                                        @else
                                                                            {{$coach->club->name_en}}'s Coach
                                                                        @endif
                                                                    @endif
                                                                </span>
                                                                <div class="text-muted text-center"><small>{{$formattedRandomDate}}</small></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-content pt-3">
                                                        <div class="tab-pane active">
                                                            {{--##############################################################################################################################--}}
                                                            <form action="{{ route('coach.update', ['id' => $coach->id]) }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>{{trans('coach.name_ar')}}</label>
                                                                                    <input class="form-control" type="text" name="name_ar" value="{{ $coach->name_ar }}">
                                                                                </div>
                                                                                @error('name_ar')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>{{trans('coach.name_en')}}</label>
                                                                                    <input class="form-control" type="text" name="name_en" value="{{ $coach->name_en }}"></div>
                                                                            </div>

                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Club</label>
                                                                                    @if(App::Getlocale() == 'ar')
                                                                                        <input class="form-control" type="text" disabled value="{{ $coach->club->name_ar }}">
                                                                                    @else
                                                                                        <input class="form-control" type="text" disabled value="{{ $coach->club->name_en }}">
                                                                                    @endif

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Email</label>
                                                                                    <input class="form-control" type="text" name="email" value="{{ $coach->email }}">
                                                                                    @error('email')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                            <div class="form-group">
                                                                                <label>Change Photo</label>
                                                                                <input type="file" name="photo" class="form-control-file">
                                                                                @error('photo')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12 col-sm-6 mb-3">
                                                                        <div class="mb-2"><b>Change Password</b></div>

                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>New Password</label>
                                                                                    <input class="form-control" type="password"
                                                                                           name="password" placeholder="••••••">
                                                                                    @error('password')
                                                                                    <span class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                                     </div>
                                                                </div>
                                                                <button class="btn btn-primary" type="submit">Save Changes</button>

                                                            </form>

                                                            {{--##############################################################################################################################--}}
                                                            {{--##############################################################################################################################--}}

                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>




                            </div>
                        </div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
@endsection
