<?php
//kita buat kelas abstrak
abstract class NotifikasiWeb{
    protected string $penerima;
    protected string $pesan;

    public function __construct(string $penerima,string $pesan)
    {
        $this->penerima = $penerima;
        $this->pesan = $pesan;
    }

    //buat method biasa yang bisa diwariskan dan digunakan langsung oleh kelas turunan
    public function getInfoPengiriman(): string{
        return "Mengirim Ke: {$this->penerima}";
    }

    //buat abstract method yang wajib di override oleh kelas turunan
    abstract public function kirimNotifikasi(): void;
}

//kelas turunan 1: notifikasi email
class NotifEmail extends NotifikasiWeb{
    private string $subjek;

    public function __construct (string $penerima, string $pesan, string $subjek){
        parent:: __construct($penerima, $pesan);
        $this->subjek = $subjek;
    }  

    //wajib override abstract method dari parent              

    public function kirimNotifikasi():void
    {
        echo "<div style='border: 2px solid #007bff;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        '>";
        echo "<h4>[EMAIL] - Subjek: {$this->subjek}</h4>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 2: notifikasi WA
class NotifWA extends NotifikasiWeb{
    //override method abstract dari parent 
    public function kirimNotifikasi():void
    {
        echo "<div style='border: 2px solid #10ec10bc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        '>";
        echo "<h4>[WhatsApp Message]</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 3: notifikasi browser
class NotifBrowser extends NotifikasiWeb{
    private string $aplikasiBrowser;

    public function __construct (string $penerima, string $pesan, string $aplikasiBrowser){
        parent:: __construct($penerima, $pesan);
        $this->aplikasiBrowser = $aplikasiBrowser;
    }  

    //wajib override abstract method dari parent
    public function kirimNotifikasi():void
    {
        echo "<div style='border: 2px solid #ef40c1;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        '>";
        echo "<h4>[NOTIF BROWSER] - Nama Browser: {$this->aplikasiBrowser}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//kelas turunan 4: notifikasi SMS
class NotifSMS extends NotifikasiWeb{
    //override method abstract dari parent 
    public function kirimNotifikasi():void
    {
        echo "<div style='border: 2px solid #aab721bc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #f8f9fa;
        '>";
        echo "<h4>[SMS]</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
}

//buat class untuk menampilkan dan menerapkan polimorfisme 
class NotifManager{
    //menerima data berdasar abstract apapun objek nya dari parent:: notifikasiWeb, bisa masuk
    public static function prosesNotif(NotifikasiWeb $notif):void{
        $notif->kirimNotifikasi();
    }
}
    //terapkan pada objek buat berbagi macam objek notif
    echo "<h2> Dashboard Simulasi Pengiriman Notifikasi Web</h2>";

    $notif1 = new NotifEmail("TonyStark@gmail.com", "Akun Anda Berhasil didaftarakan.","Konfirmasi Akun");
    $notif2 = new NotifWA("08123456789","Kode OTP akun WA anda adalah 78906","Jangan berikan pada siapapun");
    $notif3 = new NotifBrowser("Token device Asus","Anda mendapatkan Discount 50%!","Google Chorme");
    $notif4 = new NotifSMS("08123321123","Anda Mendapatkan Bonus Kuota","ketik *#0005 Untuk Kalim hadiah!!!");

    //kirim dan tamoilkan semua notif yang sudah dibuat
    NotifManager::prosesNotif($notif1);
    NotifManager::prosesNotif($notif2);+
    NotifManager::prosesNotif($notif3);
    NotifManager::prosesNotif($notif4);
?>