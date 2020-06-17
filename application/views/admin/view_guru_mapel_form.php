<?php
if(!$this->session->userdata('id')) {
	redirect(base_url().'admin');
}
?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Guru Mata Pelajaran</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo base_url(); ?>admin/guru_mapel" class="btn btn-primary btn-sm">View All</a>
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

			<?php echo form_open_multipart(base_url("admin/guru_mapel/proses/$id"),array('class' => 'form-horizontal')); ?>
			<div class="box box-info">
				<div class="box-body">
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Mata Pelajaran </label>
						<div class="col-sm-4">
							<select class="form-control" name="idmapel">
								<?php foreach ($mata as $m) { ?>
									<option value="<?=$m['idmapel']?>" <?php echo ($mapel!="" && $mapel['idmapel']==$m['idmapel'])?"selected":""; ?>><?=$m['mapel']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Guru </label>
						<div class="col-sm-4">
							<select class="form-control" name="nik">
								<?php foreach ($guru as $m) { ?>
									<option value="<?=$m['NIK']?>" <?php echo ($mapel!="" && $mapel['nik']==$m['NIK'])?"selected":""; ?>><?=$m['Nama']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-2 control-label">Tahun Mapel </label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="tahun" value="<?php echo $tahun;?>" readonly>
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
