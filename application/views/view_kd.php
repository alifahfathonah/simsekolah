<!-- <?php
if(!$this->session->userdata('id')) {
redirect(base_url().'admin');
}
?> -->

<section class="content-header">
	<div class="content-header-left">
		<h1>KD Pelajaran</h1>
		<br>
		<div class="form-group" >

			<select id="pilihPelajaran" class="form-control" name="pilihPelajaran">
				<?php
				if(count($pelajaran)>0){
					foreach($pelajaran as $item) : ?>
					<option value="<?php echo $item['idmapel'] ?>" ><?php echo $item['mapel'] ?></option>
				<?php endforeach;}else{ ?>
					<option value="0" >Tidak ada Data</option>
				<?php } ?>
			</select>
		</div>
	</div>

	<div class="content-header-right">
		<!-- <a href="<?php echo base_url(); ?>sim/rapor/pdf"class="btn btn-info btn-sm" type="button">Export PDF</a> -->
		<button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#my-modal" id="importkd">Import Data</button>
		<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#generate" id="generateKd">Generate</button>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?php
			if($this->session->flashdata('error')) {
				?>
				<div class="callout callout-danger">
					<p><?php echo $this->session->flashdata('error'); ?></p>
				</div>
				<?php
			}
			if($this->session->flashdata('success')) {
				?>
				<div class="callout callout-success">
					<p><?php echo $this->session->flashdata('success'); ?></p>
				</div>
				<?php
			}
			?>

			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="tableKD" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>No</th>
								<th>ID Mapel</th>
								<th>Pengetahuan</th>
								<th>Ketrampilan</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>


	<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row m-3">
						<div class="col-md-9">
							<h5 class="page-heading">Import File ExceL</h5>
							<?php
							$attr = array('id'=>'importMapel');
							echo form_open_multipart(base_url('sim/kd/pilihFile'),$attr) ?>
							<div class="form-group" style="border: solid 1px grey;   " >
								<input id="my-input"  class="form-control-file" type="file" name="fileExcel">
							</div>
							<button class="btn btn-success" type="submit">Pilih file</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
							<?php echo form_close() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="generate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row m-3">
						<div class="col-md-9">
							<h5 class="page-heading">Generate File ExceL</h5>
							<?php
							$attr = array('id'=>'formMapel');
							echo form_open(base_url('admin/kd/generate'),$attr) ?>
							<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
							<label for="#jummapel">Jumlah Mata Pelajaran</label>
							<div class="form-group">
								<input type="number" name="jumlahmapel" id="jummapel" style="width: 80%;">
							</div>
							<button class="btn btn-primary" type="submit">Generate</button>
							<button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
