<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Editar Producto</h5>

    <form action="<?= base_url('/productos/actualizar/' . $producto['id']) ?>" method="post" autocomplete="off">

      <div class="form-group mb-3">
        <label for="tipo">Tipo</label>
        <input type="text" class="form-control" id="tipo" name="tipo" value="<?= $producto['tipo'] ?>" required>
      </div>

      <div class="form-group mb-3">
        <label for="descripcion">Descripción</label>
        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $producto['descripcion'] ?>" required>
      </div>

      <div class="form-group mb-3">
        <label for="precio">Precio</label>
        <input type="number" class="form-control" id="precio" name="precio" value="<?= $producto['precio'] ?>" step="0.01" required>
      </div>

      <div class="form-group mb-3">
        <label for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?= $producto['stock'] ?>" required>
      </div>

      <div class="mt-3">
        <button type="submit" class="btn btn-primary me-2">Actualizar</button>
        <a href="<?= base_url('/productos') ?>" class="btn btn-secondary">Cancelar</a>
      </div>

    </form>
  </div>
</div>
<?= $footer ?>