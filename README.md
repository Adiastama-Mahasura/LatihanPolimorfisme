# PHP Polymorphism

## Deskripsi
Project ini merupakan latihan pemrograman PHP yang membahas konsep Polymorphism (Polimorfisme) dalam Object-Oriented Programming (OOP). Project ini menerapkan tiga jenis pendekatan, yaitu Polymorphism menggunakan Inheritance, Abstract Class, dan Interface.

## Materi yang Dipelajari

### 1. Polymorphism dengan Inheritance
- Membuat Parent Class `pegawai`.
- Membuat Child Class `Freelancer` dan `karyawanTetap`.
- Menggunakan method overriding.
- Menghitung gaji berdasarkan jenis pekerjaan.

### 2. Polymorphism dengan Abstract Class
- Membuat Abstract Class `NotifikasiWeb`.
- Menggunakan Abstract Method `kirimNotifikasi()`.
- Membuat beberapa kelas turunan:
  - `NotifEmail`
  - `NotifWA`
  - `NotifBrowser`
  - `NotifSMS`
- Menggunakan class `NotifManager` untuk memproses notifikasi.

### 3. Polymorphism dengan Interface
- Membuat Interface `Cetakable`.
- Menggunakan method `tampilkanCetak()`.
- Membuat kelas `LaporanSiswa` dan `LaporanGuru`.
- Menggunakan class `CetakManager` untuk memproses berbagai jenis dokumen.

## Teknologi yang Digunakan
- PHP
- HTML
- CSS
- Visual Studio Code
- XAMPP

## Struktur Folder

```text
LatihanPolimorfisme/
│
└── Dias_Lana/
    └── Polymorphism/
        ├── Polymorphism_Inheritance.php
        ├── Polymorphisme_Abstract.php
        └── polymorphism_Interface.php
```

## Cara Menjalankan
1. Download atau clone repository.
2. Simpan folder project ke dalam direktori `htdocs`.
3. Jalankan Apache melalui XAMPP.
4. Buka browser.
5. Jalankan file PHP sesuai materi yang ingin dipelajari.

Contoh alamat:

```text
http://localhost/LatihanPolimorfisme/Dias_Lana/Polymorphism/Polymorphism_Inheritance.php
```

Ganti nama file pada URL untuk menjalankan latihan Abstract Class atau Interface.

## Tujuan Pembelajaran
Project ini dibuat untuk memahami konsep Polymorphism dalam PHP OOP, khususnya penggunaan Inheritance, Abstract Class, Interface, Method Overriding, serta penerapan objek yang memiliki perilaku berbeda melalui method yang sama.

## Author
**Adiastama D**

Project Pembelajaran Rekayasa Perangkat Lunak (RPL).
