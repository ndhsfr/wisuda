<?php
	if(isset($_POST['save']))
		{ // jika tombol 'Simpan' ditekan
								
			
			// $program		     	= $_POST['program'];					
			$TA_sem		     		= $_POST['s_TA'];
			// $prodi		     		= $_POST['s_prodi'];
			// $nim			 		= $_POST['t_nim'];

			// $nama			 		= $_POST['t_nama'];
			// $tmpt_lhr				= $_POST['t_tmpt_lhr'];
			// $tgl_lhr		 		= $_POST['t_tgl_lhr'];
			// $alamat	 		 		= $_POST['t_alamat'];
			// $jenkel			 		= $_POST['t_jenkel'];
			// $ipk			 		= $_POST['t_ipk'];
			// $judul_indo				= $_POST['t_judul_indo'];
			// $judul_english			= $_POST['t_judul_english'];
			// $pesan				 	= $_POST['t_pesan'];

			$nim			 		= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_nim']));
										
			$nama			 		= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_nama']));
			$tmpt_lhr				= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_tmpt_lhr']));
			$tgl_lhr		 		= $_POST['t_tgl_lhr'];
			$alamat	 		 		= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_alamat']));
			$jenkel			 		= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_jenkel']));
			$ipk			 		= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_ipk']));
			$judul_indo				= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_indo']));
			$judul_english			= mysqli_real_escape_string($koneksi, htmlentities($_POST['t_judul_english']));
			$pesan				 	=mysqli_real_escape_string($koneksi, htmlentities($_POST['t_pesan']));
							
			$foto 					= $_FILES['foto']['name'];
			$tmp 					= $_FILES['foto']['tmp_name'];


			$cek_bebas_studi = mysqli_query($koneksi, "SELECT * FROM bebas_wisuda WHERE ( (nim = '$nim') & (ket_prodi = 1) & (ket_labkes = 1) & (ket_perpus = 1) & (ket_kti_perpus = 1) & (ket_lp3m = 1) & (ket_keuangan = 1) ) ");

			
			if(mysqli_num_rows($cek_bebas_studi) != 0)
			{
				
				$data=mysqli_fetch_array($cek_bebas_studi);

				$program = $data['program'] ;
				$prodi 	= $data['prodi'] ;

				// Rename nama fotonya dengan menambahkan tanggal dan jam upload
					$tgljam=date('dmYHis');
					$fotobaru = $tgljam."-".$foto;

				// Set path folder tempat menyimpan fotonya
					$path = "foto/".$fotobaru;

					// Extract nama file
					// $extractFile = pathinfo($uploadFile['name']);
					$size = $_FILES['foto']['size']; //untuk mengetahui ukuran file
					$tipe = $_FILES['foto']['type'];// untuk mengetahui tipe file

					if(($size !=0)&&($size>60000))
						{

							echo"<script>alert('Ukuran gambar terlalu besar. MAX=50KB')</script>";
						} 
					else 
						{
							if(move_uploaded_file($tmp, $path)) // Jika proses upload sukses
							{ 
								// Proses simpan ke Database												
								$cek = mysqli_query($koneksi, "SELECT nim FROM pendaftar_wisuda_rega WHERE nim = '$nim' "); 
											
								if(mysqli_num_rows($cek) == 0)
									{ // mengecek apakah no pendaftaran tidak ada dalam database
										$insert = mysqli_query($koneksi, "INSERT INTO pendaftar_wisuda_rega (program, TA_sem, prodi, nim, nama, tmpt_lhr, tgl_lhr, alamat, jenkel, ipk, judul_indo, judul_english, pesan, foto) VALUES ('$program', '$TA_sem', '$prodi', '$nim', '$nama', '$tmpt_lhr', '$tgl_lhr', '$alamat', '$jenkel', '$ipk', '$judul_indo', '$judul_english', '$pesan', '$fotobaru' ) ") or die(mysqli_error()); // query untuk menambahkan data ke dalam database
													
											if($insert) // jika query insert berhasil dieksekusi
												{ 
													echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Berhasil Di Simpan.</div>'; // menampilkan pesan berhasil disimpan
												}else // jika query insert gagal dieksekusi
												{ 
													echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal Di simpan!</div>'; // menampilkan pesan berhasil disimpan
												}
									}else
										{ 
											echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..!</div>'; 
										}
							}
							else
							{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Gagal Upload karena Foto Tidak ada</div>';
							}
						}
			}
			else
			{
				echo"<script>alert('Belum Bisa mendaftar Wisuda , Karena Masih Ada Tanggungan yang belum diselesaikan')</script>";

				// echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Belum Bisa mendaftar Wisuda , Karena Masih Ada Tanggungan yang belum diselesaikan</div>';
			}
		}
	?>
