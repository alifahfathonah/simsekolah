</div>

</div>



<!-- <script src="<?php echo base_url(); ?>public/admin/js/jquery-2.2.4.min.js"></script> -->
<!-- <script src="<?php echo base_url(); ?>public/admin/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url(); ?>public/admin/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jscolor.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.inputmask.extensions.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/fastclick.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/app.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url(); ?>public/admin/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>public/admin/js/demo.js"></script>

<script>

(function($) {

	$(document).ready(function() {

		// $('#editor1').summernote({
		// 	height: 300
		// });
		// $('#editor2').summernote({
		// 	height: 300
		// });
		// $('#editor3').summernote({
		// 	height: 300
		// });
		// $('#editor4').summernote({
		// 	height: 300
		// });
		// $('#editor5').summernote({
		// 	height: 300
		// });
		// $('#editor6').summernote({
		// 	height: 300
		// });
		// $('.editor').summernote({
		// 	height: 300
		// });
		// $('.editor_short').summernote({
		// 	height: 150
		// });


	});

	//Initialize Select2 Elements
	$(".select2").select2();

	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
	//Datemask2 mm/dd/yyyy
	$("#datemask2").inputmask("mm-dd-yyyy", {"placeholder": "mm-dd-yyyy"});
	//Money Euro
	$("[data-mask]").inputmask();

	//Date picker
	$('.datepicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayBtn: 'linked',
	});
	$('#datepicker').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayBtn: 'linked',
	});

	$('#datepicker1').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayBtn: 'linked',
	});

	$('#datepicker2').datepicker({
		autoclose: true,
		format: 'yyyy-mm-dd',
		todayBtn: 'linked',
	});

	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});
	//Red color scheme for iCheck
	$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});


	$("#example1").DataTable();
	$('#example2').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": false,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
	});

	$(document).ready(function () {
		CKEDITOR.replaceAll( 'editor' );
	});


})(jQuery);

</script>

<script type="text/javascript">
$(document).ready(function () {

	$("#btnAddNew").click(function () {
		var rowNumber = $("#PhotosTable tbody tr").length;
		var trNew = "";
		var addLink = "<div class=\"upload-btn" + rowNumber + "\"><input type=\"file\" name=\"photos[]\"></div>";
		var deleteRow = "<a href=\"javascript:void()\" class=\"Delete btn btn-danger btn-xs\">X</a>";
		trNew = trNew + "<tr> ";
		trNew += "<td>" + addLink + "</td>";
		trNew += "<td style=\"width:28px;\">" + deleteRow + "</td>";
		trNew = trNew + " </tr>";
		$("#PhotosTable tbody").append(trNew);
	});

	$('#PhotosTable').delegate('a.Delete', 'click', function () {
		$(this).parent().parent().fadeOut('slow').remove();
		return false;
	});
});

selectEmailMethod = $('#selectEmailMethod').val();
$('#selectEmailMethod').on('change',function() {
	selectEmailMethod = $('#selectEmailMethod').val();
	if ( selectEmailMethod == 'Normal' ) {
		$('#smtpContainer').hide();
	} else if ( selectEmailMethod == 'SMTP' ) {
		$('#smtpContainer').show();
	}
});

function konfirmasi(url, pesan){
	url = "<?=base_url()?>"+url;
	console.log(url);
	$('#judulKonfirmasi').html(pesan);
	$('#btnhapus').attr('href', url);
	$('#modalhapus').modal();
}
</script>


<!-- Script Nilai -->
<script>
var table;
var tablebaru;
colKd()

function colKd() {
	$.ajax({
		url: "nilaikd/getkd/"+$('#pilihPelajaran').val(),
		success: function (response) {
			var object = JSON.parse(response);
			var id = $('#pilihPelajaran').val();
			$('#kd').empty();
			$('.ketkd').attr('colspan',object.length);
			for (let index = 0; index < 2; index++) {
				$.each(object, function (index, data) {
					var no = index+1;
					$('#kd').append('<th>KD'+no+'</th>');
				});
			}

			if(table){
				table.clear().destroy();
				tablebaru=$('#nilaiKD').DataTable({
					"ajax": {
						"url": 'nilaikd/getData/'+$('#pilihPelajaran').val()
						+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val(),
						"dataSrc": "data",
						"columnDefs": [
							{
								"data": null,
								"defaultContent": "<button>Edit</button>",
								"targets":"_all"
							}]
						}
					});
					table=null;
				}else{
					if(tablebaru){
						tablebaru.clear().destroy()
					}

					table=$('#nilaiKD').DataTable({
						"ajax": {
							"url": 'nilaikd/getData/'+$('#pilihPelajaran').val()
							+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val(),
							"dataSrc": "data",
							"columnDefs": [
								{
									"data": null,
									"defaultContent": "<button>Edit</button>",
									"targets":"_all"
								}]
							}
						});
						tablebaru=null;
					}
				}
			});
		}

		var rapor =$("#nilaiRaport").DataTable({
			"ajax": {
				"url": 'raport/getData/'+$('#pilihPelajaran').val()
				+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val(),
				"dataSrc": "data"
			}
		});

		$('#pilihPelajaran').change(function () {
			colKd()
			rapor.ajax.url('raport/getData/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val()).load();
		})

		$('#pilihTahun').change(function () {
			colKd()
			rapor.ajax.url('raport/getData/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val()).load();
		})

		$('#pilihSemester').change(function () {
			colKd()
			rapor.ajax.url('raport/getData/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val()).load();
		})

		$('#pilihKelas').change(function () {
			colKd()
			rapor.ajax.url('raport/getData/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val()).load();
		})

		$('#generateNilaiKD').click(function () {
			window.open('<?=base_url()?>admin/nilaikd/generate/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val())
		});

		$('#generateNilaiRaport').click(function () {
			window.open('<?=base_url()?>admin/raport/generate/'+$('#pilihPelajaran').val()
			+'/'+$('#pilihKelas').val()+'/'+$('#pilihTahun').val()+'/'+$('#pilihSemester').val())
		});
		// nilai kd selesai

		// Pembuatan kd
		var kd =$("#tableKD").DataTable({
			'ajax' : {
				'url': '<?=base_url('admin/')?>kd/getkd/'+$('#pilihPelajaran').val(),
				'dataSrc':'isi'
			}
		});

		$('#pilihPelajaran').change(function(){
			kd.ajax.url('<?=base_url('admin/')?>kd/getkd/'+$('#pilihPelajaran').val()).load()
		});

		$('#generateKd').click(function () {
			$('#formMapel').attr('action', '<?=base_url()?>admin/kd/generate/'+$('#pilihPelajaran').val());
			$('#jummapel').val('5');
			$('#formMapel').submit(function(e){
				$('#generate').modal('hide');
				setTimeout(function(){ window.location = '<?=base_url()?>admin/kd';},850)
			});
		});


		$('#importkd').click(function () {
			$('#importMapel').attr('action', '<?=base_url()?>admin/kd/pilihFile/'+$('#pilihPelajaran').val());
		});
</script>

		<!--Modal Delete-->
		<div class="modal fade" id="modalhapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content col-md-4" style="margin-left:33%;">
					<div class="modal-header">
						<h5 class="modal-title" id="judulKonfirmasi"></h5>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
				<!--<div class="modal-body">-->
				<!--  ...-->
				<!--</div>-->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<a href="#" class="btn btn-danger" id="btnhapus">Ya</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
