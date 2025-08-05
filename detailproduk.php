<button type="button" class='btn btn-dis'>Produk Detail</button>
  <?php
  $sqlp = mysqli_query($kon, "select * from tbl_produk where idproduk='$_GET[id]'");
  $rp = mysqli_fetch_array($sqlp);
  $hrg = number_format($rp['harga']);
	if($rp['stok']>0){
		$stok = "<font color='#00CC00'>Stok Tersedia</font>";
	}else{
		$stok = "<font color='#FF0000'>Stok Habis</font>";
	}
	if($rp['diskon']>0){
		$disk = ($rp['diskon'] * $rp['harga']) / 100;
		$hrgbaru = $rp['harga'] - $disk;
		$hrgbr = number_format($hrgbaru);
		$diskon = "<font color='#FF0000'> -$rp[diskon]% </font>";
		$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
	}else{
		$hrgbr = "";
		$diskon = "";
		$hrglama = "<b>$hrg</b>";
	}
  	echo "<div class='dh12'>";
	echo "<div class='card'>";
    echo "<div class='kepalacard'><small></small></div>";
	echo "<div class='isicard' style='text-align:justify;'>";
    echo "<br>";
  	echo "<img src='../fotoproduk/$rp[foto1]' border='1' width='140px'>
			<hr>
			<big>$rp[nama]</big>
			<hr>
			<b>IDR $hrgbr</b> $diskon $hrglama
			<hr>
			<b>$stok</b>
			<hr>
			<b>Spesifikasi</b> <br>$rp[spek]
			<hr>
			<small><i>Dibuat pada $rp[tglproduk] WIB 
			<br>Oleh $ra[namalengkap]</i></small>";
	echo "</div>";
	echo "<div class='kakicard'>";
	echo "<br><a href='?p=editproduk&id=$rp[idproduk]'><button type='button' class='btn btn-add'>Ubah Produk</button></a>";
	echo "</div>";
	echo "</div><br>";
	echo "</div>";
  ?>
