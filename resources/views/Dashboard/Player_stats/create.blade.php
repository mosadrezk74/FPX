@extends('Dashboard.layouts.master')
@section('title')
    Create Players
@stop

@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="my-auto">
			<div class="d-flex">
				<h4 class="content-title mb-0 my-auto"> {{trans('Dashboard/main-sidebar_trans.clubs')}}</h4><span
						class="text-muted mt-1 tx-13 mr-2 mb-0">/
               {{trans('Dashboard/main-sidebar_trans.add_clubs')}}</span>
			</div>
		</div>
	</div>
	<!-- breadcrumb -->
@endsection
@section('content')

	@include('Dashboard.messages_alert')
	<div style="background-color: white">
	<!-- row -->
	<div class="row" >
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body" >
					<form id="playerStatsForm" action="{{ route('player_stats.store') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<label for="club" class="control-label mb-1">اختر النادي:</label>
							<select id="club" name="club_id" class="form-control" required>
								<option value="">اختر ناديًا</option>
								@foreach($clubs as $club)
									<option value="{{ $club->id }}">{{ App::getLocale() == 'ar' ? $club->name_ar : $club->name_en }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="player" class="control-label mb-1">اختر اللاعب:</label>
							<select id="player" name="player_id" class="form-control" required>
								<!-- الخيارات ستتم إضافتها باستخدام AJAX -->
							</select>
						</div>

						<div id="playerInfo">لا يوجد لاعب محدد حتى الآن.</div>

						<button type="submit">إضافة إحصائيات</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>



@endsection

<script>
	$(document).ready(function() {
		$('#club').on('change', function() {
			var clubId = $(this).val();

			if (clubId) {
				$.ajax({
					url: '/get-players/' + clubId,
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						console.log(data);
						$('#player').empty();
						$.each(data, function(key, value) {
							$('#player').append('<option value="' + value.id + '">' + value.name_ar + '</option>');
						});
					}
				});
			} else {
				$('#player').empty();
			}
		});
	});
</script>










