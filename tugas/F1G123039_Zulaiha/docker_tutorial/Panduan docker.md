PANDUAN MENJALANKAN DOCKER

Docker adalah platform yang memungkinkan Anda untuk mengembangkan, mengirimkan, dan menjalankan aplikasi dalam container. Container adalah lingkungan yang terisolasi yang mencakup semua yang dibutuhkan aplikasi untuk berjalan, termasuk kode, pustaka, dan dependensi. 

1. Instal Docker
Unduh Docker Desktop dari docker.com . dan Verifikasi instalasi dengan membuka terminal atau CMD:
docker --version

2. Jalankan Container Uji
docker run hello-world 

# Sebelum menjalankan aplikasi, pastikan sudah mendownload image Docker dengan perintah berikut:

docker pull  

# Gunakan perintah di bawah ini untuk membuat dan menjalankan container Docker:

docker-compose up --build -d  

# Mengakses Aplikasi
1. Akses Web PHP
Setelah container aktif, Anda dapat membuka aplikasi PHP di browser melalui URL:
http://localhost:8000

2. Akses PhpMyAdmin
Untuk memanage database MySQL, buka PhpMyAdmin melalui URL berikut:
http://localhost:8080

# Detail Login PhpMyAdmin:
Server Name: mysql_db
Username: root
Password: awvx0563

# Menghentikan dan Membersihkan Container
Jika Anda ingin menghentikan seluruh container yang sedang berjalan, gunakan perintah berikut:

docker-compose down  

# Tampilan Aplikasi
Berikut adalah tampilan dari web aplikasi:
![alt text](<Tampilan php.png>)
![alt text](<Tampilan awal.png>)