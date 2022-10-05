

let clinicTable;
function displayClinicTable(){
    $.ajax({
        url: "api/api.php?action=getApi&url=clinics",
        type: 'GET',
        method: 'GET',
        success: function (response) {
            // console.log(response);
            var clinics = JSON.parse(response);
            clinicsFill=[];
            clinics.clinics.forEach(element => {
                if(element.name != "" && element.address !="" && element.fax !=""){
                    clinicsFill.push(element);
                }
            });
            
            clinicTable = $('#manage-clinics-table').DataTable({
                "data": clinicsFill,
                columns: [{
                        'data': 'name'
                    },
                    {
                        'data': 'address'
                    },
                    {
                        'data': 'fax'
                    },
                    {
                        'data': 'email'
                    },
                    {
                        'data': 'url'
                    },
                    {
                        'data': 'phone'
                    },
                    {
                        data: null,
                        className: "dt-center editor-edit",
                        defaultContent: '<a data-bs-toggle="modal" data-bs-target="#edit-clinic-modal" class="btn btn-act btn-edit edit me-2"><i class="fas fa-pencil"></i></a>',
                        orderable: false
                    }, {
                        data: null,
                        className: "dt-center editor-delete",
                        defaultContent: '<a class="btn btn-act btn-delete delete"><i class="fas fa-trash"></i></a>',
                        orderable: false
                    }
                ]
            });

            $('#manage-clinics-table tbody').on('click', '.edit', function () {
                var data = clinicTable.row($(this).parents('tr')).data();
                displayClinic(data);
            });

            $('#manage-clinics-table tbody').on('click', '.delete', function () {
                var data = clinicTable.row($(this).parents('tr')).data();
                deleteClinic(data.id);
            });

        }

    })
}



displayClinicTable();

var clinicId = 0;

function displayClinic(data){
    clinicId = data.id;
    $("#name").val(data.name)
    $("#address").val(data.address)
    $("#phone").val(data.phone)
    $("#fax").val(data.fax)
    $("#email").val(data.email)
    $("#url").val(data.url)
}


function updateClinic(){
    let data = {
        name: $("#name").val().trim(),
        address: $("#address").val().trim(),
        phone: $("#phone").val().trim(),
        fax: $("#fax").val().trim(),
        email: $("#email").val().trim(),
        url: $("#url").val().trim(),
        id: clinicId
    }
    $.ajax({
    url: "api/api.php?action=postApi&url=clinic/update",
    type: 'POST',
    method: 'POST',
    data: data,
    success: function (response) {
            if(typeof response === 'string'){
                response = JSON.parse(response);
            }
            alert(response.message);
            if(response.success){
                $('#edit-clinic-modal').modal('toggle');
                clinicTable.destroy();
                $('#manage-clinics-table').empty();
                displayClinicTable();
            }
        }
    })
}


function deleteClinic(id){
    if(confirm("Are you sure you want to delete?")){
        $.ajax({
            url: "api/api.php?action=postApi&url=clinic/delete",
            type: 'POST',
            method: 'POST',
            data: {id: id},
            success: function (response) {
                    if(typeof response === 'string'){
                        response = JSON.parse(response);
                    }
                    if(response.success){
                        clinicTable.destroy();
                        $('#manage-clinics-table').empty();
                        displayClinicTable();
                    }
                    alert(response.message);
                }
            })
    }
}