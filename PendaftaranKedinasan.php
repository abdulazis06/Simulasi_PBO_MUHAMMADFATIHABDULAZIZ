<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan [cite: 60]
    private $skIkatanDinas;
    private $instansiSponsor;

    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Metode Query Spesifik Tahap 4 [cite: 61]
    public static function getDaftarKedinasan($db) {
        $sql = "SELECT * FROM tabel_pendaftaran WHERE jalur_pendaftaran = 'Kedinasan'";
        return $db->query($sql);
    }

    public function hitungTotalBiaya() {
        // Dikenakan surcharge administrasi khusus sebesar 25% (dikali 1.25) [cite: 66]
        return $this->biaya_pendaftaran_dasar * 1.25; 
    }

    public function tampilkanInfoJalur() {
        return "SK: {$this->skIkatanDinas} | Instansi: {$this->instansiSponsor}";
    }
}
?>
