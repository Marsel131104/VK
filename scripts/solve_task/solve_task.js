$('input[type=radio][name=radio1]').change(function() {
    window.adjacentInputValue = $(this).closest('.form-check').find('label[class=form-check-label]').text();
});

$("#btn").on("click", function () {
    $("#success_answer").hide();

    // проверяем чтобы был выбран ответ
    if ($('input[name="radio1"]:checked').length == 0) {
        $("#err").html("Отметьте вариант ответа");
    }

    else {
        // проверяем чтобы был выбранный ответ был верным
        if (window.adjacentInputValue != $("[name='correct_answer']").val()) {
            $("#err").html("Неверный ответ");

        }


        else {
            $("#err").html("");

            var data = {"id": $("[name='id']").val(), "cost": $("[name='cost']").val()};;
            $.ajax({
                url: '/vk/controllers/solved_task',
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response == "user_create")
                        $("#success_answer").html('<h4 class="alert-heading">Отлично, вы ответили верно!</h4>' +
                            '<p>Но так как вы создали этот тест, баллы не засчитываются</p>' +
                            '<hr>' +
                            '<p class="mb-0">Теперь можно зайти в <a href="create_task.php" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">конструктор</a> и создать ещё тесты.</p>' +
                            '</div>').show("slow");

                    else if (response == 'yes')
                        $("#success_answer").html('<h4 class="alert-heading">Отлично, вы ответили верно!</h4>' +
                            '<p>Но так как вы уже проходили этот тест, вам не будут засчитаны баллы, однако вы все равно МОЛОДЕЦ :)</p>' +
                            '<hr>' +
                            '<p class="mb-0">Теперь можно зайти в <a href="history.php" class="link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">историю</a> и посмотреть все выполненные тесты.</p>' +
                            '</div>').show("slow");
                    else if (response == 'no') {
                        $("#success_answer").show("slow");
                        $("#balance").text(parseInt($("[name='cost']").val()) + parseInt($("#balance").text()));
                    }
                }

            });
        }
    }

});