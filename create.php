<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = trim($_POST['judul']);
    $pengarang = trim($_POST['pengarang']);
    $penerbit = trim($_POST['penerbit']);
    $tahun = trim($_POST['tahun']);
    $stok = trim($_POST['stok']);

   if (!empty($judul) && !empty($pengarang) && !empty($penerbit) && !empty($tahun) && !empty($stok)) {
        $stmt = $pdo->prepare("
            INSERT INTO buku
            (judul, pengarang, penerbit, tahun_terbit, stok)
            VALUES (?, ?, ?, ?, ?)
        ");

    $stmt->execute([
        $judul,
        $pengarang,
        $penerbit,
        $tahun,
        $stok
    ]);

    header("Location: index.php?pesan=sukses terus");
    exit;
  } else {
    $pesan = "Semua field harus diisi!";
 }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
    <h2>Tambah Buku</h2>

    <form method="POST">

        <input type="text"
               name="judul"
               class="form-control mb-3"
               placeholder="Judul Buku"
               required>

        <input type="text"
               name="pengarang"
               class="form-control mb-3"
               placeholder="Pengarang"
               required>

        <input type="text"
               name="penerbit"
               class="form-control mb-3"
               placeholder="Penerbit"
               required>

        <input type="number"
               name="tahun"
               class="form-control mb-3"
               placeholder="Tahun Terbit"
               required>

        <input type="number"
               name="stok"
               class="form-control mb-3"
               placeholder="Stok"
               required>

        <button class="btn btn-success">
            Simpan
        </button>

        <a href="index.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>