<?php 

if ( (($_GET['nim']) != '') && ($_GET['sesi'] != '') && ($_GET['semester'] != '') ){

	$sesi = $_GET['sesi'];
	$semester = $_GET['semester'];

	// grapping content with curl
	$c = curl_init('http://cybercampus.unair.ac.id/modul/mhs/proses/_akademik-khs-tampil.php');
	curl_setopt($c, CURLOPT_POST, true);
	curl_setopt($c, CURLOPT_POSTFIELDS, 'aksi=tampil&semes='.$semester);
	curl_setopt($c, CURLOPT_VERBOSE, TRUE);
	curl_setopt($c, CURLOPT_COOKIE, 'PHPSESSID='.$sesi);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	session_write_close();
	$page = curl_exec ($c);
	$result = $page;
	curl_close ($c);

	// pengelolahan text
	$findme   = '</table>';
	$pos = strpos($result, $findme);
	$findme   = 'Keterangan';
	$pos_akhir = strpos($result, $findme);
	$selisih = $pos_akhir - $pos;
	$t = substr($result, $pos, $selisih);

	$result = str_replace("window.open","", $result);
	preg_match_all('|<td[^>]*?>(.*?)</td>|si',$result, $hasil);
	preg_match_all('|NIM :(.*?)<p>|si',$result, $hasil2);
	preg_match_all('|IPS (NILAI YG SDH PUBLISH) :(.*?)Jatah SKS|si',$result, $hasil3);

	$nilai = array();
	$n = sizeof($hasil[0]);
	$index = 0;
	for ($i=0; $i < ($n/3); $i++) { 
		$temp = array();
		for ($j=0; $j < 3; $j++) { 
			array_push($temp, $hasil[0][$index]);
			$index++;
		}
		array_push($nilai, $temp);
	}

}

?>

    <h3>Hasil Studi</h3>
    <hr>
    <p style="font-size: 13px !important;">
	    <?php echo $hasil2[0][0].""; ?><p style="font-size: 13px !important;">
	    <?php echo "".$hasil3[0][0].""; ?>
	    <?php echo $t; ?>
    </p>
    <br>

    <table class="table table-hover ">
    	<thead>
			<tr class="success">
				<th width="60%">Mata Kuliah</th>
				<th style="text-align:center" width="10%">S</th>
				<th style="text-align:center" width="30%">N</th>
			</tr>
		</thead>
    	<tbody style="font-size: 13px;">
    		<?php foreach ($nilai as $key): ?>
    		<tr>
    			<?php foreach ($key as $ku): ?>
    			<?php echo $ku ?>
    			<?php endforeach ?>
    		</tr>
    		<?php endforeach ?>
    	</tbody>
    </table>
