var gModul = 'user/';
var url = baseUrl + gModul;

$(document).ready(function(){

	$("#submit_user").on('click', function(e){

		e.preventDefault();
		
		var form = $('form')[0];
		var formData = new FormData(form);

		$.ajax({
			type: 'POST', 
			url: url + 'add_user',
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
				  html: 'Gagal menambahkan user',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});
	})
})