<?php
session_start();
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="app.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>Toko Aisyah Nabila</title>
</head>
<body>
<?php
if(!empty($_SESSION["useradm"]) and !empty($_SESSION["passadm"])){
  $sqla = mysqli_query($kon, "select * from tbl_admin where username='$_SESSION[useradm]' and password='$_SESSION[passadm]'");
  $ra = mysqli_fetch_array($sqla);
?>
    <header>
        <nav>
            <div class="logo">
                <h1>TOKO AISYAH NABILA</h1>
            </div>
            <div class="nav-link">
                <h3><?php echo "$ra[namalengkap]"; ?></h3>
                <li><a href="?p=home"><i class="fa fa-home" title="Halaman Home"></i></a></li>
                <li><a href="?p=lihatproduk"><i class="fa fa-shopping-cart" title="Produk"></i></a></li>
                <li><a href="?p=tambahproduk"><i class="fa fa-cart-plus" title="Tambah Produk"></i></a></li>
                <li><a href="?p=anggota"><i class="fa fa-user" title="Anggota"></i></a></li>
                <li><a href="?p=logout"><i class="fa fa-times" title="LOGOUT"></i></a></li>
            </div>
        </nav>
    </header>
    <section>
        <div class="sliders autoplay">
            <img src="img/laptop1.png" alt="">
            <img src="img/laptop2.png" alt="">
            <img src="img/laptop3.png" alt="">
            <img src="img/laptop4.png" alt="">
        </div>
    </section>
    <div class="grid">
    <div class="dh12">
        <div class="container2">
        <?php
            if($_GET["p"] == "logout"){
                include "logout.php";
            }else if($_GET["p"]=="hapusproduk"){
                include "hapusproduk.php";
            }else if($_GET["p"]=="anggota"){
                include "anggota.php";
            }else if($_GET["p"]=="editproduk"){
                include "editproduk.php";
            }else if($_GET["p"]=="detailproduk"){
                include "detailproduk.php";
            }else if($_GET["p"]=="tambahproduk"){
                include "tambahproduk.php";
            }else if($_GET["p"]=="lihatproduk"){
                include "lihatproduk.php";
            }else {
                include "home.php";
            }
            ?>
            </div>
        </div>
    </div>
    

    <div class="line"></div>

    <div class="sosmed">
        <img src="img/wa.jpg" alt="">
        <img src="img/facebook.webp" alt="">
        <img src="img/ig.jpg" alt="">
        <img src="img/yt.png" alt="">
    </div>

    <div class="foot">
    <div class="footer">
        <div class="tagline">
            <h1>Aisya Nabila</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae illo libero aliquam error eum sunt ipsum sapiente distinctio? Voluptatem perspiciatis et eligendi obcaecati numquam molestias atque accusamus sapiente aliquid sequi?</p>
        </div>
        <div class="service">
            <h1>Service</h1>
            <ul>
                <li><a href="#">Product</a></li>
                <li><a href="#">Harga</a></li>
                <li><a href="#">Kualitas</a></li>
            </ul>
        </div>
        <div class="about">
            <h1>Tentang Kami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis esse minima ratione reprehenderit? Tempora veritatis accusamus perferendis facere necessitatibus distinctio quae recusandae quaerat ea tempore, fugiat sequi voluptate mollitia ipsam!</p>
        </div>
        <div class="contact">
            <h1>Kontak Kami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem labore fugit culpa voluptate officia quas voluptatibus non vel eius magnam!</p>
            <form action="" method="POST">
            <ul>
                <li>
                    <input type="text" name="emailcl" placeholder="Masukkan Email Kalian">
                </li>
            </ul>
            <ul>
                <li>
                <textarea name="pesan" id="pesan" cols="30" rows="3"></textarea>
                </li>
            </ul>
            <ul>
                <li>
                <button type="submit">Kirim Pesan</button>
                </li>
            </ul>
            </form>
        </div>
    </div>
    </div>
    <?php
}else{
  include "login.php";
}
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="slick/slick/slick.min.js"></script>
<script src="slick/slick/slick.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $('.autoplay').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 1000,
});
</script>
</html>