<?php 
	$fave5 = ["gaming" , "training" , "thinking" , "eating", "drinking"];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/fave-things.css">
	<title>Favorite things</title>
</head>
<body>
	<table class="table table-striped">
  		
		<h1>Favorite things<h1>
		<?php foreach ($fave5 as $values) { ?>
			<h2><?php echo $values  ?><h2>
		<?php } ?>
  		
	</table>
</body>
</html>