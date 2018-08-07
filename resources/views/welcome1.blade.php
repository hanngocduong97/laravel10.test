<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

</head>
<body>
	<!-- <form action="upload" enctype="multipart/form-data" method="post">
		@csrf
		<input type="file" name="image">
		<button type="submit">ADD</button>
	</form> -->

	<!-- nhiều ảnh -->
	<form action="upload" enctype="multipart/form-data" method="post">
		@csrf
		<input multiple type="file" name="images[]">
		<button type="submit">ADD</button>
	</form>
</body>
</html>