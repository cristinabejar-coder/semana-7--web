<?php
// Ejercicio 1 (Problema 19): restaurante.
// Consumo hasta S/ 100.00 -> descuento 10 %. Consumo mayor -> descuento 20 %.
// En ambos casos se aplica un impuesto de 19 % sobre el consumo ya descontado.
$titulo = 'Ejercicio 1 - Restaurante';

$consumo = '';
$descuento = $impuesto = $pagar = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $consumo = trim($_POST['consumo'] ?? '');

    if ($consumo === '' || !is_numeric($consumo) || $consumo < 0) {
        $error = 'Ingrese un consumo válido (un número mayor o igual a 0).';
    } else {
        $c = (float) $consumo;

        // Estructura condicional: elegir el porcentaje de descuento
        if ($c <= 100) {
            $descuento = $c * 0.10;
        } else {
            $descuento = $c * 0.20;
        }

        $impuesto = ($c - $descuento) * 0.19;   // 19 % sobre el consumo con descuento
        $pagar    = $c - $descuento + $impuesto;
    }
}

include 'includes/header.php';
?>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">Problema 19 · Restaurante</div>
  <div class="card-body">
    <p class="text-muted small">Descuento de 10 % hasta S/ 100.00 y de 20 % si el consumo es mayor. Impuesto de 19 %.</p>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="consumo" class="form-label">Consumo (S/)</label>
        <input type="number" step="0.01" min="0" class="form-control" id="consumo" name="consumo"
               value="<?= htmlspecialchars($consumo) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Monto descuento</label>
        <input type="text" class="form-control" readonly
               value="<?= $descuento !== '' ? number_format($descuento, 2) : '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Impuesto IGV (19 %)</label>
        <input type="text" class="form-control" readonly
               value="<?= $impuesto !== '' ? number_format($impuesto, 2) : '' ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Importe a pagar</label>
        <input type="text" class="form-control fw-bold" readonly
               value="<?= $pagar !== '' ? number_format($pagar, 2) : '' ?>">
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
