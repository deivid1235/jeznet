document.addEventListener("DOMContentLoaded", function () {

    /* SUBMENUS */
    document.querySelectorAll(".nav-toggle").forEach(function(btn){

        btn.addEventListener("click", function(e){

            e.preventDefault();

            let item = this.closest(".nav-item");

            document.querySelectorAll(".nav-item.has-submenu").forEach(function(el){

                if(el !== item){
                    el.classList.remove("open");
                }

            });

            item.classList.toggle("open");

        });

    });


    /* MARCAR MENU ACTIVO */

    document.querySelectorAll(".nav-link").forEach(function(link){

        link.addEventListener("click", function(){

            document.querySelectorAll(".nav-item").forEach(function(item){
                item.classList.remove("active");
            });

            this.closest(".nav-item").classList.add("active");

        });

    });

});


/* BOTON MENU MOVIL */

function jeznetSidebar(action){

    let sidebar = document.querySelector(".jeznet-sidebar");

    if(!sidebar) return;

    if(action === "toggle"){
        sidebar.classList.toggle("open");
    }

}
