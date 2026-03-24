import './bootstrap';
import './area_index';

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

document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('login') === 'true') {
        let loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
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



document.getElementById("celular").addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
    this.value = this.value.replace(/[^0-9]/g, '');
});


const tipoDocumento = document.getElementById("tipoDocumento");
const numeroDocumento = document.getElementById("numeroDocumento");
const wrapper = document.getElementById("numeroDocumentoWrapper");
const label = document.getElementById("labelNumDoc");

tipoDocumento.addEventListener("change", function () {
    wrapper.style.display = "block";

    if (this.value === "DNI") {
        label.textContent = "DNI (8 dígitos)";
        numeroDocumento.maxLength = 8;
    } 
    else if (this.value === "RUC") {
        label.textContent = "RUC (11 dígitos)";
        numeroDocumento.maxLength = 11;
    } 
    else if (this.value === "CE") {
        label.textContent = "CE (9 dígitos)";
        numeroDocumento.maxLength = 9;
    }

    numeroDocumento.value = "";
});

numeroDocumento.addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, '');
});

document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.getElementById('btnTogglePassword');
    const passwordInput = document.getElementById('password');
    const iconPassword = document.getElementById('iconPassword');

    togglePassword.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            iconPassword.classList.remove('fa-eye-slash');
            iconPassword.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            iconPassword.classList.remove('fa-eye');
            iconPassword.classList.add('fa-eye-slash');
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {

    const flash = document.getElementById('flash-message');
    if (!flash) return;

    const type = flash.dataset.type;
    const message = flash.dataset.message;

    // Configuración dinámica
    let config = {
        iconColor: 'green',
        bg: 'bg-green-100',
        text: 'text-green-600',
        border: 'border-green-100',
        title: 'Operación Exitosa',
        icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"></path>`
    };

    if (type === 'error') {
        config = {
            iconColor: 'red',
            bg: 'bg-red-100',
            text: 'text-red-600',
            border: 'border-red-100',
            title: 'Ocurrió un error',
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"></path>`
        };
    }

    if (type === 'warning') {
        config = {
            iconColor: 'yellow',
            bg: 'bg-yellow-100',
            text: 'text-yellow-600',
            border: 'border-yellow-100',
            title: 'Advertencia',
            icon: `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v2m0 4h.01M10.29 3.86l-7.5 13A1 1 0 003.67 18h16.66a1 1 0 00.88-1.5l-7.5-13a1 1 0 00-1.76 0z"></path>`
        };
    }

    Swal.fire({
        showConfirmButton: true,
        buttonsStyling: false,
        background: '#ffffff',
        backdrop: `rgba(15, 23, 42, 0.5)`,
        html: `
            <div class="flex flex-col items-center pt-2 pb-1">
                
                <div class="flex items-center justify-center w-20 h-20 ${config.bg} ${config.text} rounded-full mb-6 shadow-inner ring-8 ring-${config.iconColor}-50">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        ${config.icon}
                    </svg>
                </div>

                <h2 class="text-[26px] font-extrabold text-[#0f1d3a] mb-4 tracking-tight">
                    ${config.title}
                </h2>

                <div class="w-full ${config.bg}/50 border ${config.border} rounded-xl p-4">
                    <p class="text-sm text-slate-600 text-center">
                        ${message}
                    </p>
                </div>

            </div>
        `,
        confirmButtonText: 'Aceptar',
        customClass: {
            popup: 'rounded-[24px] shadow-[0_20px_50px_rgba(15,29,58,0.12)] border border-slate-100 !w-[28rem]',
            htmlContainer: '!m-0 !p-0',
            actions: 'w-full px-8 pb-8 pt-4 flex justify-center',
            confirmButton: `w-full px-6 py-3.5 bg-${config.iconColor}-600 text-white font-bold rounded-xl shadow-lg hover:bg-${config.iconColor}-500 transition-all duration-300`
        }
    });


});


document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('buscadorProyecto');
    const buttons = document.querySelectorAll('.btn-filtro');
    const filas = document.querySelectorAll('.fila-proyecto');

    let activeFilter = 'todos';

    function filtrarProyectos() {
        const texto = searchInput.value.toLowerCase().trim();

        filas.forEach(fila => {
            const nombre = fila.dataset.nombre;
            const estado = fila.dataset.estado;

            const coincideNombre = nombre.includes(texto);
            const coincideEstado = activeFilter === 'todos' || estado === activeFilter;

            fila.style.display = (coincideNombre && coincideEstado) ? '' : 'none';
        });
    }

    // Escucha los botones de filtro
    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active-filtro'));
            btn.classList.add('active-filtro');
            activeFilter = btn.dataset.filtro.toLowerCase();
            filtrarProyectos();
        });
    });

    // Escucha el buscador
    searchInput.addEventListener('input', filtrarProyectos);

    // Filtra al cargar la página
    filtrarProyectos();
});