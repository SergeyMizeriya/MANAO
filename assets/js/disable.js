//  ПРИ ОТКЛЮЧЕННОМ JavaScript КНОПКА ФОРМЫ БУДЕТ СОСТОЯНИИ 'disabled'
//      работающий JavaScript отключает эту опцию у формы

var _onload =
  window.onload ||
  function () {
    document.getElementById("submitBtn").disabled = false;
  };

_onload();
