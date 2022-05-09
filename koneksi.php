<?php
$s = 'localhost';
$u = 'root';
$p = '';
$d = 'klp9_wp';
$conn = new mysqli($s, $u, $p, $d) or die('Ada masalah koneksi' . $conn->error);