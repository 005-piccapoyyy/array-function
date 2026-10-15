<?php
// File wajib: jika tidak ada, program berhenti
require_once "config/function.php";
require_once "config/data.php";

include "templates/header.php";
include "templates/navbar.php";

$jumlahSiswa = count($nilaiSiswa);
?>

<div class="container">
    <div class="card">
        <h2>Daftar Nilai Siswa</h2>
        <p class="ringkasan">Jumlah siswa: <strong><?= $jumlahSiswa; ?></strong></p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Daftar Nilai</th>
                    <th>Jumlah Nilai</th>
                    <th>Rata-rata</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($nilaiSiswa as $siswa) : ?>
                    <?php
                    $rataRata = hitungRataRata($siswa["nilai"]);
                    $status   = cekKelulusan($rataRata);

                    if ($status === "Lulus Sangat Baik") {
                        $kelas = "sangat-baik";
                    } elseif ($status === "Lulus") {
                        $kelas = "lulus";
                    } else {
                        $kelas = "tidak-lulus";
                    }
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($siswa["nama"]); ?></td>
                        <td><?= implode(", ", $siswa["nilai"]); ?></td>
                        <td><?= count($siswa["nilai"]); ?></td>
                        <td><?= number_format($rataRata, 2); ?></td>
                        <td><span class="badge <?= $kelas; ?>"><?= $status; ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "templates/footer.php"; ?>