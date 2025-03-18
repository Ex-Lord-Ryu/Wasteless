<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edukasi - Wasteless</title>
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
            margin-bottom: 2rem;
        }

        .hero-card {
            background-image: url('{{ asset("img/news/ella-olsson-I-uYa5P-EgM-unsplash.jpg") }}');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            overflow: hidden;
            margin: 0 auto;
            max-width: 1160px;
            width: 100%;
            position: relative;
            aspect-ratio: 16/9;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }

        .hero-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(0,0,0,0.7));
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 4rem 2rem;
            max-width: 800px;
            width: 100%;
        }

        .hero-content h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .meta-info {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            color: white;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .meta-info span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-info i {
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .meta-info {
                flex-direction: column;
                gap: 1rem;
            }
        }

        /* Articles Grid */
        .articles {
            padding: 4rem 0;
        }

        .articles-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .article-card {
            display: flex;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-image {
            width: 160px;
            min-width: 160px;
            height: 100%;
            object-fit: cover;
        }

        .article-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            flex: 1;
        }

        .article-tag {
            display: inline-block;
            padding: 0.3rem 1rem;
            background: var(--light-bg);
            color: var(--primary);
            border-radius: 20px;
            font-size: 0.75rem;
            margin-bottom: 0.75rem;
            width: fit-content;
        }

        .article-title {
            font-size: 1.1rem;
            color: var(--primary);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .article-meta {
            color: #666;
            font-size: 0.8rem;
        }

        @media (max-width: 1024px) {
            .articles-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .trending-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .article-card {
                flex-direction: row;
            }

            .article-image {
                width: 160px;
                min-width: 160px;
                height: auto;
            }

            .article-content {
                padding: 1.2rem;
            }

            .trending-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }

            .trending-image-container {
                height: 180px;
            }
        }

        @media (max-width: 640px) {
            .trending-grid {
                grid-template-columns: 1fr;
            }

            .trending-image-container {
                height: 200px;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .view-all-btn {
                align-self: flex-end;
            }
        }

        /* Trending Section */
        .trending {
            padding: 4rem 0;
            background: white;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 0.8rem;
        }

        .section-header h2 {
            color: var(--primary);
            font-size: 1.5rem;
            position: relative;
            padding-left: 15px;
            font-weight: 600;
        }

        .section-header h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            height: 70%;
            width: 4px;
            background-color: var(--secondary);
        }

        .view-all-btn {
            color: #666;
            text-decoration: none;
            font-size: 0.8rem;
            border: 1px solid #ddd;
            padding: 0.3rem 0.8rem;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .view-all-btn:hover {
            background-color: #f5f5f5;
        }

        .trending-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .trending-card {
            position: relative;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .trending-card:hover {
            transform: translateY(-5px);
        }

        .trending-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .trending-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .trending-card:hover .trending-image {
            transform: scale(1.05);
        }

        .trending-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            display: inline-block;
            padding: 0.25rem 0.7rem;
            background: var(--light-bg);
            color: var(--primary);
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            z-index: 1;
            text-transform: uppercase;
        }

        .trending-content {
            padding: 1.2rem;
        }

        .trending-title {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 0.8rem;
            line-height: 1.4;
            font-weight: 600;
        }

        .trending-meta {
            color: #888;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            text-transform: uppercase;
        }

        .trending-meta span {
            display: flex;
            align-items: center;
        }

        /* Volunteer Section */
        .volunteer {
            padding: 4rem 0;
            background: white;
        }

        .volunteer-container {
            display: flex;
            align-items: center;
            gap: 4rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .volunteer-image {
            flex: 1;
        }

        .volunteer-image img {
            max-width: 100%;
            height: auto;
        }

        .volunteer-content {
            flex: 1;
        }

        .volunteer-content h2 {
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .volunteer-content p {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* Footer styles from welcome.blade.php */
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
            .articles-grid {
                grid-template-columns: 1fr;
            }

            .trending-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .volunteer-container {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 640px) {
            .trending-grid {
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
                    <h1>Makan Tak Habis, Bumi Menangis: Mengelola Food Waste Di Indonesia</h1>
                    <div class="meta-info">
                        <span>
                            <i class="fas fa-user"></i>
                            BY ADMIN
                        </span>
                        <span>
                            <i class="far fa-calendar"></i>
                            27 AGUSTUS, 2024
                        </span>
                        <span>
                            <i class="far fa-clock"></i>
                            20 MINS
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="articles">
        <div class="container">
            <div class="articles-grid">
                <article class="article-card">
                    <div class="article-content">
                        <span class="article-tag">BERITA</span>
                        <h3 class="article-title">Indonesia Peringkat 4 Food Waste Terbanyak Di Dunia</h3>
                        <div class="article-meta">
                            <span>27 AGUSTUS, 2024</span>
                        </div>
                    </div>
                    <img src="{{ asset('img/news/trending/tr_editor_img01.png') }}" alt="Food Waste Article" class="article-image">
                </article>

                <article class="article-card">
                    <div class="article-content">
                        <span class="article-tag">BERITA</span>
                        <h3 class="article-title">Darurat! Sampah Makanan Orang RI Tembus Ratusan Triliun</h3>
                        <div class="article-meta">
                            <span>27 AGUSTUS, 2024</span>
                        </div>
                    </div>
                    <img src="{{ asset('img/news/trending/tr_editor_img02.png') }}" alt="Food Donation" class="article-image">
                </article>

                <article class="article-card">
                    <div class="article-content">
                        <span class="article-tag">EDUKASI</span>
                        <h3 class="article-title">Apakah Food Waste Adalah Masalah Kita Semua?</h3>
                        <div class="article-meta">
                            <span>27 AGUSTUS, 2024</span>
                        </div>
                    </div>
                    <img src="{{ asset('img/news/trending/tr_editor_img03.png') }}" alt="Food Management" class="article-image">
                </article>
            </div>
        </div>
    </section>

    <section class="trending">
        <div class="container">
            <div class="section-header">
                <h2>Trending</h2>
                <a href="#" class="view-all-btn">VIEW ALL</a>
            </div>

            <div class="trending-grid">
                <article class="trending-card">
                    <div class="trending-image-container">
                        <span class="trending-tag">BERITA</span>
                        <img src="{{ asset('img/news/trending/tr_overlay_post02.png') }}" alt="Food Waste Tips" class="trending-image">
                    </div>
                    <div class="trending-content">
                        <h3 class="trending-title">Pebisnis Kuliner! Yuk, Pahami Cara Mencegah Food Waste</h3>
                        <div class="trending-meta">
                            <span>27 AUGUST, 2024</span>
                        </div>
                    </div>
                </article>

                <article class="trending-card">
                    <div class="trending-image-container">
                        <span class="trending-tag">EDUKASI</span>
                        <img src="{{ asset('img/news/trending/tr_overlay_post03.png') }}" alt="Food Management" class="trending-image">
                    </div>
                    <div class="trending-content">
                        <h3 class="trending-title">Pentingnya Pengelolaan Food Waste</h3>
                        <div class="trending-meta">
                            <span>27 AUGUST, 2024</span>
                        </div>
                    </div>
                </article>

                <article class="trending-card">
                    <div class="trending-image-container">
                        <span class="trending-tag">EDUKASI</span>
                        <img src="{{ asset('img/news/trending/tr_overlay_post04.png') }}" alt="Food Waste Reduction" class="trending-image">
                    </div>
                    <div class="trending-content">
                        <h3 class="trending-title">Ini 5 Cara Mengurangi Food Waste Yang Bisa Dilakukan</h3>
                        <div class="trending-meta">
                            <span>27 AUGUST, 2024</span>
                        </div>
                    </div>
                </article>

                <article class="trending-card">
                    <div class="trending-image-container">
                        <span class="trending-tag">BERITA</span>
                        <img src="{{ asset('img/news/trending/tr_overlay_post03.png') }}" alt="Food Waste Impact" class="trending-image">
                    </div>
                    <div class="trending-content">
                        <h3 class="trending-title">Penyebab Food Waste Dan Dampaknya</h3>
                        <div class="trending-meta">
                            <span>27 AUGUST, 2024</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <section class="volunteer">
        <div class="container">
            <div class="volunteer-container">
                <div class="volunteer-image">
                    <img src="{{ asset('img/news/happy jumping man showing v-sign.png') }}" alt="Volunteer">
                </div>
                <div class="volunteer-content">
                    <h2>Halo, Kami sedang mencari Volunteer untuk Waste Less!</h2>
                    <p>Kami membutuhkan individu yang bersemangat dan peduli terhadap isu food waste dan keberlanjutan. Jika Anda ingin berkontribusi dalam menciptakan dampak positif di masyarakat dan membantu mengedukasi orang lain tentang pentingnya pengelolaan sisa makanan, kami ingin mendengar dari Anda!</p>
                    <a href="#" class="btn btn-primary">Join Volunteer</a>
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
