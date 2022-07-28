var gModul = 'transaksi/';
var url = baseUrl + gModul;

$(document).ready(function(){

    $("#tanggal").flatpickr({
        dateFormat: "d-m-Y"
    });

    
	$("#submit_transaksi").on('click', function(e){

		e.preventDefault();

        $(this).prop('disabled', true);
        setTimeout('$("#submit_transaksi").removeAttr("disabled")', 2000);
		
		var form = $('form')[0];
		var formData = new FormData(form);

		$.ajax({
			type: 'POST', 
			url: url + 'save_edit',
			data:formData,
			cache: false,
			contentType : false,
			processData: false, 
			success: function (respdata){

				if (respdata.status == 'NOK'){
					Swal.fire({
					  title: 'Pesan Gagal!',
					  html: respdata.message,
					  icon: 'error',
					  confirmButtonText: 'Tutup'
					})
				}else{
					Swal.fire({
					  title: 'Pesan Sukses!',
					  html: respdata.message,
					  icon: 'success',
					  confirmButtonText: 'Lanjutkan',
					}).then(function(){
						document.location.href= url ;
					})
				}

			}, 
			error: function (respdata){
				Swal.fire({
				  title: 'Pesan Gagal!',
				  html: 'Gagal menambahkan Transaksi',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});
	})
})