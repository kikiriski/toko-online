<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php 
				$grand_total=0;
				if($keranjang=$this->cart->contents())
				{
					foreach ($keranjang as $item) 
					{
						$grand_total=$grand_total+$item['subtotal'];
					}
					echo "<h4>Total Belanja Rp. ".number_format($grand_total,0,',','.');
				 ?>
			</div><br><br>

		<h3>Input Alamat pengiriman dan pembayaran</h3>

		<form method="post" action=" <?php echo base_url() ?>dashboard/proses_pesanan">
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" name="nama" placeholder="Nama Lengkap" class="form-contol">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" placeholder="alamat"  class="form-contol">
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="no_telp" placeholder="Nomor telepon"  class="form-contol">
			</div>
			<div class="form-group">
				<label>Jasa Pengiriman</label>
				<select  class="form-contol">
					<option>JNE</option>
					<option>JNT</option>
					<option>Tiki</option>
					<option>POS</option>
					<option>Wahana</option>
					<option>Grab</option>
					<option>Gojek</option>
				</select>
			</div>

			<div class="form-group">
				<label>Pilih Bank Transfer</label>
				<select  class="form-contol">
					<option>BNI - 02872864763</option>
					<option>BRI -264752345</option>
					<option>Mandiri - 82436473654</option>
					<option>BCA - 7483647364576</option>
				</select>
			</div>
			<button type="submit"class="btn btn-sm btn-primary mb-3">Pesan</button>
		</form>
		<?php 
	}else{
		echo"<h4>keranjang belanja masih kosong";
	}

		 ?>
	</div>
	
		<div class="col-md-2"></div>
	</div>	
</div>