<?php
    require_once 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok 9 SPK C - Metode WP</title>
</head>

<body>
    <?php
        //Menghitung data bobot
        $query = $conn->query("SELECT SUM(nilai) AS ttl FROM bobot");
        $dt = $query->fetch_assoc();
        $ttl = $dt['ttl'];
        $query = $conn->query("SELECT nilai FROM bobot");
        $nb = 0;
        foreach ($query as $row) {
            $nb += 1;
            // Jika kriteria adalah benefit
            if ($nb == 1 or $nb == 4 or $nb == 5) {
                $bobot[$nb] = ($row['nilai'] / $ttl) * 1;
            }
            // Jika kriteria adalah cost
            else if ($nb == 2 or $nb == 3) {
                $bobot[$nb] = ($row['nilai'] / $ttl) * -1;
            }
        }
        //Menghitung Vektor S
        $i = 0;
        $ttl_v = 0;
        $s = [];
        $query = $conn->query('SELECT kd_alt FROM alternatif');
        foreach ($query as $row) {
            $kd_alt = $row['kd_alt'];
            $sql = $conn->query("SELECT nilai FROM data WHERE kd_alt=$kd_alt");
            $nb = 0;
            $temp_s = 1;
            foreach ($sql as $data) {
                $nb++;
                $temp_s *= pow($data['nilai'], $bobot[$nb]);
            }
            $s[] = $temp_s;
            $ttl_v += $s[$i];
            $i++;
        }

        //Menghitung Vektor V
        for ($a = 1; $a <= $i; $a++) {
            $v[$a] = $s[$a - 1] / $ttl_v;
        }

        //Proses Perankingan
        for ($a = 1; $a <= $i; $a++) {
            $rank[$a] = 1;
            for ($b = 1; $b <= $i; $b++) {
                if ($v[$a] < $v[$b]) {
                    $rank[$a]++;
                }
            }
        }
    ?>

    <h3>Hasil Perankingan</h3>

    <table border="1">
        <thead>
            <tr>
                <th>Alternatif</th>
                <th>Nilai</th>
                <th>Ranking</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query = $conn->query("SELECT nm_alt FROM alternatif") or die($conn->error);
                $z = 0;
                foreach ($query as $row) {
                    $z++;
                ?>
                    <tr>
                        <td><?php echo $row['nm_alt'] ?></td>
                        <td><?php echo round($v[$z], 3) ?></td>
                        <td><?php echo $rank[$z] ?></td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>

    <hr>
    <hr>
    <a href="index.php"><button>Kembali</button></a>

</body>
</html>