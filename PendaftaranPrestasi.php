<?php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    private $jenisPrestasi;
    private $tingkatPrestasi;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    public static function getDaftarPrestasi($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Prestasi'";
        return $db->query($sql);
    }

    public function hitungTotalBiaya() {
        return $this->biaya_pendaftaran_dasar - 50000; 
    }

    public function tampilkanInfoJalur() {
        return "Prestasi: {$this->jenisPrestasi} | Tingkat: {$this->tingkatPrestasi}";
    }
}
?>
