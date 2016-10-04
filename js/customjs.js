$(document).ready(function () {
    var form = $('#submit-form');
    $(form).on('submit', function (e) {
        e.preventDefault();

        var coffeeName = $('#form-name').val();

        $.ajax({
            url: "http://localhost:8080/CoffeeAdd.php",
            data: {
                "txtName": form.find('input[name="txtName"]').val(),
                "ddlType": form.find('input[name="ddlType"]').val(),
                "txtPrice": form.find('input[name="txtPrice"]').val(),
                "txtRoast": form.find('input[name="txtRoast"]').val(),
                "txtCountry": form.find('input[name="txtCountry"]').val(),
                "ddlImage": $('#form-image').val(),
                "txtReview": form.find('input[name="txtReview"]').val()
            },
            method: "POST"
        }).done(function () {
            swal({
                title: "Success!",
                text: coffeeName + " added!",
                type: "success",
                timer: 3000,
                showConfirmButton: false
            });
        });
    });
});