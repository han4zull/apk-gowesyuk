# 🚴 GowesYuk

**GowesYuk** adalah aplikasi peminjaman sepeda berbasis web  
yang memudahkan pengguna untuk melakukan **pemesanan, penyewaan,  
hingga pembayaran secara online**.  

Aplikasi ini mendukung gaya hidup **sehat**, **ramah lingkungan**,  
dan **efisien dalam bertransportasi**.

---

## 🎯 Tujuan
1. Mempermudah masyarakat yang membutuhkan sarana bersepeda tanpa harus memiliki sepeda pribadi.  
2. Menyediakan opsi transportasi bagi pelajar yang tidak diperbolehkan membawa kendaraan bermotor ke sekolah.  
3. Berkontribusi dalam pengurangan polusi udara melalui penyediaan moda transportasi ramah lingkungan.  
4. Menawarkan layanan penyewaan sepeda yang efisien, aman, dan mudah diakses.  
5. Memfasilitasi masyarakat yang ingin menggunakan sepeda untuk kegiatan rekreasi sekaligus mendukung pola hidup sehat.  


---

## 🚀 Fitur Utama

### 👥 User
- Registrasi / Daftar  
- Login / Masuk  
- Cari produk  
- Filter produk  
- Tambah produk ke keranjang  
- Meminta bantuan  
- Menyewa sepeda  
- Ubah profil  
- Menampilkan riwayat  
- Ubah email / password  
- Melihat laporan  
- Logout  

### 🛡️ Admin
- Login Admin  
- Beranda / Dashboard  
- Manajemen user  
- Mengelola produk  
- Manajemen & cetak penyewaan  
- Manajemen & cetak laporan  
- Logout  

## 🛠️ Tech Stack
- **Backend** : Laravel 10 (PHP, MVC)  
- **Frontend** : Blade + Tailwind CSS  
- **Database** : MySQL  

**Tools**:  
- 🎨 Figma (UI/UX Design)  
- 🛠️ GitHub (Version Control)  
- 💻 XAMPP (PHP & MySQL)  
- 📊 Draw.io / Creately (Diagram)  
- 📄 Google Docs (Dokumentasi)  

---

## ⚡ Cara Install

```bash
# 1. Clone repo ini
git clone https://github.com/username/gowesyuk.git
cd gowesyuk

# 2. Install dependency
composer install

# 3. Konfigurasi environment
cp .env.example .env
php artisan key:generate

# 4. Migrasi database
php artisan migrate

# 5. Jalankan server lokal
php artisan serve
