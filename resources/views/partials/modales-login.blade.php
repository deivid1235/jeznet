<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal p-4">
            <div class="modal-body">

                <h2 class="text-center fw-bold mb-5">INICIAR SESIÓN</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label fw-semibold d-flex align-items-center gap-2">
                            <i class="fas fa-envelope-circle-check login-icon"></i>
                            Correo electrónico
                        </label>
                        <input type="email" name="email" class="form-control login-input" placeholder="Ingresa tu correo electrónico" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label fw-semibold d-flex align-items-center gap-2">
                            <i class="fas fa-lock login-icon"></i>
                            Contraseña
                        </label>
                        <div class="position-relative">
                            <input type="password" name="password" id="password" class="form-control login-input" placeholder="Ingresa tu contraseña" required>
                            <i id="togglePassword" class="fas fa-eye password-eye"></i>
                        </div>
                    </div>

                    <p class="small text-muted mt-3">
                        ¿Olvidaste tu contraseña? No te preocupes, pide un código verificador por
                        <a href="#" class="fw-semibold link-correo" data-bs-toggle="modal" data-bs-target="#recoverModal" data-bs-dismiss="modal">
                            correo
                        </a>
                        para cambiar tu contraseña.
                    </p>

                    <div class="d-grid my-4">
                        <button type="submit" class="btn btn-hero">INGRESAR</button>
                    </div>
                </form>
                <div class="text-center mb-3">
                    <a href="{{ route('register') }}" class="fw-semibold link-correo">
                        Registrar cuenta
                    </a>
                </div>

                <div class="text-center social-icons-simple">
                    <a href="#" aria-label="Ingresar con Google" class="social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Ingresar con Facebook" class="social-link">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="#1877F2"/>
                            <path d="M16.671 15.542l.532-3.469h-3.328v-2.25c0-.949.465-1.874 1.956-1.874h1.514V5.006s-1.374-.235-2.686-.235c-2.741 0-4.533 1.662-4.533 4.669v2.633H7.078v3.469h3.047v8.385a12.09 12.09 0 003.75 0v-8.385h2.796z" fill="#FFFFFF"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="recoverModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content login-modal p-4">

            <button type="button" class="btn-close position-absolute" style="top:15px; right:15px;" data-bs-dismiss="modal"></button>

            <div class="modal-body text-center">

                <h2 class="fw-bold mb-4">RECUPERAR<br>CONTRASEÑA</h2>

                <p class="text-muted mb-4">
                    Ingrese su correo electrónico y le enviaremos
                    instrucciones para restablecer su contraseña.
                </p>

                <div class="mb-4 text-start">
                    <label class="form-label fw-semibold d-flex align-items-center gap-2">
                        <i class="fas fa-envelope login-icon"></i>
                        Correo electrónico
                    </label>
                    <input type="email" class="form-control login-input" placeholder="Ingresa tu correo electrónico">
                </div>

                <div class="d-grid mb-4">
                    <button class="btn btn-hero">ENVIAR LINK</button>
                </div>

                <a href="#"
                  class="link-catalogo d-inline-flex align-items-center mt-3 mt-md-0"
                  data-bs-toggle="modal"
                  data-bs-target="#loginModal"
                  data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Regresar a login
                </a>

            </div>
        </div>
    </div>
</div>

@if(request('login') == 'true')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
</script>
@endif