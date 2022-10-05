

let pharmacyTable;

function displayPharmaciesTable(){
$.ajax({
    url: "api/api.php?action=getApi&url=pharmacies",
    type: 'GET',
    method: 'GET',
    success: function (response) {
        var pharmacy = JSON.parse(response);
        pharmacyFill=[];
        pharmacy.pharmacies.forEach(element => {
            if(element.name != "" && element.phone !="" && element.email !="" && element.fax !="" && element.address !=""){
                pharmacyFill.push(element);
            }
        });
        // console.log(pharmacy);
        pharmacyTable = $('#manage-pharmacy-table').DataTable({
            "data": pharmacyFill,
            columns: [{
                    'data': 'name',
                },
                {
                    'data': 'phone'
                },
                {
                    'data': 'email'
                },
                {
                    'data': 'fax'
                },
                {
                    'data': 'address'
                },
                {
                    'data': 'url'
                },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<a data-bs-toggle="modal" data-bs-target="#edit-pharmacy-modal" class="btn btn-act btn-edit edit me-2" displayPharmacy(json.stringify());><i class="fas fa-pencil"></i></a>',
                    orderable: false
                }, {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<a class="btn btn-act btn-delete delete"><i class="fas fa-trash"></i></a>',
                    orderable: false
                }
            ]
        });
        $('#manage-pharmacy-table tbody').on('click', '.edit', function () {
            var data = pharmacyTable.row($(this).parents('tr')).data();
            displayPharmacy(data);
        });

        $('#manage-pharmacy-table tbody').on('click', '.delete', function () {
            var data = pharmacyTable.row($(this).parents('tr')).data();
            deletePharmacy(data.id);
        });
    }
})
}

displayPharmaciesTable();

var id = 0;

function displayPharmacy(data){
    id = data.id;
    $("#name").val(data.name)
    $("#address").val(data.address)
    $("#phone").val(data.phone)
    $("#fax").val(data.fax)
    $("#email").val(data.email)
    $("#url").val(data.url)
}


function updatePharmacy(){
    let data = {
        name: $("#name").val().trim(),
        address: $("#address").val().trim(),
        phone: $("#phone").val().trim(),
        fax: $("#fax").val().trim(),
        email: $("#email").val().trim(),
        url: $("#url").val().trim(),
        id: id
    }
    $.ajax({
    url: "api/api.php?action=postApi&url=pharmacy/update",
    type: 'POST',
    method: 'POST',
    data: data,
    success: function (response) {
            if(typeof response === 'string'){
                response = JSON.parse(response);
            }
            alert(response.message);
            if(response.success){
                $('#edit-pharmacy-modal').modal('toggle');
                pharmacyTable.destroy();
                $('#manage-pharmacy-table').empty();
                displayPharmaciesTable();
            }
        }
    })
}

function deletePharmacy(id){
    if(confirm("Are you sure you want to delete?")){
        $.ajax({
            url: "api/api.php?action=postApi&url=pharmacy/delete",
            type: 'POST',
            method: 'POST',
            data: {id: id},
            success: function (response) {
                    if(typeof response === 'string'){
                        response = JSON.parse(response);
                    }
                    if(response.success){
                        pharmacyTable.destroy();
                        $('#manage-pharmacy-table').empty();
                        displayPharmaciesTable();
                    }
                    alert(response.message);
                }
            })
    }
}