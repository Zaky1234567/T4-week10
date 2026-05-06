<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Data Buku</h2>

    <a href="create.php" class="btn btn-primary mb-3">
        Tambah Buku
    </a>

    <table class="table table-bordered table-striped">

        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = $stmt->fetch()): ?>

        <tr>

            <td><?= $row['id']; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['pengarang']; ?></td>
            <td><?= $row['penerbit']; ?></td>
            <td><?= $row['tahun_terbit']; ?></td>
            <td><?= $row['stok']; ?></td>

            <td>

                <a href="edit.php?id=<?= $row['id']; ?>"
                   class="btn btn-warning btn-sm">
                   Edit
                </a>

                <a href="delete.php?id=<?= $row['id']; ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Yakin mau hapus data?')">
                   Hapus
                </a>

            </td>

        </tr>
        <?php endwhile; ?>

    </table>

</div>

</body>
</html>