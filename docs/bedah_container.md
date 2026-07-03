Bedah container adalah proses investigasi terhadap container (seperti Docker container) untuk memahami apa yang ada di dalamnya, bagaimana cara kerjanya, serta bagaimana container tersebut dikonfigurasi. Ini bisa mencakup berbagai hal, mulai dari mengecek sistem operasi, konfigurasi jaringan, hingga memeriksa aplikasi dan file yang ada di dalam container. Proses ini sangat berguna untuk troubleshooting, auditing keamanan, atau hanya untuk mempelajari arsitektur container.

Berikut adalah langkah-langkah umum dan perintah yang biasa digunakan dalam bedah container:

1. Memeriksa Sistem Operasi dan Informasi Versi
cat /etc/os-release: Menampilkan detail sistem operasi yang digunakan oleh container.
uname -a: Memberikan informasi tentang kernel dan arsitektur sistem.
cat /proc/version: Menampilkan versi kernel Linux yang digunakan oleh container.
2. Memeriksa File-System
ls /: Menampilkan isi direktori root container.
ls /dev/: Melihat daftar perangkat (devices) yang terhubung ke container, seperti terminal, disk, atau perangkat khusus lainnya.
df -h: Mengecek penggunaan disk space dalam container.
mount: Melihat filesystem yang ter-mount di dalam container.
3. Mengecek Proses yang Berjalan di Container
ps aux: Menampilkan daftar proses yang berjalan dalam container.
top: Alat untuk melihat proses secara real-time, membantu dalam memantau penggunaan CPU dan memori.
cat /proc/cpuinfo: Menampilkan informasi tentang prosesor yang digunakan oleh container.
cat /proc/meminfo: Menampilkan informasi tentang penggunaan memori dalam container.
4. Memeriksa Konfigurasi Jaringan
ifconfig atau ip a: Menampilkan informasi jaringan, seperti alamat IP container.
netstat -tuln: Menampilkan port yang terbuka dan status jaringan dalam container.
ping: Memeriksa konektivitas jaringan dari container ke sistem lain.
5. Memeriksa Konfigurasi Environment
env: Menampilkan semua variabel lingkungan (environment variables) yang aktif dalam container, seperti PATH, HOME, dan variabel custom lain yang mungkin penting bagi aplikasi yang berjalan.
cat /etc/hosts: Melihat file hosts untuk memeriksa mapping IP ke hostname.
cat /etc/resolv.conf: Melihat konfigurasi DNS yang digunakan oleh container.
6. Memeriksa Aplikasi di Dalam Container
dpkg -l atau rpm -qa: Menampilkan daftar paket aplikasi yang terinstal dalam container, bergantung pada sistem paket (Debian/Ubuntu atau Red Hat/CentOS).
apt list --installed atau yum list installed: Untuk distribusi berbasis Debian atau RedHat, memeriksa aplikasi yang terinstal di dalam container.
which <app>: Menampilkan lokasi aplikasi yang dijalankan di container, misalnya which nginx untuk menemukan jalur aplikasi Nginx.
7. Memeriksa Log Sistem dan Aplikasi
cat /var/log/syslog: Melihat log sistem dari aplikasi yang berjalan di dalam container.
journalctl: Melihat log untuk container yang menggunakan systemd.
docker logs <container_id>: Untuk melihat log dari container yang sedang berjalan melalui Docker.
8. Memeriksa Izin File dan Direktori
ls -l: Menampilkan izin file dan direktori dalam container.
stat <file>: Memberikan rincian lengkap tentang file, termasuk izin, pemilik, dan waktu akses terakhir.
chown dan chmod: Mengubah izin atau pemilik file jika diperlukan selama proses bedah.
9. Memeriksa Akses dari dan ke Container
docker exec -it <container_id> bash: Memasuki container dengan shell interaktif untuk melihat lebih lanjut dari dalam.
docker inspect <container_id>: Menampilkan detail lengkap konfigurasi container, termasuk pengaturan jaringan, port, volume yang di-mount, dan variabel lingkungan.
docker stats <container_id>: Memantau penggunaan resource seperti CPU, memori, dan bandwidth jaringan secara real-time untuk container yang sedang berjalan.
10. Memeriksa Resource Container
free -m: Menampilkan penggunaan memori RAM dalam container.
uptime: Menunjukkan berapa lama container telah berjalan, bersama dengan beban sistem.
docker stats: Memeriksa pemakaian CPU, memori, jaringan, dan I/O dari container yang sedang berjalan.
11. Memeriksa dan Memodifikasi Container Storage
docker cp <container_id>:/path/to/file /local/path: Menyalin file dari container ke sistem lokal untuk analisis lebih lanjut.
docker commit <container_id> <new_image_name>: Membuat snapshot atau image baru dari container untuk digunakan di lain waktu atau di lingkungan lain.
12. Membongkar Layer Image Docker
docker history <image_id>: Melihat history dari image container yang digunakan, termasuk layer-layer yang dibangun untuk membuat image tersebut.
docker save <image_id> -o <image.tar>: Menyimpan image ke dalam file tar untuk dianalisis atau diarsipkan.