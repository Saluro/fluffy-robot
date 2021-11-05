function refreshRespondButtons() {
    $(".respond-button").each(function () {
        console.log($(this).attr('id') + " lol");
        $(this).click(() => {
            $("#PARENT").val($(this).attr('id'));
        })
    })
}

$(document).ready(function () {

    refreshRespondButtons();

    $("#com_form").submit(function (event) {
        var formData = {
            NAME: $("#NAME").val(),
            PARENT: $("#PARENT").val(),
            CONTENT: $("#CONTENT").val(),
            TARGET_TYPE: $("#TARGET_TYPE").val(),
            TARGET: $("#TARGET").val(),
            USER_ID: $("#USER_ID").val(),
            USER_NAME: $("#NAME").val(),
        };

        $.ajax({
            type: "POST",
            url: "/local/process.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            if (data['success']) {
                $("#com_form").html(
                    '<div class="alert-success">Комментарий был успешно добавлен</div>'
                );
                $("#comments-container").html(
                    data['newhtml']
                );
                refreshRespondButtons();
            } else {
                $("#com_form").html(
                    'Ошибка при добавлении комментария!'
                );
            }
        });

        event.preventDefault();
    });
});

// if ( window.history.replaceState ) {
//     window.history.replaceState( null, null, window.location.href );
// }
