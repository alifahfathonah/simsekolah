<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Pelajaran</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/mapel" class="btn btn-primary btn-sm">View All</a>
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
			$id = "tambah";
			if($this->uri->segment(4)!="tambah"){
				$id = $this->uri->segment(4);
			}
			?>

			<?php echo form_open_multipart(base_url("admin/mapel/proses/$id"),array('class' => 'form-horizontal')); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Kode Mapel</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="kode" value="<?php echo ($mapel!="")?$mapel['kodemapel']:"";?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Mata Pelajaran </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="mapel" value="<?php echo ($mapel!="")?$mapel['mapel']:"";?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Kelompok Mapel </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="kel" value="<?php echo ($mapel!="")?$mapel['kelompokmapel']:"";?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Urutan </label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="urutan" value="<?php echo ($mapel!="")?$mapel['urutan']:"";?>">
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Tahun Mapel </label>
							<div class="col-sm-2">
								<input type="text" class="form-control" name="tahun" value="<?php echo $tahun;?>" readonly>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-9">
								<textarea class="form-control" name="ket" style="height:80px;"><?php echo ($mapel!="")?$mapel['ketmapel']:"";?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form_submit">Simpan</button>
							</div>
						</div>
					</div>
				</div>
			<?php echo form_close(); ?>


		</div>
	</div>

</section>
