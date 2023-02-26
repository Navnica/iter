<html>

	<head>
		<title>Upload page</title>
	</head>

	<body>
		<div class="sendform">
			<form action="" method="POST" enctype="multipart/form-data">
				<input id="file" type="file" name="filename" text="">
				<input id="sendfile" type="submit" name="sendfile">
			</form>
		</div>
	</body>

	<style type="text/css">
		div{
			display: flex;
			justify-content: center;
			text-align: center;
		}

		input#file{
			display: block;
			padding: 10px;
			margin: 10px;
			border: 3px lightgray dashed;
		}

		input#sendfile{
			padding: 10px;
			border-radius: 5px;
			border: 1px solid lightgreen;
			background-color: lightgreen;

		}

	</style>

	<?php
		if(isset($_POST['sendfile']))
			if($_FILES['filename']['type'] != 'text/csv')
				header("Refresh: 0");
			else
				savefile();

		function savefile(){

			if (($file = fopen($_FILES['filename']['tmp_name'], 'r')) != false) {
			    while (($data = fgetcsv($file, 1000, ',')) != false) {
			    	$new_file = fopen("upload/$data[0]", 'w');
			        fwrite($new_file, $data[1]);
			        fclose($new_file);
			    }

			    fclose($file);
			}
		}
	?>

</html>