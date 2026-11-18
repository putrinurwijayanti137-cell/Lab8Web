# PRAKTIKUM 8
# PHP DAN DATABASE MYSQL

## 1. Persiapan Database MySQL

Praktikum dimulai dengan menjalankan Apache dan MySQL melalui XAMPP Control Panel. Setelah kedua layanan aktif, phpMyAdmin dibuka melalui browser dengan alamat `http://localhost/phpmyadmin/`. phpMyAdmin digunakan untuk mengelola database MySQL yang akan dihubungkan dengan program PHP.

## 2. Membuat Database

Database dibuat dengan nama `latihan1`. Database ini digunakan sebagai tempat penyimpanan data barang yang akan dikelola melalui aplikasi CRUD menggunakan PHP.

Perintah SQL yang digunakan:

```sql
CREATE DATABASE latihan1;
```

## 3. Membuat Tabel Data Barang

Setelah database berhasil dibuat, langkah berikutnya adalah membuat tabel dengan nama `data_barang`. Tabel ini digunakan untuk menyimpan informasi barang, yang terdiri dari ID barang, kategori, nama, gambar, harga beli, harga jual, dan stok.

Perintah SQL yang digunakan:

```sql
CREATE TABLE data_barang (
    id_barang int(10) auto_increment Primary Key,
    kategori varchar(30),
    nama varchar(30),
    gambar varchar(100),
    harga_beli decimal(10,0),
    harga_jual decimal(10,0),
    stok int(4)
);
```

Kolom `id_barang` menggunakan auto increment sebagai identitas setiap barang dan menjadi primary key pada tabel.

## 4. Menambahkan Data Awal

Setelah tabel berhasil dibuat, dilakukan pengisian tiga data awal ke dalam tabel `data_barang`. Data tersebut terdiri dari HP Samsung Android, HP Xiaomi Android, dan HP OPPO Android. Setiap data dilengkapi kategori, nama gambar, harga beli, harga jual, dan stok.

Data awal ini digunakan sebagai isi tabel sebelum proses penambahan, perubahan, dan penghapusan data dilakukan.

Perintah SQL yang digunakan:

```sql
INSERT INTO data_barang (kategori, nama, gambar, harga_beli, harga_jual, stok)
VALUES
('Elektronik', 'HP Samsung Android', 'hp_samsung.jpg', 2000000, 2400000, 5),
('Elektronik', 'HP Xiaomi Android', 'hp_xiaomi.jpg', 1000000, 1400000, 5),
('Elektronik', 'HP OPPO Android', 'hp_oppo.jpg', 1800000, 2300000, 5);
```

**Dokumentasi 1 – Data Barang Awal**

<img width="960" height="504" alt="tambah data barang" src="https://github.com/user-attachments/assets/06fbf731-4202-4506-84a6-4af49490785a" />


## 5. Membuat Folder Project

Setelah database dan tabel selesai dibuat, project aplikasi CRUD dibuat pada direktori `htdocs` dengan nama folder `lab8_php_database`. Folder ini digunakan untuk menyimpan seluruh file PHP, CSS, dan gambar yang diperlukan dalam pembuatan aplikasi.

Project dapat diakses melalui browser menggunakan alamat:

`http://localhost/lab8_php_database/`

## 6. Membuat Koneksi Database

File `koneksi.php` dibuat untuk menghubungkan program PHP dengan database MySQL. Pada file ini ditentukan informasi host, username, password, dan nama database yang digunakan.

Koneksi dilakukan menggunakan fungsi `mysqli_connect()`. Apabila koneksi gagal, program akan menampilkan pesan bahwa koneksi ke server gagal.

Dengan adanya file koneksi ini, file PHP lainnya dapat menggunakan koneksi database yang sama untuk menjalankan perintah SQL.

## 7. Membuat Halaman untuk Menampilkan Data (Read)

File `index.php` digunakan untuk menampilkan seluruh data yang tersimpan pada tabel `data_barang`. Proses pengambilan data dilakukan menggunakan perintah SQL `SELECT * FROM data_barang` dan dijalankan melalui fungsi `mysqli_query()`.

Data yang diperoleh kemudian ditampilkan dalam bentuk tabel pada halaman web. Informasi yang ditampilkan meliputi gambar, nama barang, kategori, harga beli, harga jual, stok, dan aksi.

Tahap ini merupakan proses Read dalam konsep CRUD, yaitu membaca dan menampilkan data yang tersimpan di database.

## 8. Menambahkan Data Barang (Create)

File `tambah.php` dibuat untuk menjalankan proses penambahan data barang ke dalam database. Pada halaman ini tersedia formulir yang digunakan untuk memasukkan nama barang, kategori, harga jual, harga beli, stok, dan file gambar.

Data yang telah diisi akan diproses menggunakan metode POST. Apabila pengguna memilih gambar, file tersebut akan diunggah ke folder `gambar` menggunakan fungsi `move_uploaded_file()`.

