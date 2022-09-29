
$('#loginForm').on('submit', function (e) {
    e.preventDefault();
    if ($('#email').val() == '' || $('#password').val() == '') {
        errorMsg("Emails And Password is Required!");
    } else {
        var formData = new FormData(this);
        formData.append('action', 'login');
        $.ajax({
            url: 'api/functions.php',
            type: 'POST',
            contentType: false,
            processData: false,
            data: formData,
            success: function (data) {
                // console.log(data);
                data = JSON.parse(data);
                if (data.status == false) {
                    errorMsg(data.message);
                } else {
                    window.location.href = 'index.php';
                }
            }
        })
    }
});
var files;
var JsonObj;
$("input[type=file]").on('change', function () {
    files = this.files[0];
});

$("#uploadPdfForm").on("submit", function (e) {
    e.preventDefault();
    $("#uploadBtn").prop('disabled', true);
    var formData = new FormData(this);
    formData.append("file", files);
    $.ajax({
        url: "https://ocr.yehtohoga.com/api/docfile/DataExtraction?authKey=10005-P10225-10000",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post',
        success: function (response) {
            $('#jsonObj').val(JsonObj);
            JsonObj = JSON.stringify(response[0].PatientData);
            $("#uploadBtn").prop('disabled', false);
            $("#downloadBtn").removeClass('d-none');
        }
    })
});

$("#downloadBtn").on("click", function (e) {
    e.preventDefault();
    $("#downloadBtn").prop('disabled', true);
    var formData = new FormData();
    formData.append('action', 'downloadCSV');
    formData.append('jsonObj', JsonObj);
    $.ajax({
        url: "api/functions.php",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'POST',
        method: 'POST',
        // success:function(response){
        //     console.log(response);
        // }
        success: function (data) {
            /*
             * Make CSV downloadable
             */
            var downloadLink = document.createElement("a");
            var fileData = ['\ufeff' + data];

            var blobObject = new Blob(fileData, {
                type: "text/csv;charset=utf-8;"
            });

            var url = URL.createObjectURL(blobObject);
            downloadLink.href = url;
            downloadLink.download = "patients.csv";

            /*
             * Actually download CSV
             */
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);

            $("#uploadPdfForm").trigger("reset");
            $("#downloadBtn").prop('disabled', false);
            $("#downloadBtn").addClass('d-none');
        }
    })
})

function errorMsg(message) {
    alert(message);
    $('#errorDis').html(message);
    setTimeout(function () {
        $('#errorDis').html('&nbsp;');
    }, 3000);
}


// Sidebar Toggle
$('#sidebar-toggle-inner').click(function () {
    $('.sidebar').toggle();
});

