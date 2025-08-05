<button type="button" class='btn btn-dis'>Tambah Produk</button>
<div class="card">
<div class="kepalacard">Tambah Produk</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="nama" type="text" id="nama" placeholder="Nama Produk">
    <input name="harga" type="text" id="harga" placeholder="Harga Produk (dalam Rp.)">
    <input name="stok" type="text" id="stok" placeholder="Stok Produk">
    <textarea name="spek" id="spek" placeholder="Spesifikasi Produk"></textarea>
    <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk (dalam %)">
    <input name="foto1" type="file" id="foto1" /><br>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["nama"]) and !empty($_POST["harga"]) and !empty($_POST["stok"]) and !empty($_POST["spek"]) and !empty($_POST["diskon"])){
    $nmfoto1  = $_FILES["foto1"]["name"];
    $lokfoto1 = $_FILES["foto1"]["tmp_name"];
    if(!empty($lokfoto1)){	
		move_uploaded_file($lokfoto1, "../fotoproduk/$nmfoto1");
    }
	
	$spek   = nl2br($_POST["spek"]);
	
	$sqlp = mysqli_query($kon, "insert into tbl_produk (idadmin, nama, harga, stok, spek,  diskon,  foto1, tglproduk) values ('$ra[idadmin]', '$_POST[nama]', '$_POST[harga]', '$_POST[stok]', '$spek',  '$_POST[diskon]', '$nmfoto1',  NOW())");
	  
	if($sqlp){
	  echo "Produk Berhasil Disimpan";
	}else{
  	  echo "Gagal Menyimpan";
	}
	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=tambahproduk'>";
  }else{
    echo "Data harus diisi dengan lengkap !!!";
  }
}
?>
</div>
</div>