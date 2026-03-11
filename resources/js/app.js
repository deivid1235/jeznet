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

// Libro de reclamaciones ► Departamentos → provincia → distrito
document.addEventListener('DOMContentLoaded', function() {
    let ubigeoData = {};

    const deptSelect = document.getElementById('departamento');
    const provSelect = document.getElementById('provincia');
    const distSelect = document.getElementById('distrito');

    async function cargarUbigeo() {
        try {
            const response = await fetch('https://raw.githubusercontent.com/CONCYTEC/ubigeo-peru/master/equivalencia-ubigeos-oti-concytec.json');
            const dataFlat = await response.json();

            dataFlat.forEach(item => {
                let dep = item.desc_dep_inei;
                let prov = item.desc_prov_inei;
                let dist = item.desc_ubigeo_inei;

                if (dep && prov && dist) {
                    if (!ubigeoData[dep]) ubigeoData[dep] = {};
                    if (!ubigeoData[dep][prov]) ubigeoData[dep][prov] = [];
                    if (!ubigeoData[dep][prov].includes(dist)) {
                        ubigeoData[dep][prov].push(dist);
                    }
                }
            });

            Object.keys(ubigeoData).sort().forEach(departamento => {
                let option = document.createElement('option');
                option.value = departamento;
                option.textContent = departamento;
                deptSelect.appendChild(option);
            });

        } catch (error) {
            console.error("Error al cargar datos del CONCYTEC:", error);
        }
    }

    deptSelect.addEventListener('change', function() {
        provSelect.innerHTML = '<option value="" selected disabled>Seleccione una provincia...</option>';
        distSelect.innerHTML = '<option value="" selected disabled>Seleccione un distrito...</option>';
        distSelect.disabled = true;

        const depto = this.value;
        if (depto && ubigeoData[depto]) {
            Object.keys(ubigeoData[depto]).sort().forEach(provincia => {
                let option = document.createElement('option');
                option.value = provincia;
                option.textContent = provincia;
                provSelect.appendChild(option);
            });
            provSelect.disabled = false;
        }
    });

    provSelect.addEventListener('change', function() {
        distSelect.innerHTML = '<option value="" selected disabled>Seleccione un distrito...</option>';
        
        const depto = deptSelect.value;
        const prov = this.value;

        if (prov && ubigeoData[depto][prov]) {
            const distritos = ubigeoData[depto][prov].sort();
            distritos.forEach(distrito => {
                let option = document.createElement('option');
                option.value = distrito;
                option.textContent = distrito;
                distSelect.appendChild(option);
            });
            distSelect.disabled = false;
        }
    });

    cargarUbigeo();
});

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const btnSubmit = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function() {
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando...';
        btnSubmit.disabled = true;
    });
});

document.addEventListener('DOMContentLoaded', function() {

    const tipoDocumentoSelect = document.getElementById('tipoDocumento');
    const numeroDocumentoInput = document.getElementById('numeroDocumento');
    const telefonoInput = document.getElementById('telefono');
    const correoInput = document.getElementById('correo');
    const confirmarCorreoInput = document.getElementById('confirmarCorreo');
    const form = document.querySelector('form');
    const btnSubmit = form.querySelector('button[type="submit"]');

    function actualizarValidacionDocumento() {
        const tipo = tipoDocumentoSelect.value;
        numeroDocumentoInput.value = '';
        
        numeroDocumentoInput.removeAttribute('maxlength');
        numeroDocumentoInput.removeAttribute('minlength');
        numeroDocumentoInput.removeAttribute('pattern');

        if (tipo === 'DNI') {
            numeroDocumentoInput.setAttribute('maxlength', '8');
            numeroDocumentoInput.setAttribute('minlength', '8');
            numeroDocumentoInput.setAttribute('pattern', '\\d{8}');
            numeroDocumentoInput.setAttribute('title', 'El DNI debe tener exactamente 8 dígitos numéricos.');
        } else if (tipo === 'RUC') {
            numeroDocumentoInput.setAttribute('maxlength', '11');
            numeroDocumentoInput.setAttribute('minlength', '11');
            numeroDocumentoInput.setAttribute('pattern', '\\d{11}');
            numeroDocumentoInput.setAttribute('title', 'El RUC debe tener exactamente 11 dígitos numéricos.');
        } else if (tipo === 'CE') {
            numeroDocumentoInput.setAttribute('maxlength', '12');
            numeroDocumentoInput.setAttribute('title', 'Ingrese el Carnet de Extranjería.');
        } else if (tipo === 'Pasaporte') {
            numeroDocumentoInput.setAttribute('maxlength', '15');
        }
    }

    tipoDocumentoSelect.addEventListener('change', actualizarValidacionDocumento);

    numeroDocumentoInput.addEventListener('input', function(e) {
        const tipo = tipoDocumentoSelect.value;
        if (tipo === 'DNI' || tipo === 'RUC') {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    });

    telefonoInput.setAttribute('maxlength', '9');
    telefonoInput.setAttribute('minlength', '9');
    telefonoInput.setAttribute('pattern', '\\d{9}');
    telefonoInput.setAttribute('title', 'El teléfono debe tener 9 dígitos numéricos.');
    
    telefonoInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function validarCorreos() {
        if (correoInput.value !== confirmarCorreoInput.value) {
            confirmarCorreoInput.setCustomValidity('Los correos electrónicos no coinciden.');
        } else {
            confirmarCorreoInput.setCustomValidity('');
        }
    }

    correoInput.addEventListener('input', validarCorreos);
    confirmarCorreoInput.addEventListener('input', validarCorreos);

    form.addEventListener('submit', function(e) {

        if (!this.checkValidity()) {
            e.preventDefault();
            return;
        }

        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Enviando...';
        btnSubmit.disabled = true;
    });
});



function validarFormulario() {

    let correo = document.getElementById("correo").value.trim();
    let nombre = document.getElementById("nombre").value.trim();
    let apellidos = document.getElementById("apellidos").value.trim();
    let password = document.getElementById("password").value.trim();
    let tipoDocumento = document.getElementById("tipoDocumento").value;
    let numeroDocumento = document.getElementById("numeroDocumento").value.trim();
    let check1 = document.getElementById("check1").checked;
    let check2 = document.getElementById("check2").checked;

    let boton = document.getElementById("btnRegistrar");

    if (
        correo !== "" &&
        nombre !== "" &&
        apellidos !== "" &&
        password !== "" &&
        tipoDocumento !== "" &&
        numeroDocumento !== "" &&
        check1 &&
        check2
    ) {
        boton.disabled = false;
    } else {
        boton.disabled = true;
    }
}

document.querySelectorAll("input, select").forEach(element => {
    element.addEventListener("input", validarFormulario);
});

