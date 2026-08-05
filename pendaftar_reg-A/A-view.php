<div class="box-body  table-responsive">
	<table id="example1" class="table table-striped table-hover">
		<thead>
		<tr>
			<th class="text-center">NO</th>
			<th class="text-center">FOTO</th>
			<th>TAHUN AKADEMIK</th>
			<th>PRODI</th>
			<th>NIM</th>
			<th>NAMA</th>
			<th>TMPT_LAHIR</th>
			<th>TGL_LAHIR</th>			
			<th>ALAMAT</th>
			<th>JEN_KEL</th>
			<th>IPK</th>	
			<th>JUDUL_TA_VERSI_INDONESIA</th>
			<th>JUDUL_TA_VERSI_ENGLISH</th>
			<th>PESAN_&_KESAN</th>		
			<th>tool-action******</th>
		</tr>
		</thead>
		<tbody>
		<?php
		// Include / load file koneksi.php
		include "koneksi.php";
		
		// Buat query untuk menampilkan semua data siswa
		$sql = $pdo->prepare("SELECT * FROM pendaftar_wisuda_rega");
		$sql->execute(); // Eksekusi querynya
		
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		?>
			<tr>
				<td class="align-middle text-center"><?php echo $no; ?></td>
				<td class="align-middle text-center">
					<img src="foto/<?php echo $data['foto']; ?>" width="80" height="80">
				</td>
				<td class="align-middle"><?php echo $data['TA_sem']; ?>
				<input type="hidden" id="TA_sem-value-<?php echo $no; ?>" value="<?php echo $data['TA_sem']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['prodi']; ?>
				<input type="hidden" id="prodi-value-<?php echo $no; ?>" value="<?php echo $data['prodi']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['nim']; ?>
				<input type="hidden" id="nim-value-<?php echo $no; ?>" value="<?php echo $data['nim']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['nama']; ?>
				<input type="hidden" id="nama-value-<?php echo $no; ?>" value="<?php echo $data['nama']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['tmpt_lhr']; ?>
				<input type="hidden" id="tmpt_lhr-value-<?php echo $no; ?>" value="<?php echo $data['tmpt_lhr']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['tgl_lhr']; ?>
				<input type="hidden" id="tgl_lhr-value-<?php echo $no; ?>" value="<?php echo $data['tgl_lhr']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['alamat']; ?>
				<input type="hidden" id="alamat-value-<?php echo $no; ?>" value="<?php echo $data['alamat']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['jenkel']; ?>
				<input type="hidden" id="jenkel-value-<?php echo $no; ?>" value="<?php echo $data['jenkel']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['ipk']; ?>
				<input type="hidden" id="ipk-value-<?php echo $no; ?>" value="<?php echo $data['ipk']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['judul_indo']; ?>
				<input type="hidden" id="judul_indo-value-<?php echo $no; ?>" value="<?php echo $data['judul_indo']; ?>">
				</td>	
				<td class="align-middle"><?php echo $data['judul_english']; ?>
				<input type="hidden" id="judul_english-value-<?php echo $no; ?>" value="<?php echo $data['judul_english']; ?>">
				</td>
				<td class="align-middle"><?php echo $data['pesan']; ?>
				<input type="hidden" id="pesan-value-<?php echo $no; ?>" value="<?php echo $data['pesan']; ?>">
				</td>						
				
				<td class="align-middle text-center">
					<a href="javascript:void();" data-toggle="modal" data-target="#form-modal" onclick="edit(<?php echo $no; ?>);" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="javascript:void();" data-toggle="modal" data-target="#delete-modal" onclick="hapus(<?php echo $no; ?>);" class="btn btn-danger"><span class="glyphicon glyphicon-erase"></span></a>
				</td>
			</tr>
			<!--
			-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah
			-->
		
						
		<?php
			$no++; // Tambah 1 setiap kali looping
		}
		?>
		
		</tbody>
	</table>
		<script src="../js/jquery.dataTables.js"></script>
		<script src="../js/dataTables.bootstrap.js"></script>	
		<script type="text/javascript">
				$(function() {
					$('#example1').dataTable();
				});
    	 </script>

</div>

<script>
        // Fungsi ini akan dipanggil ketika tombol edit diklik
        function edit(no){
            $("#btn-simpan").hide(); // Sembunyikan tombol simpan
            $("#btn-ubah, #checkbox_foto").show(); // Munculkan tombol ubah dan checkbox foto
            
            // Set judul modal dialog menjadi Form Ubah Data
            $("#modal-title").html("Form Ubah data");
            
            
            // mengambil variable dari input type hidden
            var TA_sem = $("#TA_sem-value-" + no).val();
            var prodi = $("#prodi-value-" + no).val();
            var nim = $("#nim-value-" + no).val(); 
            var nama = $("#nama-value-" + no).val();
            var tmpt_lhr = $("#tmpt_lhr-value-" + no).val(); 
            var tgl_lhr = $("#tgl_lhr-value-" + no).val(); 
            var alamat = $("#alamat-value-" + no).val(); 
            var jenkel = $("#jenkel-value-" + no).val(); 
            var ipk = $("#ipk-value-" + no).val(); 
            var judul_indo = $("#judul_indo-value-" + no).val(); 
            var judul_english = $("#judul_english-value-" + no).val();
            var pesan = $("#pesan-value-" + no).val(); 
            
            
            // Set value textbox yang ada di form modal ketika klik edit
            // dan Set textbox nim menjadi Readonly supaya nim tdk bs di ubah2
            $("#nim").val(nim).attr("readonly","readonly");
            
            $("#TA_sem").val(TA_sem); 
            $("#prodi").val(prodi); 
            $("#nama").val(nama); 
            $("#tmpt_lhr").val(tmpt_lhr);
            $("#tgl_lhr").val(tgl_lhr); 
            $("#alamat").val(alamat);
            $("#jenkel").val(jenkel);
            $("#ipk").val(ipk); 
            $("#judul_indo").val(judul_indo);
            $("#judul_english").val(judul_english); 
            $("#pesan").val(pesan);
            $("#foto").val("");
        }
        
        // Fungsi ini akan dipanggil ketika tombol hapus diklik
        function hapus(no){
            var nim = $("#nim-value-" + no).val(); // Ambil nim dari input type hidden
            
            // Set textbox hidden nim yang ada di modal dialog hapus
            $("#data-nim").val(nim);
        }
        </script>

	
		

		
		


