# Nexus 

Platform interaktif untuk mempelajari konsep arsitektur sistem, proses daemon, container Docker, dan manajemen sistem. Dibuat dengan antarmuka web modern (*Glassmorphism*, *Dark Mode*, *Particle Animations*) menggunakan FastAPI dan Vanilla CSS.

## Fitur Utama

- 🚀 **Konsep Sistem**: Modul pembelajaran interaktif tentang dasar-dasar arsitektur sistem.
- ⚙️ **Daemon Process**: Contoh implementasi proses latar belakang (daemon) dan manajemennya.
- 🐳 **Docker Guide**: Panduan kontainerisasi aplikasi, dari dasar hingga penggunaan `docker-compose`.
- 📊 **Live System Monitor**: Memantau penggunaan CPU, RAM, Disk, dan Uptime server secara real-time.
- 🛒 **RESTful API Orders**: Contoh API CRUD sederhana dengan antarmuka tabel interaktif.

## Tech Stack

- **Backend**: Python 3.11+, FastAPI, Uvicorn, Jinja2
- **Frontend**: HTML5, Vanilla CSS3, Vanilla JS
- **Infrastruktur**: Docker, Docker Compose, Nginx, MySQL
- **Sistem**: Bash scripting, `psutil` untuk live monitoring

## Cara Menjalankan (Development)

1. Pastikan Python 3.11+ terinstall.
2. Install dependensi:
   ```bash
   pip install -r requirements.txt
   ```
3. Jalankan server:
   ```bash
   python -m uvicorn app.main:app --host 0.0.0.0 --port 8000 --reload
   ```
4. Buka `http://localhost:8000` di browser Anda.

## Cara Menjalankan (Production / Docker)

Pastikan Docker Desktop sudah terpasang di arsitektur sistem Anda.
```bash
docker-compose up --build -d
```

---
*Dibuat oleh Tim Ilmu Komputer 2023*
