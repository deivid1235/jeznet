import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {

    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    if (togglePassword && password) {
        togglePassword.addEventListener("click", function () {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    }

});

<<<<<<< HEAD

=======
document.addEventListener('DOMContentLoaded', function () {
    const select  = document.getElementById('tipoDocumento');
    const wrapper = document.getElementById('numeroDocumentoWrapper');
    const label   = document.getElementById('labelNumDoc');
    const input   = document.getElementById('numeroDocumento');

    const config = {
        'DNI': { label: 'Número de DNI',              placeholder: 'Ingresa tus 8 dígitos',   maxlength: 8  },
        'RUC': { label: 'Número de RUC',              placeholder: 'Ingresa tus 11 dígitos',  maxlength: 11 },
        'CE':  { label: 'Número de Carnet extranjero', placeholder: 'Ingresa el número',      maxlength: 12 },
    };

    select.addEventListener('change', function () {
        const val = this.value;
        if (val && config[val]) {
            label.textContent     = config[val].label;
            input.placeholder     = config[val].placeholder;
            input.maxLength       = config[val].maxlength;
            input.value           = '';
            wrapper.style.display = 'block';
            input.focus();
        } else {
            wrapper.style.display = 'none';
            input.value           = '';
        }
    });
});
>>>>>>> b1406887b9d1d22e8998663975aada6ed6d3a045
