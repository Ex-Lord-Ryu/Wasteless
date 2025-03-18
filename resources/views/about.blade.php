<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Wasteless</title>
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

        /* About Section specific container */
        .about-container {
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

        /* About Section */
        .about-section {
            padding: 2rem 0 2.5rem;
            border-bottom: 1px solid #e5e5e5;
        }

        .about-header {
            margin-bottom: 0;
            display: flex;
            align-items: flex-start;
            gap: 5rem;
            padding-bottom: 0;
        }

        .about-header h1 {
            font-size: 2.5rem;
            color: var(--primary);
            min-width: 280px;
            flex-shrink: 0;
            margin: 0;
            font-weight: 600;
        }

        .about-description {
            color: #555;
            line-height: 1.7;
            font-size: 1rem;
            flex: 1;
            margin: 0;
        }

        /* Commitment Section */
        .commitment-section {
            padding: 2rem 0 4rem;
        }

        .commitment-header {
            margin-bottom: 2rem;
        }

        .commitment-header h2 {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .commitment-description {
            color: #666;
            line-height: 1.6;
            font-size: 1rem;
            margin-bottom: 2.5rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }

        .feature-box {
            background: #F6F6F6;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 1px 5px rgba(0,0,0,0.03);
            display: flex;
            align-items: flex-start;
            gap: 1.5rem;
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            min-width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            border: none;
            background-color: #E2F1E7;
        }

        .feature-icon img {
            width: 30px;
            height: 30px;
        }

        .feature-content h3 {
            color: var(--primary);
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .feature-content p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            padding: 3rem 0;
            position: relative;
        }

        .cta-card {
            background-color: #E8F5F1;
            border-radius: 10px;
            padding: 3rem 2rem;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }

        .cta-content {
            max-width: 600px;
            position: relative;
            z-index: 2;
        }

        .cta-content h2 {
            font-size: 2.2rem;
            color: var(--primary);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .cta-content p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 0;
        }

        .cta-button {
            position: relative;
            z-index: 2;
        }

        .cta-button .btn-primary {
            padding: 0.7rem 1.5rem;
            font-size: 0.9rem;
            background-color: var(--secondary);
            border: none;
            border-radius: 5px;
        }

        .cta-background {
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            object-fit: cover;
            opacity: 0.3;
        }

        /* Footer styles */
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
            .features-grid {
                grid-template-columns: 1fr;
            }

            .cta-card {
                flex-direction: column;
                text-align: center;
                padding: 2rem 1.5rem;
            }

            .cta-content {
                margin-bottom: 2rem;
            }

            .cta-background {
                width: 100%;
                opacity: 0.2;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .about-header {
                flex-direction: column;
                gap: 1.5rem;
            }

            .about-header h1 {
                min-width: auto;
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

    <section class="about-section">
        <div class="about-container">
            <div class="about-header">
                <h1>Tentang WasteLess</h1>
                <p class="about-description">
                    WasteLess adalah aplikasi berbasis web yang hadir sebagai solusi inovatif untuk mengatasi tantangan mendesak terkait food waste dan food loss. Kami percaya bahwa setiap makanan memiliki nilai, dan melalui platform ini, kami bertujuan untuk mengubah cara masyarakat memandang dan mengelola sumber daya makanan.
                </p>
            </div>
        </div>
    </section>

    <section class="commitment-section">
        <div class="container">
            <div class="commitment-header">
                <h2>Komitmen Kami</h2>
                <p class="commitment-description">
                    Di WasteLess, kami berkomitmen untuk meningkatkan kesadaran masyarakat tentang pentingnya pengelolaan makanan yang lebih bijaksana dan berkelanjutan. Kami menyediakan berbagai fitur dan strategi untuk membantu pengguna mengurangi limbah makanan, baik di tingkat individu maupun bisnis. Mulai dari pembelian makanan sisa dengan harga terjangkau hingga pengolahan limbah menjadi kompos, kami menawarkan solusi yang dapat diakses oleh semua orang.
                </p>
            </div>

            <div class="features-grid">
                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{ asset('img/about/icons/Book.svg') }}" alt="Icon Book">
                    </div>
                    <div class="feature-content">
                        <h3>Menjadi platform terdepan dalam pengurangan limbah makanan di Indonesia</h3>
                        <p>Menjadi platform terdepan dalam pengurangan limbah makanan di Indonesia, dengan mendorong terciptanya gaya hidup berkelanjutan dan memanfaatkan potensi limbah makanan untuk kebaikan lingkungan dan ekonomi.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{ asset('img/about/icons/Shop.svg') }}" alt="Icon Shopping">
                    </div>
                    <div class="feature-content">
                        <h3>Menyediakan marketplace digital</h3>
                        <p>Berkolaborasi dengan berbagai pihak, termasuk restoran, supermarket, dan komunitas lokal, untuk mengoptimalkan pengelolaan limbah makanan.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{ asset('img/about/icons/Horizontal_down_left_main.svg') }}" alt="Icon Horizontal Arrow">
                    </div>
                    <div class="feature-content">
                        <h3>Berkolaborasi dengan berbagai pihak</h3>
                        <p>Berkolaborasi dengan berbagai pihak, termasuk restoran, supermarket, dan komunitas lokal, untuk mengoptimalkan pengelolaan limbah makanan.</p>
                    </div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <img src="{{ asset('img/about/icons/Trash.svg') }}" alt="Icon Trash">
                    </div>
                    <div class="feature-content">
                        <h3>Memfasilitasi proses pengolahan limbah</h3>
                        <p>Memfasilitasi proses pengolahan limbah makanan menjadi kompos melalui fitur di dalam aplikasi, yang memungkinkan pengguna untuk mengelola sisa makanan dengan cara yang ramah lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <div class="cta-card">
                <div class="cta-content">
                    <h2>Turn Leftovers into Lifesavers</h2>
                    <p>Bersama, kita dapat mendukung pencapaian tujuan pembangunan berkelanjutan dan menciptakan masa depan di mana makanan tidak lagi terbuang sia-sia.</p>
                </div>
                <div class="cta-button">
                    <a href="#" class="btn btn-primary">Gabung Sekarang</a>
                </div>
                <img src="{{ asset('img/about/life-saver/arrow.jpg') }}" alt="Background Pattern" class="cta-background">
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
