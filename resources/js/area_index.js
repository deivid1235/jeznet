document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const filterButtons = document.querySelectorAll('.btn-filter');
    const statCards = document.querySelectorAll('.stat-card-filter');
    const areaCards = document.querySelectorAll('.area-card');
    
    let currentFilter = 'todos';
    let currentStatusFilter = 'todos';

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            applyFilters();
        });
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function () {
            currentFilter = this.getAttribute('data-filter');
            updateActiveButtonStyles(this);
            applyFilters();
        });
    });

    statCards.forEach(card => {
        card.addEventListener('click', function () {
            if (currentStatusFilter === this.getAttribute('data-status-filter')) {
                currentStatusFilter = 'todos';
                updateActiveStatStyles(null);
            } else {
                currentStatusFilter = this.getAttribute('data-status-filter');
                updateActiveStatStyles(this);
            }
            applyFilters();
        });
    });

    function applyFilters() {
        const searchTerm = searchInput.value.toLowerCase().trim();

        areaCards.forEach(card => {
            const cardName = (card.getAttribute('data-nombre') || '').toLowerCase(); 
            const cardId = (card.getAttribute('data-id') || '').toLowerCase();
            const cardProjectStatus = card.getAttribute('data-proyecto');
            const cardEstado = card.getAttribute('data-estado');

            const matchesSearch = cardName.includes(searchTerm) || cardId.includes(searchTerm);
            const matchesProjectFilter = (currentFilter === 'todos') || (currentFilter === cardProjectStatus);
            const matchesStatusFilter = (currentStatusFilter === 'todos') || (currentStatusFilter === cardEstado);

            if (matchesSearch && matchesProjectFilter && matchesStatusFilter) {
                card.style.display = 'flex'; 
            } else {
                card.style.display = 'none';
            }
        });
    }

    function updateActiveButtonStyles(clickedButton) {
        filterButtons.forEach(btn => {
            btn.classList.remove('bg-[#081423]', 'text-[#d4af37]', 'border-[#081423]');
            btn.classList.add('bg-white', 'text-gray-500');
            const icon = btn.querySelector('.icon-filter');
            if(icon) {
                icon.classList.remove('text-[#d4af37]');
                icon.classList.add('text-gray-400');
            }
        });

        clickedButton.classList.remove('bg-white', 'text-gray-500');
        clickedButton.classList.add('bg-[#081423]', 'text-[#d4af37]', 'border-[#081423]');
        const clickedIcon = clickedButton.querySelector('.icon-filter');
        if(clickedIcon) {
            clickedIcon.classList.remove('text-gray-400');
            clickedIcon.classList.add('text-[#d4af37]');
        }
    }

    function updateActiveStatStyles(clickedCard) {
        statCards.forEach(card => {
            card.classList.remove('ring-2', 'ring-offset-2', 'ring-[#d4af37]');
        });

        if (clickedCard) {
            clickedCard.classList.add('ring-2', 'ring-offset-2', 'ring-[#d4af37]');
        }
    }

    const forms = document.querySelectorAll('.form-toggle-status');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); 

            const estadoActual = this.dataset.estado;
            const isActivo = estadoActual === 'Activo';
            const accion = isActivo ? 'desactivar' : 'activar';
            const estadoFuturo = isActivo ? 'Inactiva' : 'Activa';
            const iconContainer = isActivo 
                ? 'bg-rose-100 text-rose-600 ring-8 ring-rose-50' 
                : 'bg-emerald-100 text-emerald-600 ring-8 ring-emerald-50';
            const textHighlight = isActivo ? 'text-rose-600' : 'text-emerald-600';
            const btnConfirmar = isActivo 
                ? 'bg-gradient-to-r from-rose-500 to-rose-600 shadow-rose-500/40 hover:shadow-rose-600/60 focus:ring-rose-200' 
                : 'bg-gradient-to-r from-emerald-500 to-emerald-600 shadow-emerald-500/40 hover:shadow-emerald-600/60 focus:ring-emerald-200';
            const svgIcon = isActivo 
                ? `<svg class="w-10 h-10 transition-transform duration-300 hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>`
                : `<svg class="w-10 h-10 transition-transform duration-300 hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 13l4 4L19 7"></path></svg>`;

            Swal.fire({
                showCancelButton: true,
                buttonsStyling: false,
                reverseButtons: true,
                background: '#ffffff',
                html: `
                    <div class="flex flex-col items-center pt-2 pb-1">
                        <div class="flex items-center justify-center w-20 h-20 rounded-full mb-6 shadow-inner ${iconContainer}">
                            ${svgIcon}
                        </div>
                        <h2 class="text-[26px] font-extrabold text-[#0f1d3a] mb-3 tracking-tight">¿Confirmas la acción?</h2>
                        <p class="text-slate-500 text-[15px] px-2 leading-relaxed">
                            Estás a punto de <strong class="text-[#0f1d3a]">${accion}</strong> esta área.<br>
                            El registro pasará a estar <span class="font-bold ${textHighlight}">${estadoFuturo}</span> en el sistema.
                        </p>
                    </div>
                `,
                customClass: {
                    popup: 'rounded-[24px] shadow-[0_20px_50px_rgba(15,29,58,0.12)] border border-slate-100',
                    actions: 'w-full px-8 pb-8 pt-0 flex gap-4',
                    confirmButton: `flex-1 px-5 py-3.5 rounded-xl font-bold text-white transition-all duration-300 transform hover:-translate-y-1 shadow-lg focus:ring-4 focus:outline-none ${btnConfirmar}`,
                    cancelButton: 'flex-1 px-5 py-3.5 rounded-xl font-bold text-slate-600 bg-slate-100 transition-all duration-300 transform hover:-translate-y-1 hover:bg-slate-200 hover:text-[#0f1d3a] focus:ring-4 focus:ring-slate-100 focus:outline-none'
                },
                confirmButtonText: `Sí, ${accion}`,
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });

    const successElement = document.getElementById('flash-success-message');
    if (successElement) {
        const mensaje = successElement.getAttribute('data-message');
        Swal.fire({
            showConfirmButton: true,
            buttonsStyling: false,
            timer: 4000,
            timerProgressBar: true,
            background: '#ffffff',
            backdrop: `rgba(15, 23, 42, 0.5)`,
            html: `
                <div class="flex flex-col items-center pt-2 pb-1">
                    <div class="flex items-center justify-center w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full mb-6 shadow-inner ring-8 ring-emerald-50">
                        <svg class="w-10 h-10 animate-[bounce_1s_infinite]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-[26px] font-extrabold text-[#0f1d3a] mb-3 tracking-tight">¡Excelente!</h2>
                    <p class="text-slate-500 text-[15px] px-2 leading-relaxed text-center">
                        ${mensaje}
                    </p>
                </div>
            `,
            confirmButtonText: 'Continuar',
            customClass: {
                popup: 'rounded-[24px] shadow-[0_20px_50px_rgba(15,29,58,0.12)] border border-slate-100 !w-[26rem]',
                htmlContainer: '!m-0 !p-0',
                actions: 'w-full px-8 pb-8 pt-4 flex justify-center',
                confirmButton: 'w-full px-6 py-3.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold rounded-xl shadow-lg shadow-emerald-500/40 hover:shadow-emerald-600/60 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 focus:ring-4 focus:ring-emerald-200 focus:outline-none'
            }
        });
    }

    window.openAreaModal = function(isEdit, actionUrl, buttonElement = null) {
        const modal = document.getElementById('areaModal');
        const form = document.getElementById('areaForm');
        const methodContainer = document.getElementById('methodContainer');
        const modalTitle = document.getElementById('modalTitle').querySelector('span');
        const btnSubmit = document.getElementById('btnSubmitModal');
        const grupoEstado = document.getElementById('grupo-estado');

        if (!modal || !form) return;

        form.reset();
        form.action = actionUrl;

        if (isEdit && buttonElement) {
            modalTitle.textContent = 'Editar Área Técnica';
            btnSubmit.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Actualizar Área
            `;
            methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
            grupoEstado.classList.remove('hidden');

            document.getElementById('modal-nombre').value = buttonElement.dataset.nombre || '';
            document.getElementById('modal-icono').value = buttonElement.dataset.icono || 'bi-briefcase';
            document.getElementById('modal-descripcion').value = buttonElement.dataset.descripcion || '';
            document.getElementById('modal-entregables').value = buttonElement.dataset.entregables || '';
            document.getElementById('modal-proceso').value = buttonElement.dataset.proceso || '';
            
            const estadoActual = buttonElement.dataset.estado || 'Activo';
            const selectEstado = document.getElementById('modal-estado');
            if (selectEstado) {
                const estadoFormat = estadoActual.charAt(0).toUpperCase() + estadoActual.slice(1).toLowerCase();
                selectEstado.value = estadoFormat;
            }

        } else {
            modalTitle.textContent = 'Nueva Área Técnica';
            btnSubmit.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Guardar Área
            `;
            methodContainer.innerHTML = '';
            grupoEstado.classList.add('hidden');
            document.getElementById('modal-estado').value = 'Activo'; 
            document.getElementById('modal-icono').value = 'bi-briefcase';
        }

        modal.classList.remove('hidden');
    };

    window.closeAreaModal = function() {
        const modal = document.getElementById('areaModal');
        if (modal) {
            modal.classList.add('hidden');
        }
    };

    const errorContainer = document.getElementById('flash-error-messages');
    if (errorContainer) {
        const errorItems = errorContainer.querySelectorAll('.error-item');
        let errorMessages = '';
        
        errorItems.forEach(item => {
            errorMessages += `<li class="text-left text-sm text-slate-600 border-b border-rose-100 last:border-0 py-2"><i class="fas fa-exclamation-circle text-rose-400 mr-2"></i> ${item.textContent}</li>`;
        });

        Swal.fire({
            showConfirmButton: true,
            buttonsStyling: false,
            background: '#ffffff',
            backdrop: `rgba(15, 23, 42, 0.5)`,
            html: `
                <div class="flex flex-col items-center pt-2 pb-1">
                    <div class="flex items-center justify-center w-20 h-20 bg-rose-100 text-rose-600 rounded-full mb-6 shadow-inner ring-8 ring-rose-50">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                    </div>
                    <h2 class="text-[26px] font-extrabold text-[#0f1d3a] mb-4 tracking-tight">Datos Inválidos</h2>
                    <div class="w-full bg-rose-50/50 border border-rose-100 rounded-xl p-4">
                        <ul class="m-0 p-0 list-none">
                            ${errorMessages}
                        </ul>
                    </div>
                </div>
            `,
            confirmButtonText: 'Entendido, corregir',
            customClass: {
                popup: 'rounded-[24px] shadow-[0_20px_50px_rgba(15,29,58,0.12)] border border-slate-100 !w-[28rem]',
                htmlContainer: '!m-0 !p-0',
                actions: 'w-full px-8 pb-8 pt-4 flex justify-center',
                confirmButton: 'w-full px-6 py-3.5 bg-slate-800 text-white font-bold rounded-xl shadow-lg hover:bg-slate-700 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 focus:ring-4 focus:ring-slate-200 focus:outline-none'
            }
        }).then(() => {
            const btnNewArea = document.querySelector('button[onclick*="openAreaModal(false"]');
            if (btnNewArea) {
                btnNewArea.click();
            }
        });
    }
});