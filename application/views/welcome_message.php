<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

 
</head>
<body>

<div id="container">
	<?php 
		foreach($data as $row)
				{
					echo $row["newsTitle"]."<br/>";
				}
	?>
</div>

</body>
</html>