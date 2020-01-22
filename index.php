<!Doctype>
<html>
	<head>
		<meta charset="UTF-8">
		<style>
			a {
				color: blue;
				text-decoration: none; /* no underline */
			}
		</style>
	</head>
<body>
<form action="./index.php" method="post">
	<h2>Algorytm generowania podzbiorów i permutacji</h2><br>
	Tutaj podać ciąg oddzielony przecinkami np. <b>1,2,3,4</b>:
	<input type="text" name="liczby">
	<input type="submit" value="Wyślij">
</form>
<?php	
if(@$_POST["liczby"]){
	$tablicaliczb = explode(",", $_POST["liczby"]);
	$n = count ($tablicaliczb); //ilość elementów 2^n 2^4=16
	$ileelementow=pow(2, $n);
	$array[2^$n]=null;

	$jedynki=1;
	for($i=1; $i<$n; $i++){
		$jedynki=$jedynki.'1';
	}

	$i=0;
	while($i<=bindec($jedynki)){
		$abc=sprintf( '%00'.$n.'d', decbin($i));
		$array[$i]=$abc;
		
		echo $array[$i]."  ";
		
		$mnożenie=null;
		$znaki = str_split($abc);
		for($j=0; $j<=$n-1 ;$j++){
			if($j==0){
				$mnożenie=$mnożenie."{";
			}
			if($znaki[$j]==1){
				$mnożenie=$mnożenie.$tablicaliczb[$j].",";
			}
			if($j==$n-1){
				if(strlen($mnożenie)>2){
					$mnożenie = substr($mnożenie, 0, -1);
				}
				$mnożenie=$mnożenie."}";
			}
		}
		echo $mnożenie."<br>";
		$i++;
	}
}
?>
<br>
<a href="matma.txt"><b>Zobacz kod źródłówy tego algorytmu</b></a>
</body>
</html>