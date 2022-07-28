var gModul = 'sekolah/';
var url = baseUrl + gModul;
function queryParams(params) {
    return params
}

function ajaxRequest(params) {
    
    $.get(url + 'datajson?' + $.param(params.data)).then(function (res) {
      params.success(res)
    })
}

function cellCenter(value, row, index){
    return {
        css: { "text-align": "center"}
    }
}

function cellRight(value, row, index){
    return {
        css: { "text-align" : "right"}
    }
}


$(document).ready(function(){

    $('#grid_org').bootstrapTable({
        toolbar:'#toolbar',
        search:true,
        url: url + 'datajson',
        singleSelect:false,
        pageSize: 20,
        pageList:"[20, 50, 100, 200]" ,
        columns: [
        {
            field: 'no',
            align: 'center'
        },
        {
            field: 'nama'
        },
        {
            field: 'username'
        },{
            field: 'email'
        },{
            field: 'telp'
        },{
            field: 'foto'
        },{
            field: 'tipe'
        },
        {
            field: 'straction',
            align: 'center'
        }
        ]
    });
});