<?php
session_start();
if(!isset($_SESSION["login"])){
	header("location: login.php");
	exit;
}
	include 'koneksi.php';
	//jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{	
			//Data akan disimpan Baru
			$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, prodi)
										  VALUES ('$_POST[tnim]', 
										  		 '$_POST[tnama]', 
										  		 '$_POST[talamat]', 
										  		 '$_POST[tprodi]')
										 ");
			if($simpan) //jika simpan sukses
			{
				echo "<script>
						alert('Simpan data suksess!');
						document.location='admin.php';
				     </script>";
			}
			else
			{
				echo "<script>
						alert('Simpan data GAGAL!!');
						document.location='admin.php';
				     </script>";
			
		}	
	}


	//Pengujian jika tombol Edit / Hapus di klik
	if(isset($_GET['hal']))
	{
		//Pengujian jika edit Data
		if($_GET['hal'] == "edit")
		{
			//Tampilkan Data yang akan diedit
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			$data = mysqli_fetch_array($tampil);
			if($data)
			{
				//Jika data ditemukan, maka data ditampung ke dalam variabel
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$valamat = $data['alamat'];
				$vprodi = $data['prodi'];
			}
		}
		else if ($_GET['hal'] == "hapus")
		{
			//Persiapan hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]' ");
			if($hapus){
				echo "<script>
						alert('Hapus Data Suksess!!');
						document.location='admin.php';
				     </script>";
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Data Anggota</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<h1 class="text-center">Data Anggota PLUGIN</h1>
	<h2 class="text-center"></h2>

	<!-- Awal Card Form -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-center text-white">
	    Form Input Data Anggota PLUGIN
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>No Anggota</label>
				<input type="text" name="tnim" value="<?=@$vnim?>" class="form-control" 
				placeholder="Input no anggota disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama</label>
				<input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" 
				placeholder="Input Nama disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Alamat</label>
				<textarea class="form-control" name="talamat" 
				 placeholder="Input Alamat disini!"><?=@$valamat?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Squad</label>
	    		<select class="form-control" name="tprodi">
	    			<option value="<?=@$vprodi?>"><?=@$vprodi?></option>
	    			<option value="Mobile Squad">Squad Mobile</option>
	    			<option value="Website Squad">Squad Website</option>
	    			<option value="Network Squad">Squad Network</option>
	    		</select>
	    	</div>
	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
	    </form>
	  </div>
	</div>
	<!-- Akhir Card Form -->

	<!-- upload gambar -->
	
	<div class="card mt-3">
	  <div class="card-header bg-dark text-center text-white">
	    Form Upload gambar
	  </div>
	  <div class="card-body">
	<form action="upload.php" method="POST" enctype="multipart/form-data">
  <center>	<input type="file" name="file">
	<input type="submit" name="upload" value="upload"></center>
	</form>
	</div>
	</div>
	
	<!-- end upload gambar -->

	<!-- Awal Card Tabel -->
	<div class="card mt-3">
	  <div class="card-header bg-dark text-white">Preview</div>
	  <div class="card-body">
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		<th>No.</th>
	    		<th>No Anggota</th>
	    		<th>Nama</th>
	    		<th>Alamat</th>
	    		<th>Squad</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from tmhs order by id_mhs desc");
	    		while($data = mysqli_fetch_array($tampil)):?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nim']?></td>
	    		<td><?=$data['nama']?></td>
	    		<td><?=$data['alamat']?></td>
	    		<td><?=$data['prodi']?></td>
	    		<td>
	    			<a href="admin.php?hal=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning"> Edit </a>
	    			<a href="admin.php?hal=hapus&id=<?=$data['id_mhs']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile; //penutup perulangan while ?>
	    </table>
	  </div>
	</div>
	<!-- Akhir Card Tabel -->

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
