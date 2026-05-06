<?php
require_once 'config/database.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM buku WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();

if (!$row) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("
        UPDATE buku SET
        judul=?,
        pengarang=?,
        penerbit=?,
        tahun_terbit=?,
        stok=?
        WHERE id=?
    ");

    $stmt->execute([
        $_POST['judul'],
        $_POST['pengarang'],
        $_POST['penerbit'],
        $_POST['tahun'],
        $_POST['stok'],
        $id

    ]);

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">Edit Buku</h2>

    <form method="POST">

        <input type="text"
               name="judul"
               value="<?= $row['judul']; ?>"
               class="form-control mb-3"
               required>

        <input type="text"
               name="pengarang"
               value="<?= $row['pengarang']; ?>"
               class="form-control mb-3"
               required>

        <input type="text"
               name="penerbit"
               value="<?= $row['penerbit']; ?>"
               class="form-control mb-3"
               required>

        <input type="number"
               name="tahun"
               value="<?= $row['tahun_terbit']; ?>"
               class="form-control mb-3"
               required>

        <input type="number"
               name="stok"
               value="<?= $row['stok']; ?>"
               class="form-control mb-3"
               required>

        <button type="submit" class="btn btn-primary">
            Update
        </button>

        <a href="index.php" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>