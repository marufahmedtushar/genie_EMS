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
	</head>
	<body>
		<div class="container py-5 my-5" style="background:#9DDEFF;border-radius: 5px;">
			
			
			<table class="table table-borderless">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th scope="col">User Type</th>
					</tr>
				</thead>
				
				<tbody>
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->usertype}}</td>
					</tr>
				</tbody>
				
			</table>
			
			
		</div>
		<div class="container py-5 my-5" style="background:#9DDEFF;border-radius: 5px;">
			
			
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
					@foreach($user->informations as $info)
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
					@endforeach
				</tbody>
			</table>


			
			
			
		</div>

		<div class="d-flex justify-content-center my-3" style="">
				<a href="/dashboard" class="btn btn-primary ">Back</a>
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
	"order": [[ 2, "desc" ]],
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
