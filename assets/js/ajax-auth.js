$("document").ready(function () {
  $("#authorization-form").on("submit", function () {
    let dataForm = $(this).serialize();
    event.preventDefault();

    // ОТПРАВЛЯЕМ AJAX
    $.ajax({
      url: "vendor/signin.php",
      method: "post",
      dataType: "html",
      data: dataForm,
      success: function (data) {
        // ЕСЛИ ОТВЕТ НЕ ПУСТОЙ ПАРСИМ
        if (data !== "") {
          const response = $.parseJSON(data);
          // РАЗБИРАЕМСЯ С ОШИБКАМИ
          if (response.loginError) {
            document.querySelector("#auth-login-error").innerHTML =
              response["loginError"];
          }
          if (response.passwordError) {
            document.querySelector("#auth-password-error").innerHTML =
              response["passwordError"];
          }
          //ЕСЛИ ОШИЬОК НЕТ - ПЕРЕХОДИМ НА СТРАНИЦУ ПРОФИЛЯ
          if (response.success == true) {
            window.location.href = "http://manao/home.php";
          }
          if (response.success == false) {
            document.querySelector("#auth-error").innerHTML =
              "неверный логин и/или пароль";
          }
        }
      },
      error: function (data) {
        console.log("ошибка");
      },
    });
  });
});
