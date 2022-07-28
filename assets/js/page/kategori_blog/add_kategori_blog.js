var gModul = 'kategori_blog/';
var url = baseUrl + gModul;


$(document).ready(function(){

    $("#submit_kategori_blog").on('click', function(e){

		e.preventDefault();

        var nama = $("#nama").val();
        var nama_en = $("#nama_en").val();

        $.ajax({
            type: "POST",
            url: url + 'save_add',
            dataType: 'json',
            data: {nama: nama, nama_en: nama_en},
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