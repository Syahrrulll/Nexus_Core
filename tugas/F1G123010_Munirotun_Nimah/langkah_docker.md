# 1. Instal Docker
# Untuk menginstal Docker pada sistem berbasis Linux (contoh: Ubuntu)
sudo apt-get update                      # Mengupdate daftar paket
sudo apt-get install docker-ce docker-ce-cli containerd.io  # Menginstal Docker

# Setelah instalasi, pastikan Docker terinstal dengan benar
docker --version                         # Menampilkan versi Docker

# 2. Menjalankan Container Docker
# Menjalankan container dari image hello-world untuk memastikan Docker berfungsi
docker run hello-world                   # Menampilkan pesan selamat datang dari Docker

# 3. Membangun Docker Image
# Buat Dockerfile di dalam folder proyek Anda, misalnya untuk aplikasi Python:
# Isi contoh Dockerfile:
'''
# Dockerfile
# Menggunakan base image python:3.8
FROM python:3.8-slim

# Mengatur direktori kerja di dalam container
WORKDIR /app

# Menyalin file requirements.txt (dependensi) ke container
COPY requirements.txt .

# Menginstal dependensi
RUN pip install --no-cache-dir -r requirements.txt

# Menyalin seluruh source code aplikasi ke container
COPY . .

# Menjalankan aplikasi saat container dijalankan
CMD [ "python", "./app.py" ]
'''

# Membangun image berdasarkan Dockerfile tersebut
docker build -t my-python-app .          # Membangun image bernama my-python-app

# 4. Menjalankan Container dari Image
# Jalankan container dari image yang telah dibangun, misalnya pada port 5000
docker run -p 5000:5000 my-python-app    # Memetakan port 5000 container ke port 5000 host

# 5. Mengelola Docker Container
# Melihat container yang sedang berjalan
docker ps                                # Menampilkan daftar container yang sedang berjalan

# Melihat semua container (termasuk yang sudah berhenti)
docker ps -a                             # Menampilkan semua container

# Menghentikan container dengan ID tertentu
docker stop [container-id]               # Menghentikan container dengan ID spesifik

# Menghapus container
docker rm [container-id]                 # Menghapus container

# Melihat daftar image yang terunduh
docker images                            # Menampilkan semua image yang terunduh

# Menghapus image dengan ID tertentu
docker rmi [image-id]                    # Menghapus image

# 6. Menggunakan Docker Compose (opsional)
# Contoh file docker-compose.yml:
'''
version: '3'
services:
  web:
    build: .
    ports:
      - "5000:5000"
  db:
    image: postgres
    environment:
      POSTGRES_USER: example
      POSTGRES_PASSWORD: example
'''

# Untuk menjalankan container berdasarkan docker-compose.yml:
docker-compose up                        # Menjalankan semua service yang didefinisikan

# 7. Push Image ke Docker Hub (opsional)
# Login ke Docker Hub
docker login                             # Masukkan username dan password Docker Hub

# Tag image sebelum di-push
docker tag my-python-app username/my-python-app  # Memberi tag image dengan username

# Push image ke Docker Hub
docker push username/my-python-app        # Mengunggah image ke Docker Hub

# 8. Menjalankan Aplikasi di Produksi
# Jika sudah siap, aplikasi dapat dijalankan pada server produksi dengan Docker Swarm, Kubernetes,
# atau Docker biasa tergantung skala dan kebutuhan aplikasi.
