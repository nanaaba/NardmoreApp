
function getImageInfo(id) {

    $.ajax({
        url: "../" + id,
        type: "GET",
        dataType: "json",
        success: function (data) {

            if (data.success == 0) {
                var details = data.details;
                console.log(data);
                //imageUrl
                $('#public_id').val(details.public_id);
                $("#imageUrl").attr("src", details.url);
                $("#filetype").html(details.format);
                $("#datecreated").html(details.datecreated);
                $("#uploadedby").html(details.addedby);
                $("#imgname").val(details.name);
                $("#description").val(details.description);
                $('#paymentStatus').val(details.payment_status).trigger('change');
                $("#price").val();
                $("#categories").val(details.cat_id).trigger('change');
                $("#picofday").val(details.picofday).trigger('change');
                $('#updateModal').modal('show');
            }

        },
        error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }


    }
    );
}




function deletePicture() {
    var publicid = $('#public_id').val();
    var imgname = $('#imgname').val();
    alert('deletepic' + publicid + ' ' + imgname);
    $('#code').val(publicid);
    $('#holdername').html(imgname);
    $('#confirmModal').modal('show');
}


$('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');
    $.ajax({
        url: 'category/' + code,
        type: "DELETE",
        data: {_token: token},
        dataType: "json",
        success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            document.getElementById("deleteForm").reset();
            if (data.success == 0) {
                document.getElementById("saveCategory").reset();
                $('#successmsg').html(data.message);
                $('#successdiv').show();
                $('#errordiv').hide();
                getCategories();
            } else {
                $('#errormsg').html(data.message);
                $('#errordiv').show();
                $('#successdiv').hide();
            }
        },
        error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');
            alert(errorThrown);
        }
    });
});
