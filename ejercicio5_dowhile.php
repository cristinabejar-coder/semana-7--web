<?php
// Ejercicio 5 (Problema 65) - Do While
// Dado un rango entero (número inicial y número final), obtener la cantidad
// de números positivos y negativos que existen en el rango (el 0 no cuenta).
$titulo = 'Ejercicio 5 - Do While';

$ni = $nf = '';
$cp = $cn = '';      // cantidad de positivos y de negativos
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ni = trim($_POST['ni'] ?? '');
    $nf = trim($_POST['nf'] ?? '');

    $a = filter_var($ni, FILTER_VALIDATE_INT);
    $b = filter_var($nf, FILTER_VALIDATE_INT);

    if ($a === false || $b === false) {
        $error = 'Ingrese dos números enteros.';
    } elseif ($a > $b) {
        $error = 'El número inicial no puede ser mayor que el número final.';
    } elseif ($b - $a > 1000000) {
        $error = 'El rango es demasiado grande (máximo 1 000 000 de números).';
    } else {
        $cp = 0;
        $cn = 0;

        // DO WHILE: ejecuta el bloque una vez y evalúa la condición AL FINAL
        $i = $a;
        do {
            if ($i > 0) {
                $cp++;
            } elseif ($i < 0) {
                $cn++;
            }
            $i++;
        } while ($i <= $b);
    }
}

include 'includes/header.php';
?>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">Problema 65 · Positivos y negativos (Do While)</div>
  <div class="card-body">
    <p class="text-muted small">Cuenta cuántos números positivos y negativos hay entre el número inicial y el final.</p>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="row">
        <div class="col-6 mb-3">
          <label for="ni" class="form-label">Núm. inicial</label>
          <input type="number" class="form-control" id="ni" name="ni" value="<?= htmlspecialchars($ni) ?>" required>
        </div>
        <div class="col-6 mb-3">
          <label for="nf" class="form-label">Núm. final</label>
          <input type="number" class="form-control" id="nf" name="nf" value="<?= htmlspecialchars($nf) ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-3">
          <label class="form-label">Cant. positivos</label>
          <input type="text" class="form-control fw-bold" readonly value="<?= $cp ?>">
        </div>
        <div class="col-6 mb-3">
          <label class="form-label">Cant. negativos</label>
          <input type="text" class="form-control fw-bold" readonly value="<?= $cn ?>">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
