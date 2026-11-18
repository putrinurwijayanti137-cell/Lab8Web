<?php
include_once 'koneksi.php';

$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Query Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <h1>Data Barang</h1>

    <a href="tambah.php">Tambah Barang</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php while ($row = mysqli_fetch_array($result)): ?>
            <?php
                $gambar = $row['gambar'];

                if (!empty($gambar) && strpos($gambar, 'gambar/') !== 0) {
                    $gambar = 'gambar/' . $gambar;
                }
            ?>
            <tr>
                <td>
                    <?php if (!empty($gambar)): ?>
                        <img src="<?= htmlspecialchars($gambar); ?>"
                             alt="<?= htmlspecialchars($row['nama']); ?>"
                             width="100">
                    <?php else: ?>
                        Tidak ada gambar
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['kategori']); ?></td>
                <td><?= number_format($row['harga_jual'], 0, ',', '.'); ?></td>
                <td><?= number_format($row['harga_beli'], 0, ',', '.'); ?></td>
                <td><?= htmlspecialchars($row['stok']); ?></td>

                <td>
                    <a href="ubah.php?id=<?= $row['id_barang']; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row['id_barang']; ?>"
                       onclick="return confirm('Yakin ingin menghapus data?')">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
