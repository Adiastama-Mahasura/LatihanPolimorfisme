<?php
//kita buat interface
interface Cetakable{
    //kontrak : siapapun yang meng-implementasikan ini, maka wajib punya method tampilkanCetak()
    public function tampilkanCetak() : void;
    
    //di interface hanya boleh method kosong
}

//buat kelas baru 
class LaporanSiswa implements Cetakable{
    private string $namaSiswa;
    private string $kelas;

    public function __construct(string $namaSiswa, string $kelas){
        $this->namaSiswa = $namaSiswa;
        $this->kelas = $kelas;
    } 

    //wajib panggil method yang ada di interface 
    public function tampilkanCetak(): void
    {
       echo "<div style='border: 2px solid green;
       padding: 10px;
       margin-bottom: 10px;'>";
       echo "<h3>Cetak Dokumen : Rapor Siswa </h3>";
       echo "Nama: {$this->namaSiswa} | Kelas: {$this->kelas}";
       echo "</div>";
    }
}

//kelas yang kedua 
class LaporanGuru implements Cetakable{
private string $namaGuru;
private string $mataPelajaran;

public function __construct(string $namaGuru, string $mataPelajaran){
       $this->namaGuru = $namaGuru;
       $this->mataPelajaran = $mataPelajaran;
    }

//wajib gunakan method yang ada di interface 
public function tampilkanCetak():void{
       echo "<div style='border: 2px solid blue;
       padding: 10px;
       margin-bottom: 10px;
       '>";
       echo "<h3>Cetak Dokumen : Jadwal/data Guru</h3>";
       echo "Nama Guru: {$this->namaGuru} | Mata Pelajaran: {$this->mataPelajaran}";
       echo "</div>";
    }
}

//buat kelas untuk mencetak objek dari implementasi interface
class CetakManager{
    //menerima data apapun selama dia meng-implementasikan interface Cetakable (ini adalah penerapan polimorismenya)
    public static function prosesCetak(Cetakable $dokumen):void{
        //keyword static artinya: class dipanggil langsung tanpa harus dibuat objek
        $dokumen->tampilkanCetak();
    } 
}

//inisiasi objek 
echo "<h2>Daftar Cetak Dokumen Sekolah</h2>";

//membuat objek siswa
$siswa1 = new LaporanSiswa("Ahmad Naruto","XI RPL 4");
$siswa2 = new LaporanSiswa("Hinata Lestari","XI RPL 5");
$siswa3 = new LaporanSiswa("Adiastama Danadyaksa Mahasura","XI RPL 3");
$siswa4 = new LaporanSiswa("Arief Luqman Maulana","XI RPL 3");

//membuat Objek guru 
$guru1 = new LaporanGuru("Pak Bagogo, S.Pd","Matematika");
$guru2 = new LaporanGuru("Pak Galih Haris Fauzi, S.Kom","Produktif RPL");
$guru3 = new LaporanGuru("Bu Rochmanah, S.Kom","Produktif RPL");

//mencetak menggunkan kelas CetakManager hasil polimorfisme
CetakManager::prosesCetak($siswa1);
CetakManager::prosesCetak($siswa2);
CetakManager::prosesCetak($siswa3);
CetakManager::prosesCetak($siswa4);

CetakManager::prosesCetak($guru1);
CetakManager::prosesCetak($guru2);
CetakManager::prosesCetak($guru3);
?>