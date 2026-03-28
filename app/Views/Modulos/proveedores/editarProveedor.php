<?= $header ?>
<div class="row">
  <div class="col-md-12">
    <h5>Editar Proveedor</h5>

    <form action="<?= base_url('/proveedores/actualizar/' . $proveedor['id']) ?>" method="post" autocomplete="off">

      <div class="form-group mb-3">
        <label for="razon_social">Razón Social</label>
        <input type="text" class="form-control" id="razon_social" name="razon_social" value="<?= $proveedor['razon_social'] ?>" required>
      </div>

      <div class="form-group mb-3">
        <label for="direccion">Dirección</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $proveedor['direccion'] ?>" required>
      </div>

      <div class="form-group mb-3">
        <label for="ruc">RUC</label>
        <input type="text" class="form-control" id="ruc" name="ruc" value="<?= $proveedor['ruc'] ?>" minlength="11" maxlength="11" required>
      </div>

      <div class="form-group mb-3">
        <label for="telefono">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $proveedor['telefono'] ?>" minlength="9" maxlength="9" required>
      </div>

      <div class="form-group mb-3">
        <label for="representante">Representante</label>
        <input type="text" class="form-control" id="representante" name="representante" value="<?= $proveedor['representante'] ?>" required>
      </div>

      <div class="mt-3">
        <button type="submit" class="btn btn-primary me-2">Actualizar</button>
        <a href="<?= base_url('/proveedores') ?>" class="btn btn-secondary">Cancelar</a>
      </div>

    </form>
  </div>
</div>
<?= $footer ?>