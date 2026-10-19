<?php
// Ejercicio 3 (Problema 32): estación del año según día y mes.
//   Verano:    del 21 de diciembre al 20 de marzo
//   Otoño:     del 21 de marzo al 21 de junio
//   Invierno:  del 22 de junio al 22 de setiembre
//   Primavera: del 23 de setiembre al 20 de diciembre
$titulo = 'Ejercicio 3 - Estación del año';

$dia = $mes = '';
$estacion = '';
$error = '';

// Días máximos de cada mes (febrero se acepta hasta 29)
$diasPorMes = [1 => 31, 2 => 29, 3 => 31, 4 => 30, 5 => 31, 6 => 30,
               7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dia = trim($_POST['dia'] ?? '');
    $mes = trim($_POST['mes'] ?? '');

    $d = filter_var($dia, FILTER_VALIDATE_INT);
    $m = filter_var($mes, FILTER_VALIDATE_INT);

    if ($d === false || $m === false || $m < 1 || $m > 12) {
        $error = 'Ingrese un día y un mes válidos (el mes debe estar entre 1 y 12).';
    } elseif ($d < 1 || $d > $diasPorMes[$m]) {
        $error = "El mes $m tiene entre 1 y {$diasPorMes[$m]} días.";
    } else {
        if (($m == 12 && $d >= 21) || $m == 1 || $m == 2 || ($m == 3 && $d <= 20)) {
            $estacion = 'VERANO';
        } elseif (($m == 3 && $d >= 21) || $m == 4 || $m == 5 || ($m == 6 && $d <= 21)) {
            $estacion = 'OTOÑO';
        } elseif (($m == 6 && $d >= 22) || $m == 7 || $m == 8 || ($m == 9 && $d <= 22)) {
            $estacion = 'INVIERNO';
        } else {
            $estacion = 'PRIMAVERA';
        }
    }
}

include 'includes/header.php';
?>

<div class="card shadow-sm">
  <div class="card-header bg-primary text-white">Problema 32 · Estación del año</div>
  <div class="card-body">
    <table class="table table-bordered table-sm mb-3">
      <thead class="table-dark"><tr><th>Estación</th><th>Tiempo</th></tr></thead>
      <tbody>
        <tr><td>Verano</td><td>Del 21 de diciembre al 20 de marzo</td></tr>
        <tr><td>Otoño</td><td>Del 21 de marzo al 21 de junio</td></tr>
        <tr><td>Invierno</td><td>Del 22 de junio al 22 de setiembre</td></tr>
        <tr><td>Primavera</td><td>Del 23 de setiembre al 20 de diciembre</td></tr>
      </tbody>
    </table>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="row">
        <div class="col-6 mb-3">
          <label for="dia" class="form-label">Día</label>
          <input type="number" min="1" max="31" class="form-control" id="dia" name="dia"
                 value="<?= htmlspecialchars($dia) ?>" required>
        </div>
        <div class="col-6 mb-3">
          <label for="mes" class="form-label">Mes (1 a 12)</label>
          <input type="number" min="1" max="12" class="form-control" id="mes" name="mes"
                 value="<?= htmlspecialchars($mes) ?>" required>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Estación</label>
        <input type="text" class="form-control fw-bold" readonly value="<?= $estacion ?>">
      </div>
      <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
