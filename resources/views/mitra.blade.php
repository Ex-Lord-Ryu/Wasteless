<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra - Wasteless</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        :root {
            --primary: #0D4A3E;
            --secondary: #00B67A;
            --light-bg: #E8F5F1;
        }

        body {
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: var(--primary);
            padding: 1rem 0;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
        }

        .nav-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-outline {
            border: 1px solid white;
            color: white;
        }

        .btn-primary {
            background: var(--secondary);
            color: white;
        }

        /* Hero Section */
        .hero {
            background-color: var(--primary);
            padding: 0;
            position: relative;
            overflow: hidden;
        }

        .hero-image {
            width: 100%;
            height: 850px;
            object-fit: cover;
            display: block;
            opacity: 0.7;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: left;
            color: white;
            width: 100%;
            max-width: 1200px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.1rem;
            max-width: 600px;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Features Section */
        .features {
            padding: 4rem 0;
            text-align: center;
            background-color: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--primary);
            font-weight: bold;
            margin: 0;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #333;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        .feature-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            height: 100%;
        }

        .feature-card.white {
            background: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .feature-card.green {
            background: var(--primary);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .feature-card.green .feature-icon {
            background-color: white;
        }

        .feature-card.white .feature-icon {
            background-color: var(--primary);
        }

        .feature-icon img {
            width: 30px;
            height: 30px;
        }

        .feature-card.white h3 {
            color: var(--primary);
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .feature-card.green h3 {
            color: white;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
            line-height: 1.4;
        }

        .feature-underline {
            width: 50px;
            height: 3px;
            margin: 10px 0 15px;
        }

        .feature-card.white .feature-underline {
            background-color: #e74c3c; /* Red color for white cards */
        }

        .feature-card.green .feature-underline {
            background-color: var(--secondary);
        }

        .feature-card.white p {
            color: #333;
            font-size: 0.85rem;
            line-height: 1.6;
            margin: 0;
        }

        .feature-card.green p {
            color: white;
            font-size: 0.85rem;
            line-height: 1.6;
            margin: 0;
        }

        /* Join Section */
        .join-section {
            padding: 4rem 0;
            background-color: #f9f9f9;
        }

        .join-container {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .join-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
        }

        .join-image img {
            width: 100%;
            display: block;
            border-radius: 10px;
        }

        .join-content {
            flex: 1;
        }

        .join-content h2 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .join-content p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .join-content .btn-primary {
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
        }

        /* Footer */
        footer {
            background: var(--primary);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            text-decoration: none;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: background 0.3s ease;
        }

        .social-links a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .social-links i {
            font-size: 20px;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        @media (max-width: 768px) {
            .hero-image {
                height: 400px;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .feature-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .join-container {
                flex-direction: column;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .feature-cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav class="container">
            <a href="/" class="logo"><img src="{{ asset('img/logo/logo.svg') }}" alt="Wasteless Logo"></a>
            <div class="nav-links">
                <a href="/">Beranda</a>
                <a href="/mitra">Mitra</a>
                <a href="#produk">Produk</a>
                <a href="/edukasi">Edukasi</a>
                <a href="/about">Tentang</a>
            </div>
            <div class="nav-buttons">
                <a href="/home" class="btn btn-outline">Sign In</a>
                <a href="/mitra/register" class="btn btn-primary">Gabung Mitra</a>
            </div>
        </nav>
    </header>

    <section class="hero">
        <img src="{{ asset('img/mitra/image/gambar_background.jpg') }}" alt="Mitra Hero" class="hero-image">
        <div class="hero-content">
            <h1>Dapatkan penghasilan<br>dari stok makanan berlebih</h1>
            <p>Kami percaya bahwa kolaborasi adalah kunci untuk menciptakan dampak yang lebih besar. Sebagai mitra kami, Anda akan menjadi bagian dari solusi berkelanjutan yang inovatif, membantu mengurangi limbah makanan dan menciptakan masa depan yang lebih baik.</p>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-header">
                <p>Jadilah bagian dari</p>
                <h2>WasteLess!</h2>
            </div>

            <div class="feature-cards">
                <div class="feature-card white">
                    <div class="feature-icon">
                        <img src="{{ asset('img/mitra/icons/User_cicrle.svg') }}" alt="User Circle Icon">
                    </div>
                    <h3>Meningkatkan Dampak Sosial</h3>
                    <div class="feature-underline"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>

                <div class="feature-card green">
                    <div class="feature-icon">
                        <img src="{{ asset('img/mitra/icons/world.svg') }}" alt="World Icon">
                    </div>
                    <h3>Kontribusi untuk misi lingkungan</h3>
                    <div class="feature-underline"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>

                <div class="feature-card white">
                    <div class="feature-icon">
                        <img src="{{ asset('img/mitra/icons/Globe.svg') }}" alt="Globe Icon">
                    </div>
                    <h3>Akses ke jaringan bisnis</h3>
                    <div class="feature-underline"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>

                <div class="feature-card green">
                    <div class="feature-icon">
                        <img src="{{ asset('img/mitra/icons/Chart.svg') }}" alt="Chart Icon">
                    </div>
                    <h3>Keuntungan Ekonomi dan Efisiensi Operasional</h3>
                    <div class="feature-underline"></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                </div>
            </div>
        </div>
    </section>

    <section class="join-section">
        <div class="container">
            <div class="join-container">
                <div class="join-image">
                    <img src="{{ asset('img/mitra/image/gambar_gabung_sekarang.jpg') }}" alt="Mitra Gabung Sekarang">
                </div>
                <div class="join-content">
                    <h2>Bergabunglah Bersama Wasteless - Hemat, Ramah Lingkungan, dan Berdampak Positif!</h2>
                    <p>Jadilah bagian dari solusi pengelolaan makanan berlebih dengan harga bersahabat.</p>
                    <p>Sebagai mitra Wasteless, Anda bisa berperan dalam mengurangi limbah dan menjaga bumi untuk generasi selanjutnya. Mari bergerak bersama, dan satu jadi peluang!</p>
                    <a href="/mitra/register" class="btn btn-primary">Gabung Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <a href="/" class="logo"><img src="{{ asset('img/logo/logo.svg') }}" alt="Wasteless Logo" style="margin-bottom: 20px"></a>
                    <p style="margin-bottom: 20px">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px">Contact us</h3>
                    <p style="margin-bottom: 10px">0895 3410 88617</p>
                    <p style="margin-bottom: 10px">foodwaste@gmail.com</p>
                    <p>Jln. Kembang Turi No. 9<br>Kota Malang 653784</p>
                </div>
                <div>
                    <h3 style="margin-bottom: 20px">Kritik Saran</h3>
                    <form>
                        <input type="text" placeholder="Nama" style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; border-radius: 5px; border: none;">
                        <input type="email" placeholder="Email" style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; border-radius: 5px; border: none;">
                        <textarea placeholder="Pesan" style="width: 100%; margin-bottom: 1rem; padding: 0.5rem; border-radius: 5px; border: none;"></textarea>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
            <div class="copyright">
                <p>Copyright 2024 | 4C Competition - All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
