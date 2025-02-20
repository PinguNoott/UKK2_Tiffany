<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
</head>
<body>
    <h2>Hitung Diskon</h2>
    <form method="POST" action="">
        <label>Harga:</label>
        <input type="number" name="harga" required><br>

        <label>Diskon (%):</label>
        <input type="number" name="diskon" min="0" max="100" required><br>

        <button type="submit">Hitung</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($total)): ?>
        <h3>Hasil Perhitungan:</h3>
        <p>Harga Awal: Rp <?= number_format($harga, 2, ',', '.') ?></p>
        <p>Diskon: <?= $diskon ?>%</p>
        <p>Total Setelah Diskon: Rp <?= number_format($total, 2, ',', '.') ?></p>
    <?php endif; ?>
</body>
</html>
