

let docTable;

// Doctors Get Functions End
function displayDocTable(){
$.ajax({
    url: "api/api.php?action=getApi&url=doctors",
    type: 'GET',
    method: 'GET',
    success: function (response) {
        var doctors = JSON.parse(response);
        // console.log(doctors);
        docTable = $('#manage-doctor-table').DataTable({
            "data": doctors.doctors,
            columns: [{
                    'data': 'name'
                },
                {
                    'data': 'specialties'
                },
                {
                    'data': 'RegNumber',
                    'title': 'Registration No'
                },
                {
                    'data': 'clinicName',
                    'title': 'Clinic Name'
                },
                {
                    data: null,
                    className: "dt-center editor-edit",
                    defaultContent: '<a data-bs-toggle="modal" data-bs-target="#edit-doctor-modal" class="btn btn-act btn-edit edit me-2"><i class="fas fa-pencil"></i></a>',
                    orderable: false
                }, {
                    data: null,
                    className: "dt-center editor-delete",
                    defaultContent: '<a class="btn btn-act btn-delete delete"><i class="fas fa-trash"></i></a>',
                    orderable: false
                }
            ]
        });

        $('#manage-doctor-table tbody').on('click', '.edit', function () {
            var data = docTable.row($(this).parents('tr')).data();
            displayDoctor(data);
        });

        $('#manage-doctor-table tbody').on('click', '.delete', function () {
            var data = docTable.row($(this).parents('tr')).data();
            deleteDoctor(data.id);
        });

    }

})
}

displayDocTable();

var docId = 0;

function displayDoctor(data){
    docId = data.id;
    $("#name").val(data.name)
    $("#speciality").val(data.specialties)
    $("#regNumber").val(data.RegNumber)
}

function updateDoctor(){
    let data = {
        name: $("#name").val().trim(),
        specialties: $("#speciality").val().trim(),
        regNumber: $("#regNumber").val().trim(),
        id: docId
    }
    $.ajax({
    url: "api/api.php?action=postApi&url=doctor/update",
    type: 'POST',
    method: 'POST',
    data: data,
    success: function (response) {
            if(typeof response === 'string'){
                response = JSON.parse(response);
            }
            alert(response.message);
            if(response.success){
                $('#edit-doctor-modal').modal('toggle');
                docTable.destroy();
                $('#manage-doctor-table').empty();
                displayDocTable();
            }
        }
    })
}


function deleteDoctor(id){
    if(confirm("Are you sure you want to delete?")){
        $.ajax({
            url: "api/api.php?action=postApi&url=doctor/delete",
            type: 'POST',
            method: 'POST',
            data: {id: id},
            success: function (response) {
                    if(typeof response === 'string'){
                        response = JSON.parse(response);
                    }
                    if(response.success){
                        docTable.destroy();
                        $('#manage-doctor-table').empty();
                        displayDocTable();
                    }
                    alert(response.message);
                }
            })
    }
}