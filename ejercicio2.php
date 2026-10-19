<?php
// Ejercicio 2 (Problema 21): tipo de clima según la temperatura.
//   Temp. < 10          -> Frío
//   Temp. entre 10 y 20 -> Nublado
//   Temp. entre 21 y 30 -> Calor
//   Temp. > 30          -> Tropical
$titulo = 'Ejercicio 2 - Clima';

$temperatura = '';
$clima = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $temperatura = trim($_POST['temperatura'] ?? '');

    if ($temperatura === '' || !is_numeric($temperatura)) {
        $error = 'Ingrese una temperatura válida (un número).';
    } else {
        $t = (float) $temperatura;

        if ($t < 10) {
            $clima = 'FRÍO';
        } elseif ($t <= 20) {
            $clima = 'NUBLADO';
        } elseif ($t <= 30) {
            $clima = 'CALOR';
        } else {
            $clima = 'TROPICAL';
        }
    }
}

include 'includes/header.php';
?>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">Problema 21 · Clima</div>
  <div class="card-body">
    <table class="table table-bordered table-sm text-center w-auto mx-auto mb-3">
      <thead class="table-dark"><tr><th>Temperatura</th><th>Tipo de clima</th></tr></thead>
      <tbody>
        <tr><td>&lt; 10</td><td>Frío</td></tr>
        <tr><td>entre 10 y 20</td><td>Nublado</td></tr>
        <tr><td>entre 21 y 30</td><td>Calor</td></tr>
        <tr><td>&gt; 30</td><td>Tropical</td></tr>
      </tbody>
    </table>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="temperatura" class="form-label">Temperatura (°C)</label>
        <input type="number" step="any" class="form-control" id="temperatura" name="temperatura"
               value="<?= htmlspecialchars($temperatura) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Clima</label>
        <input type="text" class="form-control fw-bold" readonly value="<?= $clima ?>">
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
