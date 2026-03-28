<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Lista de Productos</h5>

    <a href="<?= base_url('productos/registrar') ?>" class="btn btn-sm btn-primary">Agregar</a>

    <table class="table mt-3">
      <thead>
        <tr>
          <th>#</th>
          <th>Tipo</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($productos as $producto): ?>
          <tr>
            <td><?= $producto['id'] ?></td>
            <td><?= $producto['tipo'] ?></td>
            <td><?= $producto['descripcion'] ?></td>
            <td>S/ <?= $producto['precio'] ?></td>
            <td><?= $producto['stock'] ?></td>
            <td>
              <a href="<?= base_url('productos/editar/' . $producto['id']) ?>" class="btn btn-sm btn-warning me-1">Editar</a>
              <a href="<?= base_url('productos/eliminar/' . $producto['id']) ?>" class="btn btn-sm btn-danger"
                onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?= $footer ?>