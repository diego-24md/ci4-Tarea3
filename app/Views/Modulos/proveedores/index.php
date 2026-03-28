<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Proveedores</h5>

    <a href="<?= base_url('proveedores/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>
    
    <table class="table mt-3">
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
      <tbody>
        <?php foreach ($proveedores as $proveedor): ?>
          <tr>
            <td><?= $proveedor['id'] ?></td>
            <td><?= $proveedor['razon_social'] ?></td>
            <td><?= $proveedor['direccion'] ?></td>
            <td><?= $proveedor['ruc'] ?></td>
            <td><?= $proveedor['telefono'] ?></td>
            <td><?= $proveedor['representante'] ?></td>
            <td>
              <a href="<?= base_url('proveedores/editar/' . $proveedor['id']) ?>" class="btn btn-sm btn-warning me-1">Editar</a>
              <a href="<?= base_url('proveedores/eliminar/' . $proveedor['id']) ?>" class="btn btn-sm btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este proveedor?')">Eliminar</a>
            </td>
          </tr>     
        <?php endforeach; ?>
      </tbody>
    </table>
      
  </div>
</div>
<?= $footer ?>