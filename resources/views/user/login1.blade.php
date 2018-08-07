<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="{{asset('')}}login" method="POST" role="form">
					<legend>Form title</legend>
					@csrf
				
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" id="" placeholder="Input field" name="email"  value="{{old('email')}}">
					</div>
					@if ($errors->has('email'))
					    <p style="color: red;">{{$errors->first('email')}}</p>
					@endif

					<div class="form-group">
						<label for="">Password</label>
						<input type="text" class="form-control" id="" placeholder="Input field" name="password" value="{{old('password')}}">
					</div>
					
					@if ($errors->has('password'))
					    <p style="color: red;">{{$errors->first('password')}}</p>
					@endif
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>