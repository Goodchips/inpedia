<?php

/*
$services = getenv("VCAP_SERVICES");
$mysql_service = $services["mysql-5.1"]["credentials"];

$mysql_host = $mysql_service["host"];
$mysql_port = $mysql_service["port"];
$mysql_user = $mysql_service["user"];
$mysql_pwd = $mysql_service["password"];
*/

$services = json_decode(getenv("VCAP_SERVICES"),true);
$mysql_service = $services['mysql-5.1'][0]["credentials"];

$mysql_host = $mysql_service["host"];
$mysql_port = $mysql_service["port"];
$mysql_user = $mysql_service["user"];
$mysql_pwd = $mysql_service["password"];

$link = mysql_connect($mysql_host.":".$mysql_port, $mysql_user, $mysql_pwd);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('d979c3a46bed648ceb6bff39cc3a31c71',$link);
mysql_query("SET NAMES 'utf8'");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inpedia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
<?php
	$query = "SELECT * FROM dreamers";
	$result = mysql_query($query,$link);

	if ($result){
		$cpt = 0;
		while($row = mysql_fetch_assoc($result)){
?>
		<div class="wrapper-card-h">
			<div class="card-h">
				<div class="bg">
					<div class="content">
							<div class="first-content"><table><tr><td class="name"><?php echo $row['name'] ?></td></tr></table></div>
							<div class="second-content"><table><tr><td class="effect_solo"><?php echo $row['effect_solo'] ?></td></tr></table></div>
							<div class="third-content"><table><tr><td class="cat">Rêveur</td></tr></table></div>
							<div class="fourth-content"><table><tr><td class="effect_multi"><?php echo $row['effect_multi'] ?></td></tr></table></div>
							<div class="fifth-content"><table><tr><td class="rarity">X</td><td class="extension">0.0.1</td><td class="num"><?php echo $row['num'] ?></td></tr></table></div>
					</div>
				</div>
			</div>
		</div>
<?php
			$cpt = $cpt + 1;
			if ($cpt % 3 == 0 ) { echo '<div style="clear:both"></div>'; }
			if ($cpt % 12 == 0 ) { echo '<div style="page-break-after:always"></div>'; }
		}
	}
	else{
		die('Impossible d\'exécuter la requête :' . mysql_error());
	}
?>
<div style="clear:both;page-break-after:always"></div>
<?php
	$query = "SELECT * FROM cards";
	$result = mysql_query($query,$link);

	if ($result){
		$cpt = 0;
		while($row = mysql_fetch_assoc($result)){
?>
		<div class="wrapper-card-v">
			<div class="card-v">
				<div class="bg">
					<div class="content">
						<div class="first-content"><table><tr><td class="name"><?php echo $row['name'] ?></td><td class="cost"><?php echo $row['cost'] ?></td></tr></table></div>
						<div class="second-content"><table><tr><td class="image"></td></tr></table></div>
						<div class="third-content"><table><tr><td class="cat"><?php echo $row['cat'] ?></td></tr></table></div>
						<div class="fourth-content"><table><tr><td class="effect"><?php echo $row['effect'] ?></td></tr></table></div>
						<div class="fifth-content"><table><tr><td class="rarity"><?php echo $row['rarity'] ?></td><td class="extension">0.0.1</td><td class="num"><?php echo $row['num'] ?></td></tr></table></div>
					</div>
				</div>
			</div>
		</div>
<?php
			$cpt = $cpt + 1;
			if ($cpt % 3 == 0 ) { echo '<div style="clear:both"></div>'; }
			if ($cpt % 12 == 0 ) { echo '<div style="page-break-after:always"></div>'; }
		}
	}
	else{
		die('Impossible d\'exécuter la requête :' . mysql_error());
	}
?>
</body>
</html>
<?php
	mysql_close($link);
?>