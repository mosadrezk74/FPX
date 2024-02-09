@extends('Dashboard.layouts.master')
@section('css')

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
						</div>
					</div>
 				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <label for="playerSelect">Select a player</label>
                    <select id="playerSelect" class="form-control">
                        <option value="">Select a player</option>
                        @foreach($players as $player2)
                            <option value="{{ $player2->id }}">{{ $player2->name_ar }}</option>
                        @endforeach
                    </select>

                    <div class="col-md-6">

                        <h3>{{ $player1->name_ar }}</h3>
                        <img alt="" src="{{ asset('uploads/players/'. $player1->photo) }}"  width="150" height="150" class="brround img-fluid">
                        <img alt="Club Logo" src="{{$player1->club->image}}" class="club-logo ml-1" width="30" height="30">
                        <table class="table table-striped">
                            <tr>
                                <th>Position</th>
                                <td>{{ $player1->position }}</td>
                            </tr>
                            <tr>
                                <th>Height</th>
                                <td>{{ $player1->height }} cm</td>
                            </tr>
                            <tr>
                                <th>Weight</th>
                                <td>{{ $player1->weight }} kg</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <div id="playerData">

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
