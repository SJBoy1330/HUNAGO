var gModul = 'testimonial/';
var url = baseUrl + gModul;

$(document).ready(function(){

	$("#submit_testimonial").on('click', function(e){

		e.preventDefault();

        $(this).prop('disabled', true);
        setTimeout('$("#submit_testimonial").removeAttr("disabled")', 2000);
		
		var form = $('form')[0];
		var formData = new FormData(form);
        
		$.ajax({
			type: 'POST', 
			url: url + 'save_add',
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
				  html: 'Gagal menambahkan testimonial',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});
	})
})