window.imprimirDocumento = function(url) {
    document.body.style.cursor = 'wait';
    let iframeViejo = document.getElementById('iframeImpresionOculto');
    if (iframeViejo) iframeViejo.remove();

    let iframe = document.createElement('iframe');
    iframe.id = 'iframeImpresionOculto';
    iframe.style.cssText = 'position:fixed;top:0;left:0;width:100vw;height:100vh;opacity:0;pointer-events:none;z-index:-9999;';
    document.body.appendChild(iframe);

    iframe.onload = function() {
        document.body.style.cursor = 'default';
        setTimeout(() => {
            iframe.contentWindow.focus();
            iframe.contentWindow.print();
        }, 100);
    };
    iframe.src = url;
};

document.addEventListener('DOMContentLoaded', function() {
    const formFiltros = document.getElementById('formFiltrosReclamos');
    if (!formFiltros) return;

    const inputSearch = formFiltros.querySelector('input[name="search"]');
    const radiosTipo = formFiltros.querySelectorAll('input[name="tipo"]');
    const contenedorTabla = document.querySelector('table').parentElement;

    async function actualizarResultados() {
        contenedorTabla.style.opacity = '0.5';
        contenedorTabla.style.transition = 'opacity 0.2s';

        const formData = new FormData(formFiltros);
        const params = new URLSearchParams(formData);
        const url = `${formFiltros.action}?${params.toString()}`;

        try {
            const response = await fetch(url, {
                headers: { "X-Requested-With": "XMLHttpRequest" }
            });
            const html = await response.text();
            
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            const nuevaTabla = doc.querySelector('table');
            const nuevaPaginacion = doc.querySelector('.pagination') || doc.querySelector('[role="navigation"]');

            document.querySelector('table').innerHTML = nuevaTabla.innerHTML;
            
            const paginacionActual = document.querySelector('.pagination') || document.querySelector('[role="navigation"]');
            if (paginacionActual && nuevaPaginacion) {
                paginacionActual.outerHTML = nuevaPaginacion.outerHTML;
            }

            window.history.pushState({}, '', url);

        } catch (error) {
            console.error('Error al filtrar:', error);
        } finally {
            contenedorTabla.style.opacity = '1';
            document.body.style.cursor = 'default';
        }
    }

    radiosTipo.forEach(radio => {
        radio.addEventListener('change', () => {
            actualizarResultados();
        });
    });

    let timeoutId;
    inputSearch.addEventListener('input', function() {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            actualizarResultados();
        }, 400); 
    });
});