## Menjalankan Laravel Sebagai Proses Daemon

## Deskripsi
Dokumentasi ini memberikan petunjuk lengkap untuk menjalankan server Laravel sebagai proses daemon. Proses daemon memungkinkan server Laravel berjalan terus-menerus di latar belakang tanpa perlu menjaga sesi terminal tetap terbuka, sehingga lebih praktis untuk pengembangan dan pengujian aplikasi secara lokal.

## Langkah-Langkah:
1. Salin Proyek Laravel

Untuk memulai, pertama-tama salin atau clone proyek Laravel dari repositori yang diinginkan dengan menggunakan perintah berikut di terminal Anda:

git clone <alamat_repositori_proyek>

Pastikan alamat repositori proyek sudah benar, agar semua file proyek Laravel terunduh dengan lengkap.
2. Membuat Skrip Daemon

Agar server Laravel dapat dijalankan sebagai proses daemon, kita perlu membuat skrip khusus yang akan mengelola operasi memulai dan menghentikan server. Langkah-langkahnya sebagai berikut:

a. Buat File Skrip
Buat file skrip baru bernama laravel-daemon.sh di dalam direktori proyek Laravel Anda. Gunakan perintah berikut:

touch laravel-daemon.sh

b. Edit File Skrip
Setelah membuat file, buka file laravel-daemon.sh dengan editor teks pilihan Anda, seperti nano atau vim, untuk mulai menambahkan kode.

c. Masukkan Kode Skrip
Salin dan tempelkan kode berikut ke dalam file laravel-daemon.sh. Skrip ini memiliki fungsi untuk memulai dan menghentikan server Laravel serta menyimpan PID proses agar mudah dikelola:

#!/bin/bash

case "$1" in
    start)
        # Periksa apakah server Laravel sudah berjalan
        if [ -f laravel.pid ]; then
            echo "Server Laravel sudah aktif."
            exit 1
        fi

        # Mulai server dan simpan PID ke dalam file
        nohup php artisan serve > /dev/null 2>&1 &
        echo $! > laravel.pid
        echo "Server Laravel berhasil dijalankan."
        ;;
    stop)
        # Periksa apakah file PID tersedia
        if [ -f laravel.pid ]; then
            PID=$(cat laravel.pid)
            kill $PID
            rm laravel.pid
            echo "Server Laravel berhasil dihentikan."
        else
            echo "Server Laravel tidak sedang berjalan."
        fi
        ;;
    *)
        echo "Penggunaan: $0 {start|stop}"
        exit 1
        ;;
esac

Penjelasan singkat tentang skrip:

    start: Memulai server Laravel jika belum berjalan. PID server akan disimpan di file laravel.pid untuk mempermudah pengelolaan proses.
    stop: Menghentikan server Laravel jika sedang berjalan, menghapus file laravel.pid, dan menghentikan proses.
    Penggunaan: Memberikan panduan penggunaan skrip, yaitu hanya start atau stop.

d. Beri Izin Eksekusi pada Skrip
Agar skrip dapat dieksekusi, kita perlu memberikan izin eksekusi dengan perintah:

chmod +x laravel-daemon.sh

3. Menjalankan dan Menghentikan Server

Setelah skrip siap, Anda dapat menggunakan perintah berikut untuk mengelola server Laravel:

a. Menjalankan Server Laravel
Untuk memulai server Laravel sebagai proses latar belakang, jalankan perintah:

./laravel-daemon.sh start

Jika berhasil, Anda akan melihat pesan: Server Laravel berhasil dijalankan. Ini menunjukkan bahwa server Laravel sudah aktif dan berjalan sebagai proses daemon.

b. Menghentikan Server Laravel
Untuk menghentikan server yang sedang berjalan, gunakan perintah berikut:

./laravel-daemon.sh stop

Jika berhasil, pesan Server Laravel berhasil dihentikan. akan ditampilkan, menandakan bahwa server telah dihentikan dan prosesnya telah diakhiri.
4. Mengakses Aplikasi Laravel

Setelah server berjalan, Anda bisa mengakses aplikasi Laravel melalui browser dengan membuka URL:

http://localhost:8000

Pastikan server Laravel sedang berjalan agar aplikasi dapat diakses dengan baik. Halaman ini akan menampilkan aplikasi Laravel di lingkungan lokal, siap untuk diuji dan digunakan.

Dengan skrip daemon ini, Anda bisa lebih mudah mengelola server Laravel tanpa harus bergantung pada sesi terminal yang terbuka terus-menerus.