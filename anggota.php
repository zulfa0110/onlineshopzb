<button type="button" class='btn btn-dis'>ANGGOTA</button> 
<br>
<?php  
$batas =  8;
$halaman = $_GET['pg'];
if(empty($halaman)){
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}
$sqlag = mysqli_query($kon, "select * from tbl_anggota order by tgldaftar desc limit $posisi, $batas");
  while($rag = mysqli_fetch_array($sqlag)){  	
  	echo "<div class='dh3'>";
	echo "<div class='card'>";
	echo "<div class='isicard' style='text-align:center;'>";
    echo "<br>";
  	echo "<img src='../foto/$rag[foto]' height='80px' style='border-radius:50%;'>
			<hr>
			  <b>$rag[nama]</b>
			  <hr>
			  $rag[email]
			  <hr>
			  $rag[nohp]
			  <hr>
			  $rag[alamat]
			  <hr>
			<small><i>Terdaftar sejak $rag[tgldaftar] WIB </i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<br><a href='?p=home&idag=$rag[idanggota]'><button type='button' class='btn btn-add'>Home</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
  }

echo "<div class='dh12' align='right'>";

echo "Halaman ";
		
$sqlhal = mysqli_query($kon, "select * from anggota");
$jmldata = mysqli_num_rows($sqlhal);
$jmlhal = ceil($jmldata/$batas);

for($i=1;$i<=$jmlhal;$i++){
  if ($i == $halaman){
	echo "<span class='kotak'><b>$i</b></span> ";
  }
}

if($halaman > 1){
	$previous=$halaman-1;
	echo "<span class='kotak'><a href=?p=anggota&pg=$previous>&laquo; Prev</a></span> ";
}
else
{ 
	echo "<span class='kotak'>&laquo; Prev</span> ";
}

if($halaman < $jmlhal){
	$next=$halaman+1;
	echo "<span class='kotak'><a href=?p=anggota&pg=$next>Next &raquo;</a></span>";
}
else{ 
	echo "<span class='kotak'>Next &raquo;</span>";
}

echo " Total Anggota <span class='kotak'><b>$jmldata</b></span>";
echo "<p></div>";
echo "<p>&nbsp;</p>";
  ?>

