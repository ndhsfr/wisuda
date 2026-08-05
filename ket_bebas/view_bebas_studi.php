 <?php
	include "../config/koneksi.php";	

	// $search = $_POST['cari'];  
	$search = mysqli_real_escape_string($koneksi, htmlentities($_POST['cari']));
	                    
	 // Buat query untuk menampilkan semua data
	$sql= mysqli_query($koneksi, "SELECT * FROM bebas_wisuda WHERE nim = '$search' ");	                

	if ($hasil = mysqli_num_rows($sql))
	   {
		    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
		    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
			?>


 				<div class="panel panel-default">
	    			<div class="panel-heading">
	        			<h3 class="panel-title">Tabel Bebas Studi Mahasiswa -&raquo;  <?php echo $data['nim']; ?> </h3>
	   			 	</div>
				</div>

    			<div class="table-responsive">
	                <table id="example1" class="table table-striped table-hover">
	                    <thead>
	                    <tr>
	                        <th class="text-center">NO</th>
	                        <th>PROGRAM</th>
	                        <th>TA</th>
	                        <th>PRODI</th>               
	                        <th>NIM</th> 
	                        <th>BEBAS PRODI</th>
	                        <th>BEBAS LABKES</th>
	                        <th>BEBAS PERPUS</th>                        
	                        <th>KTI PERPUS</th>
	                        <th>KTI LP3M</th>
	                        <th>BEBAS KEUANGAN</th>
                            <th>BEBAS CDC (khusus profesi)</th>
	                   
	                    </tr>
	                    </thead>
	                    <tbody>	                   
		                        <tr>
		                            <td class="align-middle text-center"><?php echo $no; ?></td>
		                            <td>
		                                <?php echo $data['program']; ?>
		                            </td>
		                            <td><?php echo $data['ta_sem']; ?>                            
		                            </td>
		                            <td><?php echo $data['prodi']; ?>
		                            </td>                                  
		                            <td><?php echo $data['nim']; ?>                            
		                            </td>  
		                            <td>
		                                <?php  
		                                $status = $data['ket_prodi']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                     
		                                                                
		                            </td>     
		                            <td>
		                                <?php  
		                                $status = $data['ket_labkes']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                     
		                                                                
		                            </td>      	                                 
		                            <td>
		                                <?php  
		                                $status = $data['ket_perpus']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                  
		                                                                
		                            </td>  
		                            <td>
		                                <?php  
		                                $status = $data['ket_kti_perpus']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                
		                                                                
		                            </td>  
		                            <td>
		                                <?php  
		                                $status = $data['ket_lp3m']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                     
		                                                                
		                            </td>
		                            <td>
		                                <?php  
		                                $status = $data['ket_keuangan']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                     
		                                                                
		                            </td>  
                                    <td>
		                                <?php  
		                                $status = $data['ket_cdc']; 
		                                if ($status == 1 ) 
		                                {
		                                	$pesan = 'OK' ; 
		                                	?>
											<span class="label label-success"><?php  echo "$pesan" ?></span> <?php 
										} 
										else 
										{
											$pesan = 'NOT'; ?>
											<span class="label label-danger"><?php  echo "$pesan" ?></span>  <?php 
												
										} ?>                                     
		                                                                
		                            </td>
		                            <!-- <td class="align-middle text-center">	                                -->
		                                                                                
		                                <!-- <a href="rekap_bebas_studi.php?aksi=delete&nim=<?php echo $data['nim']; ?>" title="Hapus Data" data-toggle="tooltip" onclick="return confirm('Anda yakin akan menghapus data dengan NIM : <?php echo $data['nim'];?>'); " class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">HAPUS</span></a> -->                                                                         
		                               
		                            <!-- </td> -->
		                        </tr>	   
	                    
	                    </tbody>
	                </table>  
	            </div> 		<!-- /table-responsive -->


	    	<?php
		        $no++; // Tambah 1 setiap kali looping
		    }
		}
		else
		{
		    echo '<script type="text/javascript">
                    //<![CDATA[
                   alert ("Tidak Ada Data? Silahkan Selesaikan Dahulu Salah Satu Bebas Studi!");                                  
                   //]]>
                  </script>';
		}

		    ?>
		                