<?php
    require_once 'koneksi.php';
    $query = $conn->query('SELECT kd_kri FROM kriteria') or die($conn->error);
    $jml_kri = $query->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok 9 SPK C - Metode WP</title>
</head>

<body>
    <h1>Kelompok 9 SPK C - Metode Weighted Product (WP)</h1>
    <h3>Data Kriteria</h3>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="2">Alternatif</th>
                <th colspan="<?= $jml_kri ?>">Kriteria</th>
            </tr>

            <tr>
                <?php
                $query = $conn->query('SELECT nm_kri FROM kriteria') or die($conn->error);
                while ($row = $query->fetch_assoc()) {
                    ?>
                    <th><?= $row['nm_kri'] ?></th>
                    <?php
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = $conn->query('SELECT nm_alt,data.kd_alt FROM data LEFT JOIN alternatif ON data.kd_alt=alternatif.kd_alt GROUP BY data.kd_alt') or die($conn->error);
            foreach ($query as $row) {
                $kd_alt = $row['kd_alt'];
                ?>
                <tr>
                    <td><?= $row['nm_alt'] ?></td>
                        <?php
                            $sql = $conn->query("SELECT nilai FROM data WHERE kd_alt=$kd_alt");
                            while ($dt = $sql->fetch_assoc()) {
                                ?>
                                <td><?= $dt['nilai'] ?></td>
                                <?php
                            }
                        ?>
                </tr> <?php

            } ?>
        </tbody>
    </table>

    <p>Kriteria Benefit: Variasi Menu, Daya Tampung, dan Fasilitas</p>
    <p>Kriteria Cost: Harga dan Jarak</p>

    <hr>
        <h3>Data Bobot</h3>
        <table border="1">
            <tbody>
                <?php
                    $query = $conn->query("SELECT nilai FROM bobot") or die($conn->error);
                ?>
                <tr>
                    <?php
                    foreach ($query as $row) {
                    ?>
                    <td style="width: 50px;">
                        <center><?php echo $row['nilai'] ?></center>
                    </td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>
    <hr>
    <hr>
    <a href="ranking.php"><button>Hasil Perankingan</button></a>

</body>
</html>