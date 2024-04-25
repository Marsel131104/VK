$("#increase").on("click", function () {
    // Находим последний блок с помощью селектора ':last'
    var lastBlock = $('.form-check:last');

    // Клонируем последний блок
    var clonedBlock = lastBlock.clone();
    clonedBlock.find('input[type=radio]').prop('checked', false);

    // Увеличиваем значение атрибута 'name' у вложенного в блок input на 1
    var inputElement = clonedBlock.find('input[type=text]').val('');
    var currentName = inputElement.attr('name');
    var newName = parseInt(currentName) + 1;
    inputElement.attr('name', newName);

    // Вставляем клонированный блок после последнего блока
    lastBlock.after(clonedBlock);

});

$("#decrease").on("click", function () {
    if ($('.form-check').length > 2){
        if (window.adjacentInputValue == $('.form-check:last').find('input[type=text]').attr('name'))
            window.adjacentInputValue = undefined
        $('.form-check:last').remove();
    }



});


$('form').on('change', 'input[type=radio][name=radio1]', function() {
    window.adjacentInputValue = $(this).closest('.form-check').find('input[type=text]').attr('name');
});


$("#create").on("click", function () {
    var data = {};
    var fields = true;
    $("form").find('input, textarea').each(function() {
        if ($(this).val().trim() === '') {
            $("#err").html("Заполните все поля");
            fields = false;
            return false;
        }

        data[this.name] = $(this).val();
    });


    // проверка на заполняемость полей
    if (fields) {
        // проверка на то что отмечен правильный вариант ответа
        if ($('input[name="radio1"]:checked').length === 0)
            $("#err").html("Отметьте правильный вариант");

        else {
            // проверка на кореектность введенного числа начисляемых баллов
            if (data['cost'] > 10 || data['cost'] < 1)
                $("#err").html("Неверное количестве баллов");

            else {
                data['correct_answer'] = window.adjacentInputValue;

                $.ajax({
                    url: '/vk/controllers/add_task.php',
                    type: 'POST',
                    data: data,
                    success: function (response) {
                        if (response === "Такой вопрос уже есть")
                            $("#err").html(response);
                        else {
                            $("#err").html();
                            window.location.href = "/vk/main.php";
                        }

                    }
                });
            }
        }
    }



});

