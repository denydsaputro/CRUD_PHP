<?php 
	include('includes/connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!-- Always force latest IE rendering engine or request Chrome Frame -->
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Use title if it's in the page YAML frontmatter -->
	<title>Kepegawaian</title>
	
	<style>
		body {
			font-family: arial;
		}

		label{
			font-size: 14px;
			font-weight: 700;
		}

		table, tr, th, td {
			border: 1px solid black;
			padding: 5px;
		}
		table {
			border-collapse: collapse;
		}
		
		.text-center{
			text-align: center;
		}

		input, textarea, select {
			width: 100%;
			border: 1px solid black;
			border-radius: 8px;
			padding: 5px;			
			box-sizing: border-box;
		}

		.btn {
			font-size: 14px;
			border-radius: 5px;
			padding: 10px;
		  background-color: white;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  border: none;
		  cursor: pointer;
		}

		.btn-sm {
			font-size: 12px;
			padding: 8px;
		}

		.btn-primary{
			background-color: royalblue;
			color: white;
		}
		.btn-primary:hover {
			background-color: dodgerblue;
			color: white;
		}

		.btn-success{
			background-color: forestgreen;
			color: white;
		}
		.btn-success:hover {
			background-color: darkgreen;
			color: white;
		}

		.btn-warning{
			background-color: darkorange;
			color: white;
		}
		.btn-warning:hover {
			background-color: orange;
			color: white;
		}

		.btn-danger{
			background-color: darkred;
			color: white;
		}
		.btn-danger:hover {
			background-color: indianred;
			color: white;
		}

		@media only screen and (min-width: 1024px) {
			.row {
				width : 100%;
				min-width: 768px;
				margin-bottom: 10px;
			}

			.col-1 {
				width: 8.3% !important;
			}

			.col-2 {
				width: 16.6% !important;
			}

			.col-1, .col-2 {
				position: relative;
			}
		}
	</style>
</head>
<body>
	<div>
		<?php 
			if(!isset($_GET['p'])){
				include('data_pegawai.php');
			} else {
				$page = $_GET['p'];
				include $page.'.php';
			}
		?>
	</div>
</body>
</html>