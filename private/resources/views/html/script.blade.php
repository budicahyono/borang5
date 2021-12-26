	{!! Html::script('assets/js/jquery-1.11.3.min.js') !!}
	{!! Html::script('assets/js/bootstrap.min.js') !!}
	{!! Html::script('plugins/metisMenu/jquery.metisMenu.js') !!}
	{!! Html::script('assets/js/sb-admin.js') !!}
	{!! Html::script('plugins/ckeditor/ckeditor.js') !!}
	{!! Html::script('plugins/datatable/jquery.dataTables.js') !!}
	{!! Html::script('plugins/datatable/skin/bootstrap/js/dataTables.bootstrap.js') !!}
	{!! Html::script('plugins/datepicker/js/bootstrap-datepicker.js') !!}
	{!! Html::script('plugins/jquery-ui/jquery-ui.js') !!}


<!-- script file_lampiran -->
<script>
	document.getElementById("uploadBtn").onchange = function () {
		document.getElementById("uploadFile").value = this.value;
	};
</script>

	
<!-- script datepicker -->
<script type="text/javascript">
$(function() {
	$( "#calendar" ).datepicker({ dateFormat: 'yy-mm-dd',
									changeMonth: true,
      								changeYear: true});
	$( "#calendar1" ).datepicker({ dateFormat: 'yy-mm-dd',
									changeMonth: true,
      								changeYear: true});								
});
	
</script>

<!-- script check all -->
<script>
$("#pilihsemua").click(function () { // Jika Checkbox Pilih Semua di ceklis maka semua sub checkbox akan diceklis juga
	$("#st1").prop("checked",true);	
	$("#st2").prop("checked",true);	
	$("#st3").prop("checked",true);	
	$("#st4").prop("checked",true);	
	$("#st5").prop("checked",true);	
	$("#st6").prop("checked",true);	
	$("#st7").prop("checked",true);	
});
</script>

<!-- autocomplete nip dosen -->
<script>
		$(function() {  
			$( "#nip" ).autocomplete({
				source: "{{URL::to('script_lain/auto_nip.php')}}",
				select: function( event, ui ) {
						
							$('#namaDosen').val(ui.item.namaDosen);		
						}		
			});
		});
</script>

<!-- autocomplete nip dosen -->
<script>
		$(function() {  
			$( "#idmatakuliah" ).autocomplete({
				source: "{{URL::to('script_lain/auto_idmatakuliah.php')}}",
				select: function( event, ui ) {
						
							$('#namaMataKuliah').val(ui.item.namaMataKuliah);		
						}		
			});
		});
</script>


<!-- script dataTable -->	
<script type="text/javascript">
$(function () {
    $('.data').DataTable({
        responsive: true,
		"lengthMenu": [[25, 50, 100], [25, 50, 100]],
    });
});
</script>		



<!-- script jenis user -->	
<script>
function opsi_user() {
    var x = document.getElementById("jenis_user").value;
    if (x == "prodi") { 
		document.getElementById("dataprodi").disabled = false;
		document.getElementById("dataprodi").required = true;
		document.getElementById("datafakultas").disabled = true;
		document.getElementById("datafakultas").required = false;
		document.getElementById("datafakultas").value = "";
	
	} else  if (x == "kaprodi") { 
		document.getElementById("dataprodi").disabled = false;
		document.getElementById("dataprodi").required = true;
		document.getElementById("datafakultas").disabled = true;
		document.getElementById("datafakultas").required = false;
		document.getElementById("datafakultas").value = "";
		
		
	} else if (x == "fakultas") {
		document.getElementById("dataprodi").disabled = true;
		document.getElementById("dataprodi").required = false;
		document.getElementById("dataprodi").value = "";
		document.getElementById("datafakultas").disabled = false;
		document.getElementById("datafakultas").required = true;
	
	} else if (x == "dekanfakultas") {
		document.getElementById("dataprodi").disabled = true;
		document.getElementById("dataprodi").required = false;
		document.getElementById("dataprodi").value = "";
		document.getElementById("datafakultas").disabled = false;
		document.getElementById("datafakultas").required = true;
	
	} else if (x == "admin") {
		document.getElementById("dataprodi").disabled = true;
		document.getElementById("dataprodi").required = false;
		document.getElementById("dataprodi").value = "";
		document.getElementById("datafakultas").disabled = true;
		document.getElementById("datafakultas").required = false;
		document.getElementById("datafakultas").value = "";
	
	}
}		
</script>

	
<!-- script page-loader -->	
<script>
$(document).ready(function(){
    $(function () {
    setTimeout(function () { $('.page-loader-wrapper').delay(500).fadeOut(500); }, 500);
});
	$(window).load(function(){
        $("#fade_out").delay(1750).fadeOut(1700)
    });
});	
</script>

<!-- tooltip -->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<!-- tabs -->	
<script>
$(document).ready(function(){
	$(".nav-tabs a").click(function(){
		$(this).tab('show');
	});
});
</script>	

<!-- script lebar otomatis -->
<script>
$(document).ready(function(){
	var w = $("#w1").width();		
	var wi = w - 31;
	$("#w2").width(wi);

});
</script>


<!-- script height otomatis -->
<script>
$(document).ready(function(){
	var h = window.outerHeight;		
	var i = screen.height;		
	var hi = 155 + i - h ;
	$("#h2").css({
		"position" : "relative",
		"top" : hi		
	});
	$("#h1").text(hi);

});
</script>

