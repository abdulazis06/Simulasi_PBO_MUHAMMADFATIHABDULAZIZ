<?php
// Memanggil file koneksi dan semua class
require_once 'database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// Eksekusi query spesifik (Tahap 4) dengan memasukkan objek koneksi $conn
$dataReguler = PendaftaranReguler::getDaftarReguler($conn);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($conn);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen PMB Jalur Spesifik</title>
    <style>
        body { 
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            padding: 40px 20px; 
            background-image: url('bg.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff; 
            min-height: 100vh;
            margin: 0;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 { 
            text-align: center; 
            margin-bottom: 40px; 
            font-weight: 700; 
            text-shadow: 0 4px 15px rgba(0,0,0,0.4);
        }
        
        .jalur-header { 
            /* Gradasi tipis buat nambahin volume */
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.25), rgba(255, 255, 255, 0.05));
            color: #fff; 
            padding: 16px 20px; 
            border-radius: 24px 24px 0 0; 
            margin-top: 30px; 
            margin-bottom: 0;
            backdrop-filter: blur(24px) saturate(150%);
            -webkit-backdrop-filter: blur(24px) saturate(150%);
            
            /* Pantulan cahaya kaca di ujung atas dan kiri (Inset Shadow) */
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.6), inset 1px 0 1px rgba(255, 255, 255, 0.3), 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-bottom: none;
            
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 30px; 
            
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.02));
            backdrop-filter: blur(24px) saturate(150%);
            -webkit-backdrop-filter: blur(24px) saturate(150%);
            border-radius: 0 0 24px 24px;
            
            /* Pantulan cahaya kaca di bagian bawah tabel */
            box-shadow: inset 0 -1px 1px rgba(255, 255, 255, 0.2), inset 1px 0 1px rgba(255, 255, 255, 0.1), 0 12px 32px 0 rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-top: none;
            
            overflow: hidden;
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            opacity: 0;
        }

        h2:nth-of-type(1), table:nth-of-type(1) { animation-delay: 0.1s; }
        h2:nth-of-type(2), table:nth-of-type(2) { animation-delay: 0.2s; }
        h2:nth-of-type(3), table:nth-of-type(3) { animation-delay: 0.3s; }
        
        th, td { 
            border: none; 
            padding: 16px 20px; 
            text-align: left; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.15); 
            color: #fff;
        }
        
        th { 
            background: rgba(0, 0, 0, 0.15); 
            font-weight: 600; 
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        tr:last-child td { border-bottom: none; }
        
        tr { transition: all 0.3s ease; }
        tr:hover { 
            background: rgba(255, 255, 255, 0.15); 
            transform: scale(1.01);
        }
        
        .harga { font-weight: 700; color: #4dd0e1; text-shadow: 0 1px 3px rgba(0,0,0,0.5); } 
    </style>
</head>
<body>

    <h1>Data Pendaftaran Mahasiswa Baru</h1>

    <h2 class="jalur-header">Kategori: Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Fasilitas / Info Spesifik</th>
                <th>Total Biaya (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $dataReguler->fetch_assoc()): 
                $obj = new PendaftaranReguler($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['pilihan_prodi'], $row['lokasi_kampus']);
            ?>
            <tr>
                <td><?= htmlspecialchars($obj->getNamaCalon()) ?></td>
                <td><?= htmlspecialchars($obj->getAsalSekolah()) ?></td>
                <td><?= htmlspecialchars($obj->getNilaiUjian()) ?></td>
                <td><?= htmlspecialchars($obj->tampilkanInfoJalur()) ?></td>
                <td class="harga">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2 class="jalur-header">Kategori: Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Fasilitas / Info Spesifik</th>
                <th>Total Biaya (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $dataPrestasi->fetch_assoc()): 
                $obj = new PendaftaranPrestasi($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['jenis_prestasi'], $row['tingkat_prestasi']);
            ?>
            <tr>
                <td><?= htmlspecialchars($obj->getNamaCalon()) ?></td>
                <td><?= htmlspecialchars($obj->getAsalSekolah()) ?></td>
                <td><?= htmlspecialchars($obj->getNilaiUjian()) ?></td>
                <td><?= htmlspecialchars($obj->tampilkanInfoJalur()) ?></td>
                <td class="harga">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h2 class="jalur-header">Kategori: Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Fasilitas / Info Spesifik</th>
                <th>Total Biaya (Polimorfisme)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $dataKedinasan->fetch_assoc()): 
                $obj = new PendaftaranKedinasan($row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], $row['sk_ikatan_dinas'], $row['instansi_sponsor']);
            ?>
            <tr>
                <td><?= htmlspecialchars($obj->getNamaCalon()) ?></td>
                <td><?= htmlspecialchars($obj->getAsalSekolah()) ?></td>
                <td><?= htmlspecialchars($obj->getNilaiUjian()) ?></td>
                <td><?= htmlspecialchars($obj->tampilkanInfoJalur()) ?></td>
                <td class="harga">Rp <?= number_format($obj->hitungTotalBiaya(), 0, ',', '.') ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>
