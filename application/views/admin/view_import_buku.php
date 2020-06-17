<section class="content-header mt-3">
  <h1>Import Buku</h1>
  <div class="content-header-right">
    <!-- <a href="<?php echo base_url(); ?>sim/rapor/pdf"class="btn btn-info btn-sm" type="button">Export PDF</a> -->
    <!-- <button  class="btn btn-success btn-sm" data-toggle="modal" data-target="#my-modal" id="import">Import Data</button>
    <a href="<?php echo base_url(); ?>admin/team_member/add" class="btn btn-primary btn-sm">Export Data</a>
    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#generate" id="generateSiswa">Generate</button> -->
  </div>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <!--  Session Flash Messages -->
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
      <!--  ./Session Flash Messages -->

      <h3 class="text-muted">Generate Excel Form</h3> <!--  head 1 -->
      <label for="jumlahinput">Jumlah Data Baru</label>

      <form action="<?=base_url('admin_perpustakaan/import_buku/generate')?>" method="POST" id="form-generate">
        <!-- <?php
        $attribute = ['id'=>'form-generate'];
        echo form_open(base_url('admin_perpustakaan/import_buku/generate'), $attribute);
        ?> -->
        <div class="row align-items-center mb-3 no-gutters">
          <div class="col-md-3">
            <input type="number" class="form-control" name="jumlahinput" id="jumlahinput" placeholder="Jumlah" required min="1">
            <div id="t_acc">
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" id="access_form">
            </div>
          </div>
          <div class="col-md-3 pl-3">
            <button class="btn btn-primary btn-sm" type="submit" id="generate-excel">Generate</button>
          </div>
          <p id="errorjumlahinput" class="form-text text-danger p-0 m-0"></p>
        </div>
        <!-- <?php echo form_close()?> -->
      </form>

      <!-- <div class="alert alert-warning mb-2" role="alert">
      A simple warning alert—check it out!
    </div> -->
    <h3 class="text-muted mt-4">Import Excel Form</h3> <!--  head 2 -->
    <?php
    $attribute = ['id'=>'form-upload'];
    echo form_open_multipart(base_url('admin_perpustakaan/import_buku/pilihFile'),$attribute) ?>
    <div class="row no-gutters">
      <div class="col-md-4">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="excel-file-input" name="fileExcel">
          <label class="custom-file-label" for="excel-file-input">Choose file</label>
        </div>
      </div>
      <div class="col-md-8 pl-3">
        <button class="btn btn-info btn-sm" type="submit" id="generateBtn">Upload</button>
      </div>
    </div>
    <?php echo form_close() ?>

    <!--  head 3 -->
    <!-- <h3 class="text-muted mt-4">Preview Data</h3>
    <div class="box box-info">
    <div class="box-body table-responsive">
    <table id="insert-buku" class="table table-bordered table-striped">
    <thead>
    <tr>
    <th>ID Buku</th>
    <th>Judul</th>
    <th>Tanggal Pengadaan</th>
    <th>Penerbit</th>
    <th>Tahun Terbit</th>
    <th>Jumlah Buku</th>
  </tr>
</thead>
<tbody>
<?php foreach ($data_buku as $row) :?>
<tr>
<td><?=$row->idbuku?></td>
<td><?=$row->Judul?></td>
<td><?=$row->tglpengadaan?></td>
<td><?=$row->Penerbit?></td>
<td><?=$row->Tahunterbit?></td>
<td><?=$row->jumlahbuku?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
</div> -->

<!-- <button class="btn btn-success btn-block">Send Data</button> -->

</div>
</div>
<!-- modal Import -->
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="row m-3">
          <div class="col-md-9">

            <h5 class="page-heading">Import File ExceL</h5>
            <?php
            $attr = array('id'=>'importMapel');
            echo form_open_multipart(base_url('sim/siswa/pilihFile'),$attr) ?>

            <div class="form-group" style="border: solid 1px grey;   " >

              <input id="my-input"  class="form-control-file" type="file" name="fileExcel">
            </div>
            <button class="btn btn-success" type="submit">Pilih file</button>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#generate" id="generateBtn">Generate</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
            <?php echo form_close() ?>
          </div>
        </div>


      </div>

    </div>
  </div>
</div>
<!-- modal Generate -->
<div id="generate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="page-heading">Generate File Excel</h5>

        <!-- <?php
        $attr = array('id'=>'formMapel');
        echo form_open(base_url('sim/siswa/generate'),$attr) ?>

        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <label for="#jummapel">Jumlah Mata Pelajaran</label>
        <div class="form-group">
        <input type="number" name="jumlahmapel" id="jummapel" style="width: 80%;">
      </div>

      <button class="btn btn-primary" type="submit">Generate</button>
      <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>

      <?php echo form_close(); ?> -->

      <button class="btn btn-primary" type="button" id="generate-excel">Generate</button>
      <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
</section>
