<?php 
	// Membuat koneksi ke database
	$koneksi=mysqli_connect("localhost","root","","bento","8111");

	function query($query){
		// variabel didalam function dan diluar functions itu beda
		global $koneksi;

		// result itu lemarinya
		$result=mysqli_query($koneksi,$query);
		// wadah kosong/array kosong
		$rows=[];
		while ( $row=mysqli_fetch_row($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		global $koneksi;

		// upload gambar
		// $gambar=upload();
		// // !not
		// if(!$gambar){
		// 	return false;
		// }

		// ambil data dari tiap elemen dalam form
		$gambar=htmlspecialchars($data['gambar']);
		$id=htmlspecialchars($data['id']);
		$nama=htmlspecialchars($data['nama']);
		$harga=htmlspecialchars($data['harga']);
//  htmlspecialchars() dapat digunakan untuk mengubah beberapa karakter yang telah ditentukan menjadi entitas HTML

		// query insert data
		$query="INSERT INTO tambahmenu VALUES ('$id','$gambar','$nama','$harga')";

		mysqli_query($koneksi, $query);
		

		return mysqli_affected_rows($koneksi);
		}


		// function upload(){
		// 	$namafile=$_FILES['gambar']['name'];
		// 	$ukurangfile=$_FILES['gambar']['size'];
		// 	$error=$_FILES['gambar']['error'];
		// 	$tmps=$_FILES['gambar']['tmp_name'];

		// 	// cek apakah tdk ada gambar yg di upload
		// 	// if($erorr===4){
		// 	// 	echo "
		// 	// 	<script>
		// 	// 		alert('Pilih Gambar!')
		// 	// 	</script>";
		// 	// 	return false;
		// 	// }


		// 	// cek apakah yg diupload adalah gambar
		// 	$ekstensigambar=['jpg','jpeg','png'];
		// 	// explode, fungsi untuk memecah sebuah string menjadi array
		// 	$ekstensi= explode('.', $namafile);
		// 	// strlower merubahnya menjadi huruf kecil semua
		// 	$ekstensi=strtolower(end($ekstensigambar))
		// 	;

		// 	if(!in_array($ekstensi, $ekstensigambar)){
		// 		echo "
		// 		<script>
		// 			alert('Yg diupload bukan gambar!')
		// 		</script>";
		// 		return false;
		// 	}


		// 	// cek jika ukurannya terlalu besar
		// 	if ($ukurangfile>1000000){
		// 		echo"
		// 		<script>
		// 			alert('Yg diupload bukan gambar!')
		// 		</script>";
		// 	}


		// 	// generate nama gambar  baru
		// 	$namafilebaru=uniqid();
		// 	namafilebaru.='.';
		// 	$namafilebaru.=$ekstensi;
			


		// 	// lolos pengeceken,gambar siap upload
		// 	move_uploaded_file($tmps, 'img' . $namafile);
		// 	return $namafile;


		// }


		function hapus($id){
			global $koneksi;

			mysqli_query($koneksi,"DELETE FROM tambahmenu WHERE id_menu=$id");

			return mysqli_affected_rows($koneksi);
		}



?>