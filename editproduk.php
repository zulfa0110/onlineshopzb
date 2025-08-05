<?php
$sqlp = mysqli_query($kon, "select * from tbl_produk where idproduk='$_GET[id]'");
$rp = mysqli_fetch_array($sqlp);
?>
<button type="button" class='btn btn-dis'>Ubah Produk</button>
<div class="card">
<div class="kepalacard">Ubah Produk</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="idproduk" type="hidden" id="idproduk" value="<?php echo "$rp[idproduk]"; ?>">
    <input name="nama" type="text" id="nama" value="<?php echo "$rp[nama]"; ?>" placeholder="Nama Produk">
    <input name="harga" type="text" id="harga" value="<?php echo "$rp[harga]"; ?>" placeholder="Harga Produk (dalam Rp.)">
    <input name="stok" type="text" id="stok" value="<?php echo "$rp[stok]"; ?>" placeholder="Stok Produk">
    <textarea name="spek" id="spek" placeholder="Spesifikasi Produk"><?php echo "$rp[spek]"; ?></textarea>
    <input name="diskon" type="text" id="diskon" value="<?php echo "$rp[diskon]"; ?>" placeholder="Diskon Produk (dalam %)">
    <p><img src="<?php echo "../fotoproduk/$rp[foto1]"; ?>" height="200px" /><br>
	<input name="foto1" type="file" id="foto1" /><br>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["nama"]) and !empty($_POST["harga"]) and !empty($_POST["stok"]) and !empty($_POST["spek"]) ){
    $nmfoto1  = $_FILES["foto1"]["name"];
    $lokfoto1 = $_FILES["foto1"]["tmp_name"];
    if(!empty($lokfoto1)){	
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
		$foto1 = ", foto1='$nmfoto1'";
    }else{
    	$foto1 = "";
  	}
	
	$sqlp = mysqli_query($kon, "update tbl_produk set nama='$_POST[nama]', harga='$_POST[harga]', stok='$_POST[stok]', spek='$_POST[spek]', diskon='$_POST[diskon]' $foto1  where idproduk='$_POST[idproduk]'");
	  
	if($sqlp){
	  echo "Perubahan Produk Berhasil Disimpan";
	}else{
  	  echo "Gagal Menyimpan";
	}
	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=lihatproduk'>";
  }else{
    echo "Data harus diisi dengan lengkap !!!";
  }
}
?>
</div>
</div>