

        </div> <!-- Ajax -->

    </div>

<!---------------------- MODALES ------------------------->
<!-- FORM NUEVA NOTICIA -->
<div class="modal fade" id="modalNuevaNoticia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva Noticia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form id='formNuevaNoticia' class='row g-3 needs-validation'>
                <div class='col-md-10'>
                    <label class='form-label'>Encabezado</label>
                    <input type='text' class='form-control' name='encabezado' required>
                </div>
                <div class='col-md-4'>
                    <label class='form-label'>Fecha</label>
                    <input type='date' class='form-control' name='fecha' required>
                </div>
                <div class='col-md-10'>
                    <label class='form-label'>Noticia</label>
                    <textarea class='form-control' name='noticia' required></textarea>
                </div>
                <input type='hidden' name='accion' value='crearNoticia'>
                <button type="submit"  accion='nuevaNoticia' class="btn btn-primary form-control">Guardar</button>
            </form>
      </div>
      
    </div>
  </div>
</div>

            
<!---------------------- FIN MODALES ------------------------->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!----------------------- AJAX -------------------->

<script>
    //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
    window.addEventListener("load" ,inicio);

    //Función que escucha los eventos
    function inicio() {

        //Botón de borrar noticia
        document.getElementById("ajax").addEventListener("click", async function(e)  {
            e.preventDefault(); //Para no enviar el form

            //Botón BORRAR. Con closest buscamos el botón dentro del div 'ajax' más cercano a la ocurrencia del evento click
            let botonBorrar = e.target.closest("button[accion=borrarN]");
		    if (botonBorrar) {
                const datos = new FormData(); //Lo mandamos siempre con POST
                datos.append("accion","borrarN"); //Acción para que PHP sepa de donde vienen la petición HTTP
                datos.append("id",botonBorrar.value);
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });                
                //Tratar la respuesta
                document.getElementById("ajax").innerHTML = await response.text(); //Lo que devuelve la Vista
		    }
        });
        //Fin botón borrar noticia ---------------------------------


        //Botón cargar formulario nueva noticia --------------------
        document.getElementById("modalNuevaNoticia").addEventListener("click", async function(e) {
            e.preventDefault();

            //Form INSERTAR
            let enviarFormInsertar = e.target.closest("button[accion=nuevaNoticia]");

            if (enviarFormInsertar) {                
                //Cerrar modal
                var myModalEl = document.getElementById('modalNuevaNoticia');
                var modal = bootstrap.Modal.getInstance(myModalEl);
                modal.hide();

                const datos = new FormData(document.getElementById("formNuevaNoticia")); //Lo mandamos siempre con POST
                datos.append("accion","crearNoticia"); 

                const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                //Tratar la respuesta
                document.getElementById("ajax").innerHTML = await response.text(); //Lo que devuelve la Vista 
            }

        });
        //Fin botón cargar formulario nueva noticia ----------------
        
    }

</script>





</body>
</html>