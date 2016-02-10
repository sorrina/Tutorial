<!DOCTYPE html>
<html>
	<head>
		<style type ="text/css">
			.tabledesk{padding:0px 10px;}
		</style>
	</head>
	<body>
<?php
echo '<table>';
for($i=1; $i<=10; $i++)
{
	echo '<tr>';
	for($a=1; $a<=10; $a++)
	{
		$erg = $i*$a;
		echo '<td class="tabledesk">'.$i.' x '.$a.' = '.$erg.'</td>';
	}
	echo '</tr>';
}
echo '</table>';

?>
	</body>

</html>
