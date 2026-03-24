document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('buscadorProyecto');
    const buttons = document.querySelectorAll('.btn-filtro');
    const filas = document.querySelectorAll('.fila-proyecto');

    let activeFilter = 'todos';

    const normalize = str => str.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

    function filtrarProyectos() {
        const texto = normalize(searchInput.value.trim());

        filas.forEach(fila => {
            const nombre = normalize(fila.dataset.nombre);
            const estado = normalize(fila.dataset.estado);

            const coincideNombre = nombre.includes(texto);
            const coincideEstado = activeFilter === 'todos' || estado === activeFilter;

            fila.style.display = (coincideNombre && coincideEstado) ? '' : 'none';
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active-filtro'));
            btn.classList.add('active-filtro');

            activeFilter = normalize(btn.dataset.filtro);
            filtrarProyectos();
        });
    });

    searchInput.addEventListener('input', filtrarProyectos);
    filtrarProyectos(); // Filtrar al cargar
});