var gModul = 'blog/';
var url = baseUrl + gModul;

$(document).ready(function(){
    
    $("#tanggal").flatpickr({
        dateFormat: "d-m-Y"
    });

    var myEditor;
    var myEditor2;
    
    ClassicEditor.create(document.querySelector('#detail'),  {
		toolbar: {
			items: [
				'bold',
				'italic',
				'alignment',
				'|',
				'mediaBrowser',
				'htmlEmbed',
				'undo',
				'redo'
			]
		},
		language: 'en',
		image: {
			toolbar: [
				'imageTextAlternative',
				'imageStyle:full',
				'imageStyle:side'
			]
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
		},
		licenseKey: ''            
		
	} ).then( editor => { myEditor = editor});
	
	ClassicEditor.create(document.querySelector('#detail_en'),  {
		toolbar: {
			items: [
				'bold',
				'italic',
				'alignment',
				'|',
				'mediaBrowser',
				'htmlEmbed',
				'undo',
				'redo'
			]
		},
		language: 'en',
		image: {
			toolbar: [
				'imageTextAlternative',
				'imageStyle:full',
				'imageStyle:side'
			]
		},
		table: {
			contentToolbar: [
				'tableColumn',
				'tableRow',
				'mergeTableCells'
			]
		},
		licenseKey: ''            
		
	} ).then( editor => { myEditor2 = editor});

	$("#submit_blog").on('click', function(e){

		e.preventDefault();

        $(this).prop('disabled', true);
        setTimeout('$("#submit_blog").removeAttr("disabled")', 2000);
		
		var form = $('form')[0];
		var formData = new FormData(form);

        var detail = myEditor.getData($("#detail").val());
		formData.append('detail', detail);
		var detail_en = myEditor2.getData($("#detail_en").val());
		formData.append('detail_en', detail_en);


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
				  html: 'Gagal menambahkan Blog',
				  icon: 'error',
				  confirmButtonText: 'Tutup'
				})
			}
		});
	})
})