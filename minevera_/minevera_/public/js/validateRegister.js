document.getElementById("register-form").addEventListener("submit", function (event) {
    // Validar el formulario
    var form = event.target;
    if (!form.checkValidity()) {
    // Mostrar mensajes de error
    var nameInput = form.querySelector("input[name='name']");
    if (!nameInput.validity.valid) {
    // Mostrar mensaje de error para el campo "name"
    document.getElementById("name-error").textContent =
    "Por favor ingresa tu nombre";
    }
   
    var emailInput = form.querySelector("input[name='email']");
    if (!emailInput.validity.valid) {
    // Mostrar mensaje de error para el campo "email"
    document.getElementById("email-error").textContent =
    "Por favor ingresa un correo electrónico válido";
    }
   
    var passwordInput = form.querySelector("input[name='password']");
    if (!passwordInput.validity.valid) {
    // Mostrar mensaje de error para el campo "password"
    if (passwordInput.validity.valueMissing) {
    document.getElementById("password1-error").textContent =
    "Por favor ingresa una contraseña";
    } else if (passwordInput.validity.tooShort) {
    document.getElementById("password1-error").textContent =
    "La contraseña debe tener al menos 8 caracteres";
    }
    }
   
    var passwordConfirmationInput = form.querySelector(
    "input[name='password_confirmation']"
    );
    if (
    !passwordConfirmationInput.validity.valid ||
    passwordConfirmationInput.value !== passwordInput.value
    ) {
    // Mostrar mensaje de error para el campo "password_confirmation"
    document.getElementById("password2-error").textContent =
    "Las contraseñas no coinciden";
    }
   
    // Cancelar el envío del formulario
    event.preventDefault();
    } else {
    // Limpiar los mensajes de error
    document.getElementById("name-error").textContent = "";
    document.getElementById("email-error").textContent = "";
    document.getElementById("password1-error").textContent = "";
    document.getElementById("password2-error").textContent = "";
    }
   });
   