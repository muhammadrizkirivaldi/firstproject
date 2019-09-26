<?php

$initial = 30;
$temp = $initial;
$j = 0;
$k = 0;
$faktors = 0;

//ambil bilangan prima
for($i = 1; $i<= $initial; $i++){
	$a = 0;
	for($j = 1;$j<=$i;$j++){
		if($i % $j == 0){
			$a++;
		}
	}
	
	if($a == 2){
		$isikan[$k] = $i;
		$k++;
	}
}

// banding dengan mengambil bilangan prima yang bisa dibagi
foreach($isikan as $bagi => $value){
	if($initial % $value == 0){
		$faktor[$faktors] = $isikan[$bagi];
		$faktors++;
	}
}

// melakukan pemfaktoran
$r = 0;
for($z = 0;$z<sizeof($faktor);$z++){
	if($initial % $faktor[$z] == 0){
		while(true){
			if($initial % $faktor[$z] == 0){
				$real[$r] = $faktor[$z];
				$initial = $initial / $faktor[$z];
				$r++;
			}else{
				break;
			}
		}
	}else{
		continue;
	}
}

echo var_dump($real);
?>

<!-- Tampilkan isi dari pemfaktoran -->
<math display='block' xmlns="http://www.w3.org/1998/Math/MathML">
  <mi><?php echo $temp ?></mi><mo>=</mo>
<?php
for($v = 0;$v<sizeof($real);$v++){
	echo "<mi>".$real[$v]."</mi>";
	if($v < (sizeof($real) - 1)){	
		echo '<mo>*</mo>';
	}
}
?>

<!-- Tampilkan hasil konversi ke pangkat -->
<?php
$timpah = 0;
$klaim = '<mo>=</mo>';
for($v = 0;$v<sizeof($faktor);$v++){
	$pangkat = 0;
	for($g = 0;$g<sizeof($real);$g++){
		if($real[$g] == $faktor[$v]){
			$pangkat++;
		}
	}
	
	if($pangkat == 1){
		$timpah++;
		$klaim .= '<mi>'.$faktor[$v].'</mi>';
	}else{
		$timpah--;
		$klaim .= '<msup><mrow>'.$faktor[$v].'</mrow><mrow>'.$pangkat.'</mrow></msup>';
	}
	
	if($v < (sizeof($faktor) - 1)){	
		$klaim .= '<mo>*</mo>';
		continue;
	}
	
	if($timpah == sizeof($faktor)){
		$klaim = '';
	}
}

echo $klaim;
?>
</math>