var gModul = 'kategori_project/';
var url = baseUrl + gModul;


$(document).ready(function(){

    $("#submit_kategori_project").on('click', function(e){

		e.preventDefault();
        
        $(this).prop('disabled', true);
        setTimeout('$("#submit_kategori_project").removeAttr("disabled")', 2000);

        var form = $('form')[0];
		var formData = new FormData(form);

        $.ajax({
            type: "POST",
            url: url + 'save_edit',
            data:formData,
			cache: false,
			contentType : false,
			processData: false, 
            success: function (respond) {
               if (respond.status == "OK"){
                    Swal.fire({
                        title: 'Pesan Sukses!',
                        html: respond.message,
                        icon: 'success',
                        confirmButtonText: 'Lanjutkan',
                    }).then(function(){
                        document.location.href= url;
                    });
               }else{
                    Swal.fire({
                    title: 'Pesan Gagal!',
                    html: respond.message,
                    icon: 'error',
                    confirmButtonText: 'Tutup'
                    })
               }
            }
        })


	
	})

}); 