<?php
if(!$this->session->userdata('id')) {
  redirect(base_url().'admin');
}
?>

<section class="content-header">
  <div class="content-header-left">
    <h1>Guru</h1>
  </div>
  <div class="content-header-right">
    <a href="<?php echo base_url(); ?>admin/guru/tambah" class="btn btn-primary btn-sm">Tambah</a>
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
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>NIK</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Agama</th>
                <th>Kode Guru</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach ($semua as $row) {
                $i++;
                ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?=$row['NIK']; ?></td>
                  <td><?=$row['NIP']; ?></td>
                  <td><?=$row['Nama']; ?></td>
                  <td><?=$row['JK']; ?></td>
                  <td><?=$row['TempatLahir']; ?></td>
                  <td><?=$row['TanggalLahir']; ?></td>
                  <td><?=$row['Agama']; ?></td>
                  <td><?=$row['KodeGuru']; ?></td>
                  <td>
                    <a href="<?php echo base_url(); ?>admin/guru/detail/<?=$row['NIK']; ?>" class="btn btn-success btn-xs">Detail</a>
                    <a onclick='konfirmasi("admin/guru/hapus/<?=$row['NIK']?>", "Anda yakin ingin menghapus Guru?")' href="#" class="btn btn-danger btn-xs">Hapus</a>
                  </td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
