<html>

	<head>
		<title>Алгоритм</title>
	</head>

	<body>

		<div id="a-set">
			<form action="" method="GET">
				<input type="text" name="new-a" value="некий $a">
				<input id="button" type="submit" name="a-set">
			</form>
		</div> 

		<style type="text/css">

			body{
				display: table;
			    margin: auto;
			}

			li{
				list-style: none;
			}

			div{
				margin: 10px;
			}

			input{
				padding: 10px;
				border-radius: 5px;
				border: 1px solid lightgray;
			}

			input#button{
				padding: 10px;
				border-radius: 5px;
				border: 1px solid lightgreen;
				background-color: lightgreen;
			}

		</style>

		<div id="list">
			<ul>
				<?php 
					function shift_array(&$arr, $pos, $val){
						foreach ($arr as $key => $value) {
							if($key < $pos) continue;

							$arr[$key+1] = $value;
						}

						$arr[$pos+1] = $val;
					}

					function ex($a){
						$nums = [];

						for($i = 0; $i < 20; $i++) $nums[$i] = rand(1, 100);

						$len = 20;

						for($i = 0; $i < $len; $i++){
							if(str_contains("$nums[$i]", '2')){
								shift_array($nums, $i, $a);

								$len++;
								$i++;
							}
						}

						foreach ($nums as $key => $value) echo "<li>Key: $key ; Value: $value</li>";
					}

					if(isset($_GET['a-set'])){
						ex($_GET['new-a']);
					}

				?>
			</ul>
		</div>
	</body>

</html>