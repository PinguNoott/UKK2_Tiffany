<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        :root {
            --background-color: #E3F2FD;
            --box-color: #FFFFFF;
            --text-color: #4A4A4A;
            --border-color: #90CAF9;
            --button-color: #64B5F6;
            --button-hover: #42A5F5;
            --error-color: #D32F2F;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            text-align: center;
            color: var(--text-color);
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: var(--button-color);
        }

        .form-container {
            background: var(--box-color);
            max-width: 450px;
            width: 90%;
            margin: auto;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--border-color);
            text-align: left;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        label {
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: calc(100% - 16px);
            padding: 10px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: var(--button-color);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background: var(--button-hover);
        }

        .error {
            color: var(--error-color);
            font-weight: bold;
            margin-bottom: 10px;
        }

        .result {
            background: var(--box-color);
            max-width: 450px;
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            border: 2px solid var(--border-color);
            text-align: left;
        }
    </style>
</head>
<body>
    <h2> Aplikasi Perhitungan Diskon </h2>
    <?php
    $harga = $diskon = $nilai_diskon = $total_harga = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $harga = isset($_POST["harga"]) ? floatval(str_replace('.', '', $_POST["harga"])) : 0;
        $diskon = isset($_POST["diskon"]) ? floatval($_POST["diskon"]) : 0;

        if ($harga <= 0) {
            $error = "Harga barang harus lebih dari 0!";
        } elseif ($diskon < 0 || $diskon > 100) {
            $error = "Diskon harus antara 0% - 100%!";
        } else {
            $nilai_diskon = $harga * ($diskon / 100);
            $total_harga = $harga - $nilai_diskon;
        }
    }
    ?>

    <?php if ($error): ?>
        <p class="error">❌ <?= $error ?></p>
    <?php endif; ?>

    <div class="form-container">
        <form action="" method="post">
            <label for="harga">Harga Barang:</label>
            <input type="text" name="harga" id="harga" value="<?= $harga ? number_format($harga, 0, '', '.') : '' ?>" required oninput="formatRupiah(this)">

            <label for="diskon">Diskon (%):</label>
            <input type="number" step="0.01" name="diskon" id="diskon" value="<?= htmlspecialchars($diskon) ?>" required>

            <button type="submit">🔹 Hitung Diskon 🔹</button>
        </form>
    </div>

    <?php if ($total_harga !== ""): ?>
        <div class="result">
            <h3> Hasil Perhitungan:</h3>
            <p>Harga Awal: <strong>Rp <?= number_format($harga, 0, '', '.') ?></strong></p>
            <p> Diskon: <strong><?= $diskon ?>% (Rp <?= number_format($nilai_diskon, 0, '', '.') ?>)</strong></p>
            <p><strong> Total Harga Setelah Diskon: Rp <?= number_format($total_harga, 0, '', '.') ?></strong></p>
        </div>
    <?php endif; ?>

    <input type="tel" name="harga" id="harga" required oninput="formatRupiah(this)">

<script>
    function formatRupiah(input) {
        let value = input.value.replace(/\D/g, ""); // Hapus semua karakter kecuali angka
        let formatted = new Intl.NumberFormat("id-ID").format(value); // Format angka dengan titik
        input.value = formatted; // Perbarui input dengan format yang benar
    }
</script>

</body>
</html>

