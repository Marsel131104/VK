$("#btn").on("click", function () {
    var data = {};
    $("form").find('input').each(function() {
        data[this.name] = $(this).val();
    });

    $.ajax({
        url: "/vk/controllers/check.php",
        type: "POST",
        data: data,
        success: function (response) {
            console.log(response);
            if (response == "accuracy")
                $("#err").html("Заполните все поля");
            else if (response == "person-password")
                $("#err").html("Неправильное имя пользователя или пароль");
            else if (response == "ok")
                window.location.href = "/vk/main.php";


        }
    });
});