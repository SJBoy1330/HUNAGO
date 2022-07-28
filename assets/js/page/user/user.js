var gModul = 'user/';
var url = baseUrl + gModul;


 var t = $('#kt_table_user').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [0,1,2]
        } ],
        "searching": true,
        "order": [[ 3, 'asc' ]],
        "language": {
            "lengthMenu": "Tampilkan _MENU_",
            "zeroRecords": "Data tidak ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Data tidak tersedia",
            "infoFiltered": "(difilter dari _MAX_ data)",
            "search": "Pencarian"
         },
         "dom":
          "<'row'" +
          "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
          "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
          ">" +

          "<'table-responsive'tr>" +

          "<'row'" +
          "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
          "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
          ">"
    } );

t.on( 'order.dt search.dt', function () {
        t.column(1, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


var userModal = document.getElementById('userModal')
userModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var iduser = button.getAttribute('data-bs-id')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.

  $.post(url + 'detail', {id_user: iduser}, function(respdata){
    
    $(".modal-body").empty();
    $(".modal-body").append(respdata);
  });
})

var userdeleteModal = document.getElementById('modal_delete')
userdeleteModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget
    var iduser = button.getAttribute('data-bs-iduser')
    var username = button.getAttribute('data-bs-username')

    $("#theusername").text(username)
    $("#theiduser").val(iduser)

    $("#btn_delete_confirm").on('click', function(respdata){

        $.post(url + 'delete', {id_user: iduser}, function(respond){
            if (respond.status == 'OK'){
                Swal.fire({
                      title: 'Pesan Sukses',
                      text: respond.message,
                      icon: 'success',
                      confirmButtonText: 'Lanjutkan',
                    }).then(function(){
                        document.location.href=baseUrl + 'users';
                    })
            }else{
                Swal.fire({
                      title: 'Pesan Gagal!',
                      text: 'Gagal Menghapus User',
                      icon: 'error',
                      confirmButtonText: 'Tutup'
                    })
            }

        });

    })
})