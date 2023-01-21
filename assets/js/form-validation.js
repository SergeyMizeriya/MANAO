// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ЛОГИНА КОРРЕКТНО
let loginForm = document.querySelector("#loginid");
loginForm.addEventListener("input", function () {
  if (loginForm.value.length < 6) {
    document.querySelector("#login-error").innerHTML =
      "введите больше символов";
  } else {
    document.querySelector("#login-error").innerHTML = "";
  }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ПАРОЛЯ КОРРЕКТНО
let passwordForm = document.querySelector("#password");
passwordForm.addEventListener("input", function () {
  let letters = /(([a-zA-Zа-яА-ЯЁё-і].*\d)|(\d.*[a-zA-Zа-яА-ЯЁё-і]))/;

  if (
    passwordForm.value.length > 5 &&
    passwordForm.value.match(letters) === null
  ) {
    document.querySelector("#password-error").innerHTML =
      "введите соответсвующий пароль";
  } else {
    document.querySelector("#password-error").innerHTML = "";
  }
});

// ПОМОГАЕМ ПОЛЬЗОВАТЕЛЮ ВВЕСТИ ДАННЫЕ ИМЕНИ КОРРЕКТНО
let nameForm = document.querySelector("#name");
nameForm.addEventListener("input", function () {
  let nameLetters = /[0-9]/;
  // console.log(this.value);
  console.log(nameForm.value.match(nameLetters));
  // console.log(passwordForm.value.length);
  if (nameForm.value.length < 3 || nameForm.value.match(nameLetters) !== null) {
    document.querySelector("#full-name-error").innerHTML =
      "введите больше 2 символов, без цифр";
  } else {
    document.querySelector("#full-name-error").innerHTML = "";
  }
});
