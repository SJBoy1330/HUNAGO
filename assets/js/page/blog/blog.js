var gModul = 'blog/';
var url = baseUrl + gModul;


jQuery(document).ready(function(){
    
 var t = $('#kt_table_blog').DataTable( {
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
        t.column(2, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();



    $("#kt_table_blog").on('click', '.checkboxes', function(){
        var table = $('#kt_table_blog').DataTable();
        if(table.$("input:checkbox.checkboxes:checked").length > 0){
            $('#btn_delete_selected').prop('disabled', false);
        }else{
            $('#btn_delete_selected').prop('disabled', true);
        }
    });

    $("#kt_table_blog").on('click', '.checkboxes', function(){
        var table = $('#kt_table_blog').DataTable();
        if(table.$("input:checkbox.checkboxes:checked").length > 0){
            $('#btn_delete_selected').prop('disabled', false);
        }else{
            $('#btn_delete_selected').prop('disabled', true);
        }
    });

    $("#button_check_all").on('click', function(){
        var table = $("#kt_table_blog").DataTable();
        if($(this).prop("checked")==true){
            table.$(".checkboxes").prop("checked",true);
        }else{
            table.$(".checkboxes").prop("checked",false);
        }
        if(table.$("input:checkbox.checkboxes:checked").length > 0){
            $('#btn_delete_selected').prop('disabled', false);
        }else{
            $('#btn_delete_selected').prop('disabled', true);
        }
    });

    $("#btn_delete_selected").on("click", function(){

        var table = $("#kt_table_blog").DataTable();
        var jumlah = table.$("input:checkbox.checkboxes:checked").length;
        $("#modal_delete_selected").modal('show');
        $("#jumlahblog").empty();
        $("#jumlahblog").text(jumlah);
    });

    $("#btn_delete_all_confirm").on('click', function(){
        $(this).prop('disabled', true);
        $(this).html('<span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span> Loading');
        var table = $("#kt_table_blog").DataTable();
        data = table.$("input[name='items[]']").serializeArray();
        $.post(url + 'delete_all', data, function(respdata){
            Swal.fire({
                title: 'Pesan Sukses!',
                text: respdata.message,
                icon: 'success',
                confirmButtonText: 'Tutup'
            }).then(function(){
                document.location.href = url ;
            })
        });
    });

});



var userdeleteModal = document.getElementById('modal_delete')
userdeleteModal.addEventListener('show.bs.modal', function (event){
    var button = event.relatedTarget
    var id_blog = button.getAttribute('data-bs-id_blog')
    var nama = button.getAttribute('data-bs-nama')

    $("#nama").text(nama)
    $("#theidblog").val(id_blog)

    $("#btn_delete_confirm").on('click', function(respdata){

        $.post(url + 'delete', {id_blog: id_blog}, function(respond){
            if (respond.status == 'OK'){
                Swal.fire({
                      title: 'Pesan Sukses',
                      html: respond.message,
                      icon: 'success',
                      confirmButtonText: 'Lanjutkan',
                    }).then(function(){
                        document.location.href= url;
                    })
            }else{
                Swal.fire({
                      title: 'Pesan Gagal!',
                      html: 'Gagal Menghapus Blog',
                      icon: 'error',
                      confirmButtonText: 'Tutup'
                    })
            }

        });

    })
})



var modaldetail = document.getElementById('modal_detail')
modaldetail.addEventListener('show.bs.modal', function(event){

    var button = event.relatedTarget

    var idblog = button.getAttribute('data-bs-id_blog')
    var judul = button.getAttribute('data-bs-judul')
    var mode = button.getAttribute('data-bs-mode')

    var modalBodyInput = modaldetail.querySelector('.modal-body')

    $.post( url + 'detail', {id_blog : idblog, judul: judul, mode: mode}, function(respdata){
        modalBodyInput.innerHTML = '';
        modalBodyInput.innerHTML = respdata;
    });

});