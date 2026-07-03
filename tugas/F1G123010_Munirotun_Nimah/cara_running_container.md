# 1.Pastikan Docker sudah terinstal
#Sebelum bisa menjalankan container, pastikan Docker sudah terinstal di sistem. Cek instalasi Docker dengan perintah berikut di terminal atau command prompt:
docker --version

#2.Menjalankan Container dari Image
#Gunakan perintah berikut untuk menjalankan container dari image Docker:
docker run [OPTIONS] IMAGE_NAME
IMAGE_NAME adalah nama image yang akan dijalankan. Misalnya, untuk menjalankan container dengan image nginx:
docker run nginx

#3.Pilihan Opsional (OPTIONS)
#Berikut beberapa opsi penting yang sering digunakan saat menjalankan container:
-d : Menjalankan container di background (detached mode).
docker run -d nginx
-p : Memetakan port di host ke port di container. Misalnya, memetakan port 8080 di host ke port 80 di container:
docker run -d -p 8080:80 nginx
--name : Memberikan nama spesifik pada container.
docker run -d --name my_nginx nginx
-v : Memounting volume dari host ke container untuk menyimpan data yang persisten.
docker run -d -v /path/to/host/folder:/path/to/container/folder nginx

#4.Menjalankan Container Interaktif
#Untuk menjalankan container dalam mode interaktif (akses shell di dalam container), gunakan:
docker run -it ubuntu /bin/bash
Perintah ini akan menjalankan container dengan image ubuntu dan membuka bash shell di dalamnya.

#5.Melihat Container yang Sedang Berjalan
#Untuk melihat daftar container yang sedang berjalan, gunakan:
docker ps

#6. Stop atau Remove Container
#Stop container yang sedang berjalan:
docker stop CONTAINER_ID
Remove container yang sudah berhenti:
docker rm CONTAINER_ID
 







