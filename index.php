<?php
require('config.php');

$system = new System;

/* --------------------------------------------------------------
 * Get current directory
 * -------------------------------------------------------------- */
$base = rtrim(str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(__FILE__)), '/');

?><!doctype html>
<html>
<head>
  <title><?php echo $system->os->hostname; ?></title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="favicon.ico">
  <meta http-equiv="refresh" content="<?php echo $refresh ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="static/gradient.css">
</head>

<body>
	<div id="container">
		<h1>
		    <?php echo $system->os->hostname; ?>
		    <small id="uptime">
		    	online for <?= $system->uptime->days; ?> days,
		    	<?= $system->uptime->hours; ?> hours,
		    	<?= $system->uptime->minutes; ?> minutes
		    </small>
		</h1>

	<?php
		/* --------------------------------------------------------------
		 * Show widgets
		 * -------------------------------------------------------------- */
		$directory = dirname(__FILE__) . '/widgets';
		$widgets = scandir($directory,  SCANDIR_SORT_ASCENDING);

		foreach ($widgets as $widget) {
		    if ($widget != '.' && $widget != '..') {
		        include($directory . '/' . $widget);
		    }
		}
	?>

	</div>
</body>
</html>
