<?php
session_start();
include 'header.php';
include 'encabezado_nav.php';
include '../PHP/conexion.php';
include '../PHP/procesar_resena.php'; // contiene la lógica de procesamiento
?>

<div class="container">
    <h2>Agregar Reseña</h2>

    <?php if (!empty($mensaje)): ?>
        <div class="alerta-mensaje"><?= htmlspecialchars($mensaje) ?></div>

        <?php if (str_starts_with($mensaje, '✅')): ?>
            <script>
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 3000); // redirige en 3 segundos
            </script>
        <?php endif; ?>
    <?php endif; ?>

    <form class="review-form" method="POST" action="">
        <select name="juego_id" required>
            <option value="">Selecciona un juego</option>
            <?php if ($juegos_result && $juegos_result->num_rows > 0): ?>
                <?php while ($juego = $juegos_result->fetch_assoc()): ?>
                    <option value="<?= $juego['id'] ?>"><?= htmlspecialchars($juego['nombre']) ?></option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>

        <textarea name="comentario" placeholder="Tu reseña" required></textarea>

        <div class="rating">
            <label>Calificación:</label>
            <div>
                <input type="radio" id="rating5" name="calificacion" value="5" required><label for="rating5"></label>
                <input type="radio" id="rating4" name="calificacion" value="4"><label for="rating4"></label>
                <input type="radio" id="rating3" name="calificacion" value="3"><label for="rating3"></label>
                <input type="radio" id="rating2" name="calificacion" value="2"><label for="rating2"></label>
                <input type="radio" id="rating1" name="calificacion" value="1"><label for="rating1"></label>
            </div>
        </div>

        <button type="submit">Enviar Reseña</button>
    </form>
</div>

<?php include 'footer.php'; ?>
