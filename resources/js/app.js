import "./bootstrap";

$(document).ready(function () {
    $(".check").change(function () {
        var status = "";
        if ($(this).is(":checked")) {
            status = "inactive";
            $(this)
                .closest("tr")
                .find(".task_name")
                .css("text-decoration", "line-through");
        } else {
            status = "active";
            $(this)
                .closest("tr")
                .find(".task_name")
                .css("text-decoration", "none");
        }
        var id = $(this).data("id");
        var csrf = $("#csrf").val();

        $.ajax({
            url: "/task-update-status/" + id,
            type: "post",
            data: {
                _token: csrf,
                status: status,
            },
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
        });
    });
});