Selanjutnya, data dimasukkan ke tabel `data_barang` menggunakan perintah SQL `INSERT`. Setelah proses penyimpanan dilakukan, pengguna diarahkan kembali ke halaman utama.

**Dokumentasi 2 – Form Tambah Barang**

<img width="960" height="504" alt="Screenshot 2026-11-18 164534" src="https://github.com/user-attachments/assets/4082e4e5-620e-4831-a04d-8b14f044a1c0" />


**Dokumentasi 3 – Pengisian Data Barang**

<img width="960" height="504" alt="tambah barang" src="https://github.com/user-attachments/assets/22ea860f-b52c-4d67-9e5f-ef9107a58fff" />


**Dokumentasi 4 – Hasil Tambah Barang**

<img width="960" height="504" alt="hasil tambah barang" src="https://github.com/user-attachments/assets/4caecfbc-5cf4-4dd2-a9f1-953675aa44c3" />


Pada hasil tersebut, data barang yang baru dimasukkan sudah tampil bersama data sebelumnya pada halaman utama.

## 9. Menambahkan Aksi Ubah dan Hapus

Pada halaman utama, bagian aksi digunakan untuk menyediakan pilihan pengelolaan data barang. Setiap baris data memiliki tombol Ubah dan Hapus.

Tombol Ubah mengarahkan pengguna ke file `ubah.php` dengan membawa `id_barang` melalui parameter URL. ID tersebut digunakan untuk menentukan data yang akan diperbarui.

Tombol Hapus mengarahkan pengguna ke file `hapus.php` dengan membawa ID barang yang dipilih. Sebelum penghapusan dilakukan, pengguna mendapatkan konfirmasi untuk memastikan tindakan tersebut.

**Dokumentasi 5 – Tombol Ubah dan Hapus Barang**

<img width="960" height="504" alt="hapus dan ubah" src="https://github.com/user-attachments/assets/e7441843-a533-4035-aa89-0f9738bf08c6" />


## 10. Mengubah Data Barang (Update)

File `ubah.php` digunakan untuk melakukan perubahan terhadap data barang yang sudah tersimpan. Data barang diambil berdasarkan `id_barang` yang diterima melalui parameter URL.

Setelah data ditemukan, informasi barang ditampilkan kembali dalam formulir. Pengguna dapat mengubah nama barang, kategori, harga jual, harga beli, stok, dan gambar.

Ketika tombol Simpan ditekan, data perubahan diproses menggunakan metode POST. Program menjalankan perintah SQL `UPDATE` untuk memperbarui informasi pada tabel `data_barang` berdasarkan ID barang yang dipilih.

Apabila pengguna mengunggah gambar baru, file tersebut akan disimpan ke folder `gambar` dan informasi gambar pada database turut diperbarui. Jika tidak memilih gambar baru, gambar sebelumnya tetap digunakan.

**Dokumentasi 6 – Form Ubah Barang**

<img width="960" height="504" alt="Screenshot 2026-11-18 164949" src="https://github.com/user-attachments/assets/d15ffa26-0604-4a7c-9a8e-66eae1b1d201" />

Setelah proses perubahan berhasil dilakukan, halaman utama menampilkan kembali data barang dengan informasi yang telah diperbarui.

## 11. Menghapus Data Barang (Delete)

File `hapus.php` digunakan untuk menghapus data barang dari tabel `data_barang`. Proses penghapusan dilakukan berdasarkan `id_barang` yang diterima melalui parameter URL.

Program menjalankan perintah SQL `DELETE` untuk menghapus data yang memiliki ID sesuai dengan barang yang dipilih. Setelah proses penghapusan dijalankan, pengguna diarahkan kembali ke halaman utama.

**Dokumentasi 7 – Proses Hapus Barang**

<img width="960" height="504" alt="hapus barang" src="https://github.com/user-attachments/assets/0006a187-749e-4216-894c-6e7a21ef078d" />


**Dokumentasi 8 – Hasil Penghapusan Barang**

<img width="960" height="504" alt="barang terhapus" src="https://github.com/user-attachments/assets/998dc3a3-33a0-45fc-b1f2-dfa512bc9a8e" />


## 12. Tampilan Data Setelah Penghapusan

Setelah proses penghapusan selesai, halaman utama menampilkan kembali daftar barang yang masih tersimpan di dalam database. Barang yang sebelumnya dipilih untuk dihapus sudah tidak muncul pada tabel, sedangkan data barang lainnya tetap ditampilkan.

Tahap ini memperlihatkan hasil proses Delete, yaitu penghapusan data berdasarkan ID barang yang dipilih.

**Dokumentasi 10 – Tampilan Barang Setelah Dihapus**

<img width="960" height="504" alt="barang terhapus" src="https://github.com/user-attachments/assets/e7c5046c-f1ac-4b2e-b68f-aa94ed7ec0b7" />
