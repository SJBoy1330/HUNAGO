$("#kt_sign_in_submit").on('click', function(e){

	e.preventDefault();

	var username = $("#username").val();
    var password = $("#password").val();

    $.post(baseUrl + 'auth/set_signin', {username : username, password: password}, function(respdata){

        if (respdata.message == 'OK'){
        	Swal.fire({
			  title: 'Login Berhasil!',
			  html: 'Anda berhasil Masuk',
			  icon: 'success',
			  confirmButtonText: 'Lanjutkan',
			}).then(function(){
				document.location.href=baseUrl + 'dashboard';
			})
        }else{
        	Swal.fire({
			  title: 'Login Gagal!',
			  html: 'Username dan Kata Sandi salah',
			  icon: 'error',
			  confirmButtonText: 'Tutup'
			})
        }
    });
});