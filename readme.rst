######################
The Louvre E-Bookstore
######################

The Louvre E-Bookstore merupakan tempat pecinta buku untuk berbelanja berbagai jenis e-book secara online.
Pembeli dapat melakukan transaksi dengan mudah, cepat, dan terpercaya melalui sistem yang telah terotomasi.
Fitur-fitur mulai dari pencarian, penyaringan hasil pencarian, dan mengurutkan hasil pencarian dapat diakses
dengan beberapa klik. Saat kalian membuka halaman awal The Louvre E-Bookstore, kalian akan disambut dengan
buku yang banyak dibeli oleh pengguna lainnya, buku dengan rating terbaik, buku yang sedang promo, dan seleksi
buku-buku pilihan kami.

***********
Fitur-fitur
***********
- Pembeli dapat melakukan transaksi dengan mudah, cepat, dan terpercaya melalui sistem yang telah terotomasi.
- Tampilan yang user-friendly.
- Search & Filter.
- Informasi lengkap mengenai buku yang tersedia.

********************
Spesifikasi Platform
********************

Kami mengembangkan aplikasi web The Louvre E-Bookstore dengan platform yang menjalankan Laragon 3.1.2 dengan:
- Web Server Apache 2.4.25
- Database Server MariaDB 10.2.10 dengan koneksi menggunakan MySQLi
- PHP versi 7.1.6
Beberapa komponen pihak ketiga yang kami gunakan antara lain:
- jQuery versi 3.2.1 (https://jquery.com/)
- Back-End PHP Framework CodeIgniter versi 3.1.6 (https://codeigniter.com/)
- Front-End Bootstrap versi 4.0.0 beta 2 (https://getbootstrap.com/)
- Bootstrap Slider (http://seiyria.com/bootstrap-slider/)
- DataTables versi 1.10.16 (https://datatables.net/)
- GroceryCRUD versi 1.5.9 (https://www.grocerycrud.com/)
- FontAwesome versi 4.7.0 (http://fontawesome.io/)
- Emoji CSS (https://afeld.github.io/emoji-css/)

*********
Instalasi
*********

Salin file yang terdapat pada CD atau mengekstrak konten dari zip yang diperoleh dari GitHub ke root folder
Laragon di folder www\louvre, misal:
C:\laragon\www\louvre
Kemudian, buka preferensi Laragon dan pada tab "General", centang pilihan "Auto Virtual Hosts" dan ganti
tulisan pada textbox yang ada di bawah pilihan tersebut dari "{name}.dev" menjadi "{name}.localhost".
Tutup preferensi tersebut dan berikan akses administrator bila diperlukan.
Aplikasi web kami yang Anda telah pasang kini dapat diakses melalui http://louvre.localhost/.
Restart komputer Anda bila alamat http://louvre.localhost/ mengembalikan error 404.

******************************
Akun Manager & Pengguna Bawaan
******************************

Terdapat 3 akun manager yang terdapat di aplikasi web ini. Berikut adalah informasi selengkapnya:
- email: stefanus@louvre.dev dengan password: stefanus
- email: william@louvre.dev  dengan password: william
- email: miqdad@louvre.dev   dengan password: miqdad
Selain itu, terdapat juga 2 akun pembeli untuk keperluan testing:
- email: buyer1@example.com  dengan password: buyersatu
- email: buyer2@example.com  dengan password: buyerdua

********************
Informasi Pengembang
********************

Kami merupakan mahasiswa Universitas Multimedia Nusantara jurusan Sistem Komputer angkatan 2015 yang terdiri dari:
- Stefanus Kurniawan (NIM: 000 000 10293)
- William Darian     (NIM: 000 000 10691)
- Miqdad Abdurrahman (NIM: 000 000 12596)