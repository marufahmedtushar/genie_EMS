<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	</head>
	<body>
		<div class="container py-5">
			@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
			@guest
			<div class="row justify-content-center" >
				<div class="col-md-8" style="background:#9DDEFF;border-radius: 5px;">
					<div class="flex-center position-ref full-height">
						
						<a href="login">login</a>
						<a href="register">register</a>
						
						
						
						<div class="content">
							<div class="title m-b-md">
								Employee Management System
							</div>
							
						</div>
					</div>
				</div>
			</div>
			@else
			
			
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
					<a href="" class="btn btn-primary " style="margin-right: 190px;">{{ Auth::user()->name }}</a>
				</div>
			</div>
			<div class="container d-flex justify-content-center p-5">
				<div class="">
					{{$todayDate}}
					{{$todayTime}}
					<form action="/checkin"  method="POST">
						{{ csrf_field() }}
            			{{ method_field('PUT') }}
						<input type="hidden" name="name" value="{{ Auth::user()->name }}">
						<input type="hidden" name="date" value="{{$todayDate}}">
						<input type="hidden" name="checkin" value="{{$todayTime}}">
						<button type="submit" class="btn btn-primary" >Check In</button>
					</form>
				</div>
			</div>
			
			@endguest
		</div>
		<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
	</body>
</html>