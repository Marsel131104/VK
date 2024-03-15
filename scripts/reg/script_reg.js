$("#btn").on("click", function () {
    var data = {};
    $("form").find('input').each(function() {
        data[this.name] = $(this).val();
    });

    $.ajax({
        url: "/vk/controllers/create.php",
        type: "POST",
        data: data,
        success: function (response) {
            if (response == "accuracy")
                $("#err").html("Заполните все поля");
            else if (response == "person")
                $("#err").html("Такой пользователь уже существует");
            else if (response == "double_password")
                $("#err").html("Пароли не совпадают");
            else if (response == "password")
                $("#err").html("Пароль должен содержать латинские буквы в верхнем и нижнем регистре, хотя бы один специальный символ");
            else if (response == "ok")
                window.location.href = "/vk/login.php";


        }
    });
});