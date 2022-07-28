var gModul = 'gallery_project/';
var url = baseUrl + gModul;

var userformModal = document.getElementById('modal_form');
userformModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget
    var id_project = button.getAttribute('data-bs-id_project')
    var nama_project = button.getAttribute('data-bs-nama_project')

    $("#id_project").val(id_project);
    $("#nama_project").text(nama_project);

    console.log(nama_project);


    $("#submit_gallery").on('click', function(e){


        e.preventDefault();

        $(this).prop('disabled', true);
        setTimeout('$("#submit_gallery").removeAttr("disabled")', 2000);
		
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
						document.location.href= url + 'index/' +  id_project ;
					})
				}

			}, 
			error: function (respdata){
				Swal.fire({
				  title: 'Pesan Gagal!',
				  html: 'Gagal menambahkan Gallery Project',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});

    });

});


var userdeleteModal = document.getElementById('modal_delete')
userdeleteModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget
    var id_project_gallery = button.getAttribute('data-bs-id_project_gallery')
    var id_project = button.getAttribute('data-bs-id_project')

    $("#id_project_gallery").val(id_project_gallery)

    $("#btn_delete_confirm").on('click', function(){

        $.post(url + 'delete', {id_project_gallery: id_project_gallery}, function(respond){
            console.log(respond, respond['status']);
            if (respond.status == "OK"){
                Swal.fire({
                      title: 'Pesan Sukses',
                      html: respond.message,
                      icon: 'success',
                      confirmButtonText: 'Lanjutkan',
                    }).then(function(){
                        document.location.href= url + 'index/' +  id_project 
                    })
            }else{
                Swal.fire({
                      title: 'Pesan Gagal!',
                      html:  respond.message,
                      icon: 'error',
                      confirmButtonText: 'Tutup'
                    })
            }

        });

    })
})