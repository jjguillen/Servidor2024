
</div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!----------------------- AJAX -------------------->

<script>
    //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
    window.addEventListener("load" ,inicio);

    //Función que escucha los eventos
    function inicio() {

        document.getElementById("buscar").addEventListener("click", async function(e) {
            e.preventDefault();

            const datos = new FormData(document.getElementById('formBuscar'));
            datos.append("accion","buscarLibros");
            const response = await fetch("enrutador.php", {
                method: 'POST',  body: datos
            });
            document.getElementById("contenedor").innerHTML = await response.text();
        });

        document.getElementById("contenedor").addEventListener("click", async function(e) {
            e.preventDefault();
            let addFavoritos = e.target.closest("form");

            if (addFavoritos) {

                const datos = new FormData(addFavoritos);
                datos.append("accion", "addFavoritos");
                const response = await fetch("enrutador.php", {
                    method: 'POST', body: datos
                });   
                document.getElementById("mensaje").innerHTML = await response.text();   
                $('#mensajeModal').modal('toggle')              
            }
        });

        document.getElementById("verFavoritos").addEventListener("click", async function(e) {
            const datos = new FormData();
            datos.append("accion","verFavoritos");
            const response = await fetch("enrutador.php", {
                    method: 'POST', body: datos
                });  
            document.getElementById("contenedor").innerHTML = await response.text();
        });

        document.getElementById("contenedor").addEventListener("click", async function(e) {
            e.preventDefault();
            let borrarFavorito = e.target.closest("button[accion=borrarFavorito]");
            if (borrarFavorito) {
                const datos = new FormData();
                datos.append("id",borrarFavorito.id);
                datos.append("accion","borrarFavorito");
                const response = await fetch("enrutador.php", {
                        method: 'POST', body: datos
                    });  
                document.getElementById("contenedor").innerHTML = await response.text();
            }
        });
        
    }

</script>


<!------------------------------------------------->

</body>
</html>