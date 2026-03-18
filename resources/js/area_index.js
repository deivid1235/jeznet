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
            const cardId = (card.getAttribute('data-id') || '').toLowerCase(); // <-- Añadido: extraemos el data-id
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

    window.openAreaModal = function(isEdit, actionUrl, btn = null) {
        const modal = document.getElementById('areaModal');
        const form = document.getElementById('areaForm');
        const methodContainer = document.getElementById('methodContainer');
        const title = document.getElementById('modalTitle');
        const btnSubmit = document.getElementById('btnSubmitModal');

        const inputNombre = document.getElementById('modal-nombre');
        const selectEstado = document.getElementById('modal-estado');
        const inputDescripcion = document.getElementById('modal-descripcion');
        const inputEntregables = document.getElementById('modal-entregables');
        const inputProceso = document.getElementById('modal-proceso');

        form.action = actionUrl;

        if (isEdit && btn) {
            title.innerHTML = `
                <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                <span>Editar Área Técnica</span>
            `;
            btnSubmit.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Actualizar Área
            `;
            
            methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';

            inputNombre.value = btn.dataset.nombre || '';
            inputDescripcion.value = btn.dataset.descripcion || '';
            inputEntregables.value = btn.dataset.entregables || '';
            inputProceso.value = btn.dataset.proceso || '';
            
            if (btn.dataset.estado) {
                selectEstado.value = btn.dataset.estado;
            }

        } else {
            title.innerHTML = `
                <svg class="w-6 h-6 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                <span>Nueva Área Técnica</span>
            `;
            btnSubmit.innerHTML = `
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                Guardar Área
            `;
            
            methodContainer.innerHTML = '';

            form.reset();
        }

        modal.classList.remove('hidden');
    };

    window.closeAreaModal = function() {
        const modal = document.getElementById('areaModal');
        modal.classList.add('hidden');
    };

});