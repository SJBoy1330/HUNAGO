$(document).ready(function(){

	$("#submit_profile").on('click', function(e){

		e.preventDefault();

		var form = $('form')[0];
		var formData = new FormData(form);

		$.ajax({
			type: 'POST', 
			url: baseUrl + 'profile/save',
			data:formData,
			cache: false,
			contentType : false,
			processData: false, 
			success: function (respdata){
				console.log(respdata);
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
						document.location.href=baseUrl + 'profile';
					})
				}

			}, 
			error: function (respdata){
				Swal.fire({
				  title: 'Pesan Gagal!',
				  html: 'Gagal menyimpan Profile',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});
	});

	$("#submit_password").on('click', function(e){

		e.preventDefault();

		var oldpassword = $("#oldpassword").val();
		var password = $("#password").val();
		var repassword = $("#repassword").val();

		$.post(baseUrl + 'profile/save_password', {oldpassword: oldpassword, password: password, repassword: repassword}, function(respdata){
			if (respdata.status == 'OK'){
				Swal.fire({
					  title: 'Pesan Sukses!',
					  text: respdata.message,
					  icon: 'success',
					  confirmButtonText: 'Lanjutkan',
					}).then(function(){
						document.location.href=baseUrl + 'dashboard';
					})
			}else{
				Swal.fire({
					  title: 'Pesan Gagal!',
					  text: respdata.message,
					  icon: 'error',
					  confirmButtonText: 'Tutup'
					})
			}
		})

	});

});