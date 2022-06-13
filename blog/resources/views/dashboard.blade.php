<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		<link rel="stylesheet" href="{{asset('assets/plugins/datatables.bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
		
		<!-- Theme style -->
		
	</head>
</head>
<body>
	<div class="container py-5">
		
		
		<div class="row d-flex justify-content-between">
			<div class="col-nd-6">
				<a class="btn btn-primary" href="{{ route('logout') }}" style="margin-left: 190px;"
					onclick="event.preventDefault();
					document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</div>
			<div class="col-nd-6">
				<a href="/newregister" class="btn btn-primary " style="margin-right: 190px;">Add Employee</a>
			</div>
		</div>
		
		<div class="row justify-content-center" >
			
			@foreach($users as $key=>$user)
			
			@if ($user->usertype == 'owner')
			@continue
			@endif
			<div class="col-md-8 py-2 my-2" style="background:#9DDEFF;border-radius: 5px;">
				<div class="flex-center position-ref full-height">
					
					<a href="/employee/{{$user->id}}" class="nav-item">{{$user->name}}</a>
					
					
				</div>
			</div>
			
			@endforeach
			<div class="container py-5 my-5" style="background:#9DDEFF;border-radius: 5px;">
				<form id="todaydate" action="searchemployee" method="get">
                                                    {{ csrf_field() }}
                                                  
				<div class="col-md-6" >
					<div class="card-body"style="justify-content: center;" >
						<div class="form-group row">
							<label for="inputEmail3" class="col-sm-2 col-form-label">Date :</label>
							<div class="col-sm-10">
								<p style="margin-top: 5px; font-weight: bold;">{{$todayDate}}</p>
							</div>
						</div>
					</div>
				</div>
			</form>
				
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							
							<th scope="col">Date</th>
							<th scope="col">Name</th>
							<th scope="col">Check In</th>
							<th scope="col">Check Out</th>
							<th scope="col">Hours</th>
						</tr>
					</thead>
					<tbody>
						@foreach($information as $info)

						{{-- @if($info->date == $todayDate) --}}
						<tr>
							
							<td>{{$info->date}}</td>
							<td>{{$info->name}}</td>
							<td>{{$info->checkin}}</td>
							<td>{{$info->checkout}}</td>
							@php
							$checkin = $info->checkin;
							$checkout = $info->checkout;
							$datetime1 = new DateTime($checkin);
							$datetime2 = new DateTime($checkout);
							$interval = $datetime2->diff($datetime1);
							$hours = $interval->format('%H');
							@endphp
							<td>{{$hours}} Hours</td>
						</tr>
						{{-- @endif --}}
						@endforeach
					</tbody>
				</table>
				
				
			</div>
			
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
	<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
	<script>
		$(function () {
	$("#example1").DataTable({
	"responsive": true,
	"autoWidth": false,
	"order": [[ 0, "desc" ]],
	});
	});
		//Initialize Select2 Elements
	$('.select2').select2()
	//Initialize Select2 Elements
	$('.select2bs4').select2({
	theme: 'bootstrap4'
	})
	//Date range picker
	$('#reservationdate').datetimepicker({
	format: 'L'
	});

	$(document).ready(function(){
  $("#todaydate").click(function(){
      $("todaydate").submit()
  });
});
	</script>
</body>
</html>