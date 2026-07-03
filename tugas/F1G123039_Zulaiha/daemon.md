# MENJALANKAN DAEMON PROCESS DI LARAVEL

## DEFINISI DAEMON
Daemon adalah sebuah program atau proses yang berjalan di latar belakang sistem operasi, seringkali tanpa interaksi langsung dengan pengguna. Daemon biasanya aktif sejak sistem operasi dihidupkan dan tetap berjalan hingga sistem dimatikan, bertugas menjalankan tugas-tugas tertentu secara otomatis atau menunggu untuk menanggapi permintaan tertentu.

## DESKRIPSI
File ini adalah panduan yang menjelaskan tahap membuat dan menggunakan skrip untuk menjalankan dan menghentikan server Laravel sebagai daemon di laravel.

## LANGKAH-LANGKAH

### 1. BAHAN YANG DI PERLUKAN
Download [Laragon](https://laragon.org/download) Di Website Resmi Laragon
Download [Git](https://git-scm.com/downloads) Di Website Resminya


### 2. Instal framework Laravel atau kloning Laravel dari repositori yang tersedia.

#### a.Salin proyek Laravel yang dipilih dari repositori lain melalui perintah:
```bash
git clone < proyek_yang_akan_diclone >
```
#### b. Akses folder proyek Laravel yang telah ada atau di-kloning sebelumnya melalui teks editor agar lebih praktis.

### 3. MEMBUAT SKRIP DAMEON

#### BUKA GIT BASH TERLEBIH DAHULU
#### a.Buat file kode skrip.
Buat file baru bernama `laravel-daemon.sh` dengan perintah:
```bash
touch laravel-daemon.sh
```

#### b. Ubah file skrip.
Buka file `laravel-daemon.sh` menggunakan editor teks favorit Anda (misalnya `visualstudio code`, `notepad++`, atau editor lainnya).

#### c. Masukkan Skrip
Salin dan tempel skrip berikut ke dalam file:
```bash
#!/bin/bash

#!/bin/bash

case "$1" in
    start)
        # Cek apakah server sudah berjalan
        if [ -f laravel.pid ]; then
            echo "Laravel server is already running."
            exit 1
        fi

        # Jalankan server dan simpan PID ke file
        nohup php artisan serve > /dev/null 2>&1 &
        echo $! > laravel.pid
        echo "Laravel server started."
        ;;
    stop)
        # Cek apakah file PID ada
        if [ -f laravel.pid ]; then
            PID=$(cat laravel.pid)
            kill $PID
            rm laravel.pid
            echo "Laravel server stopped."
        else
            echo "No Laravel server is running."
        fi
        ;;
    *)
        echo "Usage: $0 {start|stop}"
        exit 1
        ;;
esac

#### d. Izinkan file eksekusi.
Jalankan perintah berikut untuk memberikan izin eksekusi pada skrip:
```bash
 chmod +x laravel-daemon.sh
```


### 4. Menjalankan dan Menghentikan Server

#### a. Mulai Server
Jalankan server dengan perintah:
```bash
./laravel-daemon.sh start
```
**Pesan yang muncul:** 
```
Laravel server started.
```

#### b. Hentikan Server
Hentikan server dengan perintah:
```bash
./laravel-daemon.sh stop
```
**Pesan yang muncul:**
```
Laravel server stopped.
```

### 5. Akses Aplikasi Laravel
Setelah server berjalan, nyalakan laragonnya untuk mengkoneksikan databasenya lalu buka browser dan masukkan URL:
```
http://localhost:8000
```
### 6. Screenshot