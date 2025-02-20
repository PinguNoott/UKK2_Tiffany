<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <style>
        /* Warna yang lebih soft dan profesional */
        :root {
            --background-color: #F8F3E7; /* Beige lembut */
            --box-color: #FFF9E5; /* Kuning pastel soft */
            --text-color: #5C5C5C; /* Abu-abu gelap */
            --border-color: #E0C097; /* Coklat muda */
            --button-color: #E6C17A; /* Kuning emas soft */
            --button-hover: #CFAF68; /* Warna lebih gelap saat hover */
            --error-color: #D9534F; /* Merah soft */
        }

        /* Gaya dasar */
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            text-align: center;
            padding: 50px;
            color: var(--text-color);
        }

        h2 {
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* Form container */
        .form-container {
            background: var(--box-color);
            width: 40%;
            margin: auto;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            text-align: left;
        }

        label {
            font-size: 15px;
            font-weight: 500;
            color: var(--text-color);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 14px;
            background: white;
            color: var(--text-color);
        }

        button {
            width: 100%;
            padding: 12px;
            background: var(--button-color);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: var(--button-hover);
        }

        .error {
            color: var(--error-color);
            font-weight: bold;
            margin-bottom: 15px;
        }

        /* Hasil perhitungan */
        .result {
            background: var(--box-color);
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border-color);
            text-align: left;
        }

        .result h3 {
            font-size: 20px;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .result p {
            font-size: 16px;
            margin: 5px 0;
        }

        .result strong {
            font-size: 18px;
            color: var(--text-color);
        }

    </style>
</head>
<body>

    <h2>Aplikasi Perhitungan Diskon</h2>

    <?php
    $harga = $diskon = $nilai_diskon = $total_harga = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $harga = isset($_POST["harga"]) ? floatval($_POST["harga"]) : 0;
        $diskon = isset($_POST["diskon"]) ? floatval($_POST["diskon"]) : 0;

        // Validasi input
        if ($harga <= 0) {
            $error = "Harga barang harus lebih dari 0!";
        } elseif ($diskon < 0 || $diskon > 100) {
            $error = "Diskon harus antara 0% - 100%!";
        } else {
            // Hitung diskon dan total harga
            $nilai_diskon = $harga * ($diskon / 100);
            $total_harga = $harga - $nilai_diskon;
        }
    }
    ?>

    <!-- Menampilkan error jika ada -->
    <?php if ($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <!-- Form Input -->
    <div class="form-container">
        <form action="" method="post">
            <label for="harga">Harga Barang:</label>
            <input type="number" name="harga" id="harga" value="<?= htmlspecialchars($harga) ?>" required>

            <label for="diskon">Diskon (%):</label>
            <input type="number" name="diskon" id="diskon" value="<?= htmlspecialchars($diskon) ?>" required>

            <button type="submit">Hitung Diskon</button>
        </form>
    </div>

    <!-- Menampilkan hasil perhitungan jika tersedia -->
    <?php if ($total_harga !== ""): ?>
        <div class="result">
            <h3>Hasil Perhitungan:</h3>
            <p>Harga Awal: <strong>Rp <?= number_format($harga, 2, ',', '.') ?></strong></p>
            <p>Diskon: <strong><?= $diskon ?>% (Rp <?= number_format($nilai_diskon, 2, ',', '.') ?>)</strong></p>
            <p><strong>Total Harga Setelah Diskon: Rp <?= number_format($total_harga, 2, ',', '.') ?></strong></p>
        </div>
    <?php endif; ?>

</body>
</html>
