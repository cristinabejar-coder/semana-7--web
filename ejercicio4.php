<?php
// Ejercicio 4 (Problema 36): precio según calidad y producto.
// Los precios se guardan en una matriz: $precios[producto][calidad]
$titulo = 'Ejercicio 4 - Precio por calidad y producto';

$precios = [
    1 => [1 => 5000, 2 => 4500, 3 => 4000],
    2 => [1 => 4500, 2 => 4000, 3 => 3500],
    3 => [1 => 4000, 2 => 3500, 3 => 3000],
];

$calidad = $producto = '';
$precio = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $calidad  = trim($_POST['calidad'] ?? '');
    $producto = trim($_POST['producto'] ?? '');

    $c = filter_var($calidad, FILTER_VALIDATE_INT);
    $p = filter_var($producto, FILTER_VALIDATE_INT);

    if (!isset($precios[$p][$c])) {
        $error = 'La calidad y el producto deben ser 1, 2 o 3.';
    } else {
        $precio = $precios[$p][$c];
    }
}

include 'includes/header.php';
?>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">Problema 36 · Precio del producto</div>
  <div class="card-body">
    <p class="text-muted small mb-2">Precios (S/) según producto y calidad:</p>
    <table class="table table-bordered table-sm text-center w-auto mx-auto mb-3">
      <thead class="table-dark">
        <tr><th>Producto \ Calidad</th><th>1</th><th>2</th><th>3</th></tr>
      </thead>
      <tbody>
        <?php foreach ($precios as $nroProducto => $fila): ?>
          <tr>
            <th class="table-secondary"><?= $nroProducto ?></th>
            <?php foreach ($fila as $valor): ?>
              <td><?= $valor ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="calidad" class="form-label">Calidad</label>
        <select class="form-select" id="calidad" name="calidad" required>
          <option value="">Seleccione...</option>
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <option value="<?= $i ?>" <?= ($calidad == $i) ? 'selected' : '' ?>><?= $i ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="producto" class="form-label">Producto</label>
        <select class="form-select" id="producto" name="producto" required>
          <option value="">Seleccione...</option>
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <option value="<?= $i ?>" <?= ($producto == $i) ? 'selected' : '' ?>><?= $i ?></option>
          <?php endfor; ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="text" class="form-control fw-bold" readonly value="<?= $precio ?>">
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
