<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	</head>
	<body>
		<div class="container py-5 my-5" style="background:#9DDEFF;border-radius: 5px;">

			@foreach($user as $users)

			@if($users->id == $info->user_id )
			
			<h3>User Name :{{$info->name}}</h3>
			
			<table class="table table-borderless">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th scope="col">Check in</th>
						<th scope="col">Check out</th>
					</tr>
				</thead>
			
				<tbody>
					<tr>
						<th>{{$info->date}}</th>
						<td>{{$info->checkin}}</td>
						<td>{{$info->checkout}}</td>
					</tr>
				</tbody>

			</table>

			@endif
			@endforeach
			
		</div>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	</body>
</html>