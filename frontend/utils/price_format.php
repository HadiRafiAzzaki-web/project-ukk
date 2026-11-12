<?php
function Rupiah($number) {
    $rupiah = "Rp " . number_format($number, 0, ',', '.');
    return $rupiah;
}