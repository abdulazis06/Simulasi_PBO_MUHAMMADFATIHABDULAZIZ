<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    private $pilihanProdi;
    private $lokasiKampus;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $pilihanProdi, $lokasiKampus) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Dibuat 'static' agar bisa dipanggil langsung tanpa membuat objek kosong terlebih dahulu
    public static function getDaftarReguler($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Reguler'";
        return $db->query($sql);
    }

    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar; 
    }

    public function tampilkanInfoJalur() {
        return "Prodi: {$this->pilihanProdi} | Lokasi: {$this->lokasiKampus}";
    }
}
?>
