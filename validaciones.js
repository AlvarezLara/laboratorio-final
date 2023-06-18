var validarFormulario = function () {
    var formularioValido = true;
    var regexEmail = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    var nombre = document.forms[0].nombre.value;
    var primerApellido = document.forms[0].primerApellido.value;
    var segundoApellido = document.forms[0].segundoApellido.value;
    var email = document.forms[0].email.value;
    var login = document.forms[0].login.value;
    var password = document.forms[0].password.value;
    if (nombre.trim() === "") {
        formularioValido = false;
        showError("nombre-error", "El campo nombre es obligatorio");
    }
    else {
        hideError("nombre-error");
    }
    if (primerApellido.trim() === "") {
        formularioValido = false;
        showError("primerApellido-error", "El campo primer apellido es obligatorio");
    }
    else {
        hideError("primerApellido-error");
    }
    if (segundoApellido.trim() === "") {
        formularioValido = false;
        showError("segundoApellido-error", "El campo segundo apellido es obligatorio");
    }
    else {
        hideError("segundoApellido-error");
    }
    if (email.trim() === "") {
        formularioValido = false;
        showError("email-error", "El campo email es obligatorio");
    }
    else if (!regexEmail.test(email)) {
        formularioValido = false;
        showError("email-error", "Por favor, ingresa un email válido");
    }
    else {
        hideError("email-error");
    }
    if (login.trim() === "") {
        formularioValido = false;
        showError("login-error", "El campo login es obligatorio");
    }
    else {
        hideError("login-error");
    }
    var passwordTrimed = password.trim();
    if (passwordTrimed === "") {
        formularioValido = false;
        showError("password-error", "El campo password es obligatorio");
    }
    else if (passwordTrimed.length < 4 || passwordTrimed.length > 8) {
        formularioValido = false;
        showError("password-error", "El campo password debe tener entre 4 y 8 caracteres");
    }
    else {
        hideError("password-error");
    }
    return formularioValido;
};
var showError = function (id, mensage) {
    var elemento = document.getElementById(id);
    elemento.innerText = mensage;
    elemento.classList.add("show");
    elemento.classList.remove("hide");
};
var hideError = function (id) {
    var elemento = document.getElementById(id);
    elemento.innerText = "";
    elemento.classList.add("hide");
    elemento.classList.remove("show");
};
var mostrarListado = function () {
    window.location.href = "consulta.php";
};
  