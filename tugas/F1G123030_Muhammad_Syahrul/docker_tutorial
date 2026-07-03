# LANGKAH - LANGKAH MENYIAPKAN DOCKER

Download WSL dan Docker Terlebih Dahulu Di WEB [Docker](https://www.docker.com/products/docker-desktop/)


## CEK VERSI DOCKER

Cek Versi Docker Terlebih Dahulu Agar Meyakinkan Bahwa Docker benar - benar ada
```
docker --version
```

Jika docker ada maka akan muncul versi dockernya
```
C:\Users\Rull>docker --version
Docker version 27.3.1, build ce12230
```

## Pilih Directory untuk menyiapkan docker
Pilih Directory Mana Saja Untuk Menyiapkan dockernya
Sebagai contoh saya menyiapkan dockernya di directory
```
E:\Program\Github\ilkom-23-os-kelompok-1\Docker_Dekstop\Tutorial_Docker\Muhammad Syahrul Mubarak>
```

## Ingin Membuat Image Apa?
Di docker itu terdapat berbagai macam dan jenis image, kamu bisa melihatnya langsung di [docker_hub](https://hub.docker.com/). Misalkan saya ingin membuat sebuah image docker node.
Masuk di terminal lalu ketik
```
docker pull node
```
kemudian akan langsung mendownload node versi terbaru

## Membuat File Dockerfile
Setelah masuk ke directory tempat untuk penyiapan dockernya. Sekarang buat file dengan nama 'dockerfile' kemudian install ekstension docker di visual studio code.

## Buat File app.js
Sekarang kita akan mencoba membuat image atau container yang akan berjalan sebagai server. Buat file 'app,js' di directory yang sama dengan file 'dockerfile'. Kemudian ketikan syntax berikut untuk menkonfigurasi server
```
const http = require ('http');
const hostname = '0.0.0.0';
const port = 3000;

const server = http.createServer((req,res)=>{
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('¡Hola amigo!')
});

server.listen(port,hostname, () => {
    console.log(`server running at http://${hostname}:${port}/`);
});
```
## Konfigurasi Dockerfile
sekarang kalian tinggal perlu mengisi docker filenya sebagai berikut
```
FROM node:latest
COPY . /app
CMD ["node","/app/app.js"]
EXPOSE 3000
```

## Membuat image / container baru untuk server
Jika semua sudah siap, sekarang tinggal perlu membuat container atau image nya berjalan di server. Ketik di terminal sebagai berikut
```
docker build -t node-server .
```

dimana 'node-server' itu untuk nama imagenya

## Mengecek image
Untuk mengecek Image yang ada di dockernya, kita perlu ketik di terminal sebagai berikut
```
docker images
```
maka akan muncul image-image yang terdapat pada docker kalian.

## Menjalankan server docker
Untuk menjalankan server dockernya, kita tinggal perlu ketik di terminal sebagai berikut
```
docker run -p 3000:3000 node-server
```

dimana 'node-server' nama image kalian


## Mengecek container yang sedang berjalan
Karena kita sudah menjalankan imagenya. Sekarang kita akan mengecek ada berapa container yang sedang berjalan pada dockernya. Kita tinggal perlu ketik di terminal sebagai berikut
```
docker ps
```
maka akan muncul nama dan id container yang sedang berjalan

## Mengecek containernya di web local
setelah mengikuti pada poin menjalankan server docker. Pada terminal akan muncur teks sebagai berikut
```
PS E:\Program\Github\ilkom-23-os-kelompok-1\Docker_Dekstop\Tutorial_Docker\Muhammad Syahrul Mubarak> docker run -p 3000:3000 node-server
server running at http://0.0.0.0:3000/
```

pada terminal tersebut kalian tinggal ctrl + click pada http://0.0.0.0:3000.
jika tidak muncul. Ubah 0.0.0.0 menjadi localhost atau 3000

## Screenshoot Tampilan
![NotFound]