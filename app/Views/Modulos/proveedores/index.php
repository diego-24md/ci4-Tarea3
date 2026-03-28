<?= $header ?>

<div class="row">
  <div class="col-md-12">
    <h5>Administrador de Proveedores</h5>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-proveedores">
      Nuevo Proveedor
    </button>

    <table class="table table-sm mt-3">
      <thead>
        <tr>
          <th>#</th>
          <th>Razón Social</th>
          <th>Dirección</th>
          <th>RUC</th>
          <th>Teléfono</th>
          <th>Representante</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="content-proveedores">

      </tbody>
    </table>

  </div>
</div>


<!-- Zona modal -->
<div class="modal fade" id="modal-proveedores" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalProveedoresLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalProveedoresLabel">Complete el formulario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario-proveedores" autocomplete="off">

          <div class="form-group">
            <label for="razon_social">Razón Social:</label>
            <input type="text" class="rounded-0 form-control" id="razon_social" required>
          </div>

          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" class="rounded-0 form-control" id="direccion" required>
          </div>

          <div class="form-group">
            <label for="ruc">RUC:</label>
            <input type="text" class="rounded-0 form-control" id="ruc" minlength="11" maxlength="11" required>
          </div>

          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="rounded-0 form-control" id="telefono" required>
          </div>

          <div class="form-group">
            <label for="representante">Representante:</label>
            <input type="text" class="rounded-0 form-control" id="representante" required>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn rounded-0 btn-sm btn-outline-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="formulario-proveedores" class="btn rounded-0 btn-sm btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Zona modal -->


<script>
  document.addEventListener("DOMContentLoaded", function(){

    // Referencias
    const tabla = document.querySelector("#content-proveedores")
    const formulario = document.querySelector("#formulario-proveedores")

    // Notificación
    function notificar(mensaje = ''){
      Swal.fire({
        text: mensaje,
        icon: 'info',
        position: 'top-end',
        timer: 2500,
        timerProgressBar: true,
        showConfirmButton: false,
        toast: true,
        background: '#ffeaa7'
      })
    }

    // Listar proveedores
    async function obtenerProveedores(){
      try{
        const response = await fetch(`<?= base_url('proveedores/listar') ?>`)
        const data = await response.json()

        if (response.status != 200) { return; }
        if (!data) { return; }

        tabla.innerHTML = ``

        data.forEach(element => {
          tabla.innerHTML += `
          <tr>
            <td>${element.id}</td>
            <td>${element.razon_social}</td>
            <td>${element.direccion}</td>
            <td>${element.ruc}</td>
            <td>${element.telefono}</td>
            <td>${element.representante}</td>
            <td>
              <a href='#' class='btn btn-sm btn-warning'>Editar</a>
              <a href='#' class='btn btn-sm btn-danger'>Eliminar</a>
            </td>
          </tr>
          `
        });

      }catch(e){
        console.error("Error al obtener proveedores:", e)
      }
    }

    // Registrar proveedor
    async function registrarProveedor(){
      try{
        const proveedor = {
          razon_social: document.querySelector("#razon_social").value,
          direccion: document.querySelector("#direccion").value,
          ruc: document.querySelector("#ruc").value,
          telefono: document.querySelector("#telefono").value,
          representante: document.querySelector("#representante").value
        }

        const response = await fetch(`<?= base_url('proveedores/registrar') ?>`, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(proveedor)
        })

        const data = await response.json()
        notificar(data.message)

        if (!data.success) { return; }

        // Cerrar modal
        $('#modal-proveedores').modal('hide')

        // Resetear formulario
        formulario.reset()

        // Recargar tabla
        obtenerProveedores()

      }catch(e){
        console.error("No se logró registrar:", e)
      }
    }

    // Evento submit
    formulario.addEventListener("submit", function(event){
      event.preventDefault()

      if (!confirm("¿Registramos este proveedor?")) { return; }
      registrarProveedor()
    })

    // Carga inicial
    obtenerProveedores()

  })
</script>

<?= $footer ?>