<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wasteless - Kurangi Food Waste</title>
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
            position: relative;
            background: linear-gradient(to bottom, var(--primary) 50%, white 50%);
            padding: 4rem 0;
            display: flex;
            align-items: center;
        }

        .hero-card {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            max-width: 1160px;
            width: 100%;
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 4rem;
        }

        .hero-text {
            flex: 1;
            padding-right: 2rem;
        }

        .hero-text h1 {
            font-size: 2.8rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-text p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
        }

        .hero-buttons .btn {
            padding: 0.8rem 1.5rem;
            font-weight: 500;
            border-radius: 8px;
        }

        .hero-buttons .btn-primary {
            background: var(--secondary);
            color: white;
            border: none;
        }

        .hero-buttons .btn-outline {
            border: 2px solid var(--secondary);
            color: var(--secondary);
            background: transparent;
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
        }

        /* Stats Section */
        .stats {
            padding: 4rem 0;
            text-align: center;
        }

        .stats h2 {
            margin-bottom: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .stat-item {
            padding: 1rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary);
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
        }

        .feature-card {
            background: var(--light-bg);
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
        }

        /* Products Section */
        .products {
            padding: 4rem 0;
            background: var(--light-bg);
        }

        .section-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            padding: 1rem;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1.5rem;
        }

        .product-info {
            text-align: center;
            width: 100%;
        }

        .product-info h3 {
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .product-info .btn {
            background: var(--secondary);
            color: white;
            padding: 0.6rem 2rem;
            border-radius: 8px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .product-info .btn:hover {
            background: #009966;
        }

        /* Partners Section */
        .partners {
            padding: 4rem 0;
        }

        .partners-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 2rem;
            align-items: center;
        }

        .partner-logo {
            max-width: 150px;
            height: auto;
        }

        /* Testimonials Section */
        .testimonials {
            position: relative;
            padding: 4rem 0;
            background: linear-gradient(to bottom, white 50%, var(--primary) 50%);
        }

        .testimonial-card {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1;
        }

        .testimonial-card h2 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .testimonial-card .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .quote-icon {
            color: var(--primary);
            opacity: 0.2;
            font-size: 3rem;
            margin: 1rem 0;
        }

        .testimonial-text {
            color: #666;
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 2rem auto;
            max-width: 800px;
        }

        .company-name {
            color: var(--primary);
            font-size: 1.5rem;
            margin: 1.5rem 0;
            font-weight: 600;
        }

        .star-rating {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem 0;
        }

        .star-rating .star {
            color: #FFD700;
            font-size: 1.5rem;
        }

        .testimonial-avatars {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
            position: relative;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .avatar.active {
            width: 80px;
            height: 80px;
            border: 3px solid var(--secondary);
        }

        .testimonial-nav {
            position: absolute;
            width: 100%;
            display: flex;
            justify-content: space-between;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 2rem;
        }

        .nav-button {
            background: var(--secondary);
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 1.2rem;
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
            .hero {
                padding: 2rem 1rem;
            }

            .hero-card {
                padding: 2rem;
            }

            .hero-content {
                flex-direction: column;
                gap: 2rem;
            }

            .hero-text {
                padding-right: 0;
            }

            .hero-text h1 {
                font-size: 2rem;
            }
            .stats-grid,
            .features-grid,
            .products-grid,
            .partners-grid,
            .footer-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1024px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .partners-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 640px) {
            .products-grid {
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
        <div class="container">
            <div class="hero-card">
                <div class="hero-content">
                    <div class="hero-text">
                        <h1>Kurangi Food Waste,<br>Selamatkan Planet Kita</h1>
                        <p>Bersama Wasteless, Kita Bisa Mengurangi Pemborosan Makanan dan Menciptakan Dunia yang Lebih Berkelanjutan.</p>
                        <div class="hero-buttons">
                            <a href="/mitra/register" class="btn btn-primary">Gabung Jadi Mitra</a>
                            <a href="#" class="btn btn-outline">Donate</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('img/landing_page/gambar1.png') }}" alt="Food waste illustration">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="container">
            <h2>Kenapa harus memakai WasteLess?</h2>
            <p>Dampak dari pemanfaatan Food Waste</p>

            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">100k Ton</div>
                    <p>Makanan Diselamatkan</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">3,500 ton CO2</div>
                    <p>Jumlah emisi CO2 yang dicegah</p>
                </div>
                <div class="stat-item">
                    <div class="stat-number">10%</div>
                    <p>Pengguna tidak menggunakan plastik</p>
                </div>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <img width="100" height="100" src="https://img.icons8.com/ios-glyphs/100/box-search-1.png" alt="Search icon">
                    <h3>Cari produk olahan makanan sesuai kebutuhan</h3>
                </div>
                <div class="feature-card">
                    <img width="100" height="100" src="https://img.icons8.com/ios-glyphs/100/deliver-food.png" alt="Delivery icon">
                    <h3>Pilih metode pengantaran atau bisa diambil sendiri</h3>
                </div>
                <div class="feature-card">
                    <img width="100" height="100" src="https://img.icons8.com/ios-glyphs/100/exchange--v1.png"  alt="Payment icon">
                    <h3>Pilih pembayaran dengan metode yang tersedia</h3>
                </div>
                <div class="feature-card">
                    <img width="100" height="100" src="https://img.icons8.com/ios-glyphs/100/order-completed.png" alt="order icon">
                    <h3>Ambil pesanan atau tunggu pesanan datang</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="section-header">
                <h2>Produk Populer</h2>
                <p>Produk paling populer dari kami</p>
            </div>

            <div class="products-grid">
                <div class="product-card">
                    <img src="{{ asset('img/landing_page/Makanan/Manisan-Kulit-Jeruk.png') }}" alt="Manisan Kulit Jeruk">
                    <div class="product-info">
                        <h3>Manisan Kulit<br>Jeruk</h3>
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('img/landing_page/Makanan/Keripik-Kulit-Kentang.png') }}" alt="Keripik Kulit Kentang">
                    <div class="product-info">
                        <h3>Keripik Kulit<br>Kentang</h3>
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('img/landing_page/Makanan/Selai-Kulit-Semangka.png') }}" alt="Selai Kulit Semangka">
                    <div class="product-info">
                        <h3>Selai Kulit<br>Semangka</h3>
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>
                <div class="product-card">
                    <img src="{{ asset('img/landing_page/Makanan/Kaldu-dari-Sisa-Sayuran.png') }}" alt="Kaldu dari Sisa Sayuran">
                    <div class="product-info">
                        <h3>Kaldu dari<br>Sisa Sayuran</h3>
                        <a href="#" class="btn">Details</a>
                    </div>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="#" class="btn btn-primary">Lihat semua produk</a>
            </div>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <div class="section-header">
                <h2>Mitra Kerjasama</h2>
                <p>Beberapa perusahaan yang telah menjadi mitra kami</p>
            </div>

            <div class="partners-grid">
                @for ($i = 1; $i <= 10; $i++)
                    <img src="{{ asset('img/landing_page/mitra/' . $i . '.png') }}" alt="Partner {{ $i }}" class="partner-logo">
                @endfor
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <div class="testimonial-card">
                <h2>Testimoni Pelanggan</h2>
                <p class="subtitle">Beberapa testimoni dari pelanggan dan mitra kami</p>

                <div class="quote-icon">
                    <i class="fas fa-quote-right"></i>
                </div>

                <p class="testimonial-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                <h3 class="company-name">PT. Sukses Makmur</h3>

                <div class="star-rating">
                    <span class="star"><i class="fas fa-star"></i></span>
                    <span class="star"><i class="fas fa-star"></i></span>
                    <span class="star"><i class="fas fa-star"></i></span>
                    <span class="star"><i class="fas fa-star"></i></span>
                    <span class="star"><i class="fas fa-star"></i></span>
                </div>

                <div class="testimonial-avatars">
                    <div class="testimonial-nav">
                        <button class="nav-button"><i class="fas fa-chevron-left"></i></button>
                        <button class="nav-button"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <img src="{{ asset('img/landing_page/testimoni/1.png') }}" alt="Testimonial 1" class="avatar">
                    <img src="{{ asset('img/landing_page/testimoni/2.png') }}" alt="Testimonial 2" class="avatar">
                    <img src="{{ asset('img/landing_page/testimoni/3.png') }}" alt="Testimonial 3" class="avatar active">
                    <img src="{{ asset('img/landing_page/testimoni/4.png') }}" alt="Testimonial 4" class="avatar">
                    <img src="{{ asset('img/landing_page/testimoni/5.png') }}" alt="Testimonial 5" class="avatar">
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
                    <p style="margin-bottom: 10px">0858 3450 8837</p>
                    <p style="margin-bottom: 10px">foodwaste@gmail.com</p>
                    <p>Jln. Kembang Tori No. 9<br>Kota Malang 651245</p>
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
                <p>Copyright 2024 | KC Competition - All Rights Reserved</p>
            </div>
        </div>
    </footer>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
