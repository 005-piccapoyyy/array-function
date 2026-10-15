<?php
function hitungRataRata(array $nilai): float
{
    $jumlahNilai = count($nilai);

    if ($jumlahNilai === 0) {
        return 0;
    }

    return array_sum($nilai) / $jumlahNilai;
}

function cekKelulusan(float $rataRata): string
{
    if ($rataRata >= 80) {
        return "Lulus Sangat Baik";
    } elseif ($rataRata >= 75) {
        return "Lulus";
    }
    return "Tidak Lulus";
}