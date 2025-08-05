<div>

  <?php
  $sqlp = mysqli_query($kon, "select * from tbl_produk");
  $rowp = mysqli_num_rows($sqlp);
  $sqlpl = mysqli_query($kon, "select * from tbl_produk order by tglproduk desc limit 1");
  ?>
  <div>
    <div id="boxval">
	  <p>Produk</p>
	  <h3><?php echo "$rowp";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Produk Terbaru</div>
		<div class="isicard" style="text-align:center;">
		<?php
		if($rowp == 0){
		  echo "<div align='center'>Belum ada produk yang ditambahkan</div>
		  <hr>";
		}else{
			while($rpl = mysqli_fetch_array($sqlpl)){
			  $hrg = number_format($rpl['harga']);
         	  $nm = substr($rpl["nama"],0,30);
			  if($rpl['stok']>0){
				$stok = "<font color='#00CC00'>Stok Tersedia</font>";
			  }else{
				$stok = "<font color='#FF0000'>Stok Habis</font>";
	   		  }
			  if($rpl['diskon']>0){
				$disk = ($rpl['diskon'] * $rpl['harga']) / 100;
				$hrgbaru = $rpl['harga'] - $disk;
				$hrgbr = number_format($hrgbaru);
				$diskon = "<font color='#FF0000'> -$rpl[diskon]% </font>";
				$hrglama = "<font style='text-decoration:line-through'><small>IDR $hrg</small></font>";
			  }else{
				$hrgbr = "";
				$diskon = "";
				$hrglama = "<b>$hrg</b>";
			  }
			  echo "<br>";
  			  echo "<img src='../fotoproduk/$rpl[foto1]' height='60px'>
		  	  <img src='../fotoproduk/$rpl[foto2]' height='60px'>
			  <hr>
			  <b>$nm...</b>
			  <hr>
			  <b>IDR $hrgbr</b> $diskon $hrglama
			  <hr>
			  <b>$stok</b>
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=lihatproduk"; ?>"><button type="button" class="btn btn-add">Lihat Semua Produk &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
  
  <?php
  $sqla = mysqli_query($kon, "select * from tbl_anggota");
  $rowa = mysqli_num_rows($sqla);
  $sqlal = mysqli_query($kon, "select * from tbl_anggota order by tgldaftar desc limit 1");
  ?>
  <div>
    <div id="boxval">
	  <p>Anggota</p>
	  <h3><?php echo "$rowa";?></h3>
	</div>
	<div class="card">
		<div class="kepalacard">Anggota Terbaru</div>
		<div class="isicard" style="text-align:center;">
		<?php
		if($rowa == 0){
		  echo "<hr>";
		  echo "Belum ada anggota yang terdaftar";
		  echo "<hr>";
		}else{
			while($ral = mysqli_fetch_array($sqlal)){
			  echo "<br>";
  			  echo "<img src='../foto/$ral[foto]' height='64px' style='border-radius:50%;'>
			  <hr>
			  <b>$ral[nama]</b>
			  <hr>
			  $ral[email]
			  <hr>
			  $ral[nohp]
			  <hr>";
			}
		}
		?>
		</div>
		<div class="kakicard">
		<a href="<?php echo "?p=anggota"; ?>"><button type="button" class="btn btn-add">Lihat Semua Anggota &raquo;</button></a>
		</div>
	</div>
	<br>
  </div>
  
</div>