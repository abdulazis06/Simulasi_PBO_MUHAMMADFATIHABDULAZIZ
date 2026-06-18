<?php
abstract class Pendaftaran {
    // Properti Terenkapsulasi (protected)
    protected $id_pendaftaran;
    protected $nama_calon;
    protected $asal_sekolah;
    protected $nilai_ujian;
    protected $biaya_pendaftaran_dasar;

    // Constructor untuk inisialisasi awal
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biaya_pendaftaran_dasar = $biaya_pendaftaran_dasar;
    }

    // Metode Abstrak (Tanpa Isi/Body)
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();

    // =========================================
    // Getter untuk memanggil data di Tahap 6 nanti
    // =========================================
    public function getNamaCalon() { return $this->nama_calon; }
    public function getAsalSekolah() { return $this->asal_sekolah; }
    public function getNilaiUjian() { return $this->nilai_ujian; }
}
?>
