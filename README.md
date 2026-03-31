# Tugas Project PBO - Input Form PHP

Tugas Project Implementation PBO — Membuat Input Form menggunakan PHP dengan konsep OOP (Class & Object).

## Fitur
- Form input data: Firstname, Lastname, Phone Number, Address
- Pemrosesan data menggunakan PHP
- Implementasi OOP dengan class `Person`
- Menampilkan hasil input setelah klik Submit
- Tombol Reset untuk kembali ke form kosong

## Struktur File
```text
tugas-pbo-git/
├── index.php     → Tampilan form + logika PHP (submit & tampilkan data)
├── Person.php    → Class Person (OOP)
└── README.md     → Dokumentasi project
```

## Cara Menjalankan

**Opsi 1: Menggunakan XAMPP / Laragon**
1. Letakkan folder `tugas-pbo-git` di dalam `htdocs` (XAMPP) atau `www` (Laragon).
2. Jalankan Apache dari panel XAMPP / Laragon (Start All).
3. Buka browser → `http://localhost/tugas-pbo-git/index.php`

**Opsi 2: Tanpa XAMPP / Laragon (Menggunakan PHP Built-in Server)**
1. Buka Terminal / Command Prompt dan arahkan ke dalam folder project (`cd tugas-pbo-git`).
2. Jalankan perintah: `php -S localhost:8000`
3. Buka browser → `http://localhost:8000`

## Cara Kerja
1. User mengisi form (Firstname, Lastname, Phone Number, Address)
2. Klik tombol **Submit**
3. PHP menerima data via `$_POST`, membuat object `Person`
4. Hasil ditampilkan di bawah form:
   - `Hi, my name is [Firstname] [Lastname]`
   - `Phone Number : ...`
   - `Address : ...`
5. Klik **Reset** untuk mengosongkan form

## Teknologi
- PHP (native)
- HTML & CSS
- OOP — Class & Object

## Anggota Tim
| Nama | NIM |
|------|-----|
|      |     |
|      |     |
|      |     |
