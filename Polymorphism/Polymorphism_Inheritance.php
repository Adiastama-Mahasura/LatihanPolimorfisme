<?php

//Kita buat class parent
class pegawai{
    //Property bawaan dari parent class
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //Method construct
    public function __construct($nama_pegawai,$gaji_pegawai){
        $this->nama_pegawai = $nama_pegawai;
        $this->gaji_pegawai = $gaji_pegawai;
    }

    //Fungsi getter untuk ambil data nama
    public function getNama(){
        return $this->nama_pegawai;
    }

    //Kerangka method bawaan parent class 
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }
}

//Polymorphism dengan inhritance 
//Menggunakan overriding (menulis kembali karakterristik method hitungGaji)
class Freelancer extends pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai, $projectRate, $jumlahProject){

        //Gaji di set 0, Karena freelancer akan dihitung gajinya berdasar jumlah project
        parent:: __construct($nama_pegawai, 0);
        $this->projectRate = $projectRate;
        $this->jumlahProject = $jumlahProject;
    }

    //proses overriding -> hitung ulang gaji
    public function hitungGaji()
    {
        return $this->projectRate * $this->jumlahProject; 
    }
}

//child class kedua
class karyawanTetap extends pegawai{
    private $tunjangan;

    public function __construct($nama_pegawai, $gaji_pegawai, $tunjangan)
    {
        parent:: __construct($nama_pegawai, $gaji_pegawai);
        $this->tunjangan = $tunjangan;
    }

    //polymorphism hitungGaji
    public function hitungGaji()
    {
        //ambil gaji dari parent lalu ditambah tunjangan
        return parent::hitungGaji() + $this->tunjangan;
    }
}

//method untuk menampilkan hasil polimorfisme
function cetakGaji(pegawai $pegawai){//menerima objek pegawai dan turunannya
    echo "Gaji " .$pegawai->getNama(). " : Rp. ".number_format($pegawai->hitungGaji(), 0, ',','.')."<br><hr>";
}

//penggunaan class dan fungsi

echo "Pegawai Biasa mengguanakan property dan method bawaan parent class <br>";

$pegawaiBiasa = new pegawai("Rizki Alaydrus", 3000000);
cetakGaji($pegawaiBiasa);

echo "Freelancer menggunakan polimorfisme hitung gaji berdasarkan project rate dan jumlah project <br>";

$pegawaiFreelancer = new Freelancer("Tirta", 200000, 10);
cetakGaji($pegawaiFreelancer);

echo "karwayan tetap menggunakan polimorfisme hitung gaji berdasarkan gaji ditambah tunjangan <br>";

$pegawaiTetap = new karyawanTetap("Alyse Jouvasta",42000000,2000000);
cetakGaji($pegawaiTetap);
?>