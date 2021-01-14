<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PLUGIN</title>
	<!-- Css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">

	<style>
		body {
			font-family: poppins;
		}
	</style>
	<!--using FontAwesome---------------->
	<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</head>

<body>
	<section class="hero">
		<!--navigation------------------------->
		<nav>
			<!--logo-->
			<a href="#home" id="home" class="logo">PLUGIN</a>
			<!--menu-->
			<ul>
				<li><a href="#home" class="active">Home</a></li>
				<li><a href="#about" class="active">About</a></li>
				<li><a href="#follow" class="active">Follow </a></li>


			</ul>
			<!--bars--------------->
			<div class="toggle"></div>

			<!--text----------------------->
			<div class="text-container">
				<p></p>
				<p>PLUG-IN</p>
				<p>PHB Linux User Group Indonesia<br></p>
				<!-- <button class="hire-btn">Button</button>
            <button class="down-cv">Button</button> -->
			</div>
			<!--model---------------------->
			<img alt="" class="model" src="">

		</nav>
	</section>

	<div class="about-container">
		<!--img-->
		<img id="about" src="img/logoPLUGIN.png" alt="">
		<!--about-me-text-->
		<div class="about-text">
			<p>PLUGIN</p>
			<p></p>
			<p>PLUGIN adalah suatu organisasi atau komunitas studi linux dan pengembangan 
			aplikasi di Politeknik Harapan Bersama Tegal. Kami mempunyai tujuan untuk 
			mengenalkan dan mengOpen Source kan mahasiswa dan masyarakat umum dengan 
			berbagai kegiatan yang nantinya bisa membuka wawasan serta mindset OpenSource
			 guna untuk mengurangi angka pembajakan Software di Indonesia</p>
		</div>
	</div>


	<!--services-container---------------------------->
	<div class="services ">
		<!--text-->
		<div class="services-text ">
			<p>PLUGIN SQUAD </p>
			<p></p>
			<p>Setiap Squad mempunyai fokus dan tujuan tersendiri. Dibuatnya Squad agar
				 teman-teman plugin dapat menentukan fokus dimana.</p>
		</div>
		<div class="box-container">
			<!--1------------->
			<div class="box-1">
				<span>1</span>
				<p class="heading">Mobile Development</p>
				<p class="details">Squad mobile adalah squad yang berfokus dalam membahas teknologi seputar 
				pengembangan aplikasi mobile baik penjelasan, tools yang digunakan, serta ruang lingkup mobile.</p>
				<button>See More</button>
			</div>
			<!--2------------->
			<div class="box-2">
				<span>2</span>
				<p class="heading">Website Development</p>
				<p class="details">Squad web adalah squad yang berfokus dalam membahas teknologi 
					seputar pengembangan website baik penjelasan, tools yang digunakan, serta ruang lingkup website.</p>
				<button>See More</button>
			</div>
			<!--3------------->
			<div class="box-3">
				<span>3</span>
				<p class="heading">Network</p>
				<p class="details">Squad yang berfokus dalam pembuatan serta pengelolaan suatu jaringan
				 dengan baik dan memahami konsep dasar yang terdapat dalam suatu jaringan.</p>
				<button>See More</button>
			</div>
		</div>
	</div>

	<!-- COntainer -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-lg-4">
				<!-- <img src="img/logoPLUGIN.png" alt="" class="img-responsive"> -->
			</div>
		</div>
	</div>
	<!-- COntainer -->


	<!--if you have any questions in your mind contact me-->
	<div class="contact-me">
		<h1>If You Have Any Questions In Your Mind ?</p>

			<center><a href="index.php"><button>Ask me</button></a></center>
	</div>

	<!-- awal image gallery -->
		<div class="container">
  <h2 class="text-center mb-5">Achievement</h2>
  <div class="row">
  <?php  
		$query = mysqli_query ($koneksi, "SELECT * FROM upload_image");
		while ($data = mysqli_fetch_assoc($query)){
		?>
    <div class="col-md-4">
      <div class="thumbnail">
        <a href="/w3images/lights.jpg" target="_blank">
		  <img style="width: 300px; height: 200px;" src="<?php echo "file/".$data['nama_image'] ?>" 
		  alt="Lights" style="width:100%">      
        </a>
      </div>
	</div>
	<?php } ?> 
	</div>
		</div>

	<!-- akhir image gallery -->
	
	<!-- Awal Card Tabel -->
	<div class="card mt-3">
		<div class="card-header bg-dark text-white text-center">
			Daftar Anggota PLUGIN
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped">
				<tr>
					<th>No.</th>
					<th>N0 Anggota</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Squad</th>
				</tr>
				<?php
				$no = 1;
				$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
				while ($data = mysqli_fetch_array($tampil)) :?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['nim'] ?></td>
						<td><?= $data['nama'] ?></td>
						<td><?= $data['alamat'] ?></td>
						<td><?= $data['prodi'] ?></td>

					</tr>
				<?php endwhile; //penutup perulangan while ?>
			</table>
		</div>
	</div>
	<!-- Akhir Card Tabel -->


	<!--footer--------------->
	<footer>
		<!--heading-->
		<p id="follow">Follow<a style="color: black;" href="https://plug-in.web.id/"> PLUGIN </a>on </p>
		<!--paragraph-->
		<p></p>
		<!--social-->
		<div class="social-icons">
			<a href="https://www.facebook.com/pluginofficiall"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.instagram.com/pluginofficiall/"><i class="fab fa-instagram"></i></a>
			<a href="https://github.com/plugintegal/"><i class="fab fa-github"></i></a>
			<a href="https://www.youtube.com/channel/UCW0p5Y6cNZ34G1LkY46xeLg"><i class="fab fa-youtube"></i></a>

		</div>
		<!--copyright-->
		<p class="copyright">Copyright by KFDL</p>
	</footer>
	<!--social-attach-bar-->
	<div class="social">
		<a href="https://www.facebook.com/pluginofficiall"><i class="fab fa-facebook-f"></i></a>
		<a href="https://www.instagram.com/pluginofficiall/"><i class="fab fa-instagram"></i></a>
		<a href="https://github.com/plugintegal/"><i class="fab fa-github"></i></a>
	</div>

</body>

</html>