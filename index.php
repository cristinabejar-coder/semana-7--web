<?php
// index.php - Página principal con el menú de ejercicios.
$titulo = 'Laboratorio práctico: estructuras de control en PHP';

// Lista de ejercicios: [archivo, título, descripción]
$ejercicios = [
  ['ejercicio1.php',          'Ejercicio 1', 'Restaurante: descuento, impuesto e importe a pagar (if / else)'],
  ['ejercicio2.php',          'Ejercicio 2', 'Tipo de clima según la temperatura (if / elseif)'],
  ['ejercicio3.php',          'Ejercicio 3', 'Estación del año según día y mes (if anidados)'],
  ['ejercicio4.php',          'Ejercicio 4', 'Precio según calidad y producto (matriz)'],
  ['ejercicio5_while.php',    'Ejercicio 5a', 'Positivos y negativos en un rango con While'],
  ['ejercicio5_dowhile.php',  'Ejercicio 5b', 'Positivos y negativos en un rango con Do While'],
  ['ejercicio5_for.php',      'Ejercicio 5c', 'Positivos y negativos en un rango con For'],
];

include 'includes/header.php';
?>

<div class="text-center mb-4">
  <h1 class="h3">Laboratorio práctico</h1>
  <p class="text-muted mb-0">Estructuras de control en PHP con Bootstrap</p>
</div>

<div class="card shadow-sm mb-4">
  <div class="card-body small">
    <div><strong>Unidad didáctica:</strong> Programación Web</div>
    <div><strong>Docente:</strong> Lic. Rosell Alejandro Valderrama Chumbes</div>
    <div><strong>Alumna:</strong> Cristina Bejar Armestar</div>
    <div><strong>Ciclo:</strong> IV</div>
  </div>
</div>

<div class="list-group shadow-sm">
  <?php foreach ($ejercicios as $e): ?>
    <a href="<?= $e[0] ?>" class="list-group-item list-group-item-action">
      <div class="fw-bold"><?= $e[1] ?></div>
      <div class="small text-muted"><?= $e[2] ?></div>
    </a>
  <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
