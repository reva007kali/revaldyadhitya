<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CV Maker by Reva</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-white">

    <!-- Navbar -->
    <header class="fixed w-full top-0 bg-white/80 backdrop-blur-md shadow z-50">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="/">
                <h1 class="text-2xl font-bold text-amber-600">CVmaker<span class="text-gray-800 text-xs">by Reva</span>
                </h1>
            </a>
            <nav class="hidden md:flex space-x-8 font-medium">
                <a href="#fitur" class="hover:text-indigo-600 transition">Fitur</a>
                <a href="#harga" class="hover:text-indigo-600 transition">Harga</a>
                <a href="#testimoni" class="hover:text-indigo-600 transition">Testimoni</a>
                <a href="#kontak" class="hover:text-indigo-600 transition">Kontak</a>
            </nav>
            <a href="/cv-form"
                class="bg-amber-600 text-white text-xs md:text-sm px-5 py-2 rounded-full hover:bg-amber-700 transition">Buat
                CV
                Sekarang</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section
        class="text-center min-h-screen flex-col items-center flex lg:justify-end justify-center py-20 bg-[url('/public/image/hero-bg.png')] bg-cover bg-top text-white">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-shadow-gray-900 text-shadow-lg">CV Profesional dalam
                Hitungan Menit</h2>
            <p class="text-lg md:text-xl mb-8 text-shadow-gray-900 text-shadow-lg">Dibuat oleh tim ahli HR dan desain,
                agar kamu tampil menonjol di mata
                rekruter.</p>
            <a href="cv-form"
                class="bg-white text-amber-600 px-8 py-3 rounded-full text-lg font-semibold shadow hover:bg-amber-500 hover:text-white">
                Buat CV
            </a>
        </div>
    </section>

    <section id="template" class="py-20 max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">ATS & Regular CV</h3>
        <div class="grid md:grid-cols-4 gap-8">
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/1.png" alt="">
            </div>
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/2.png" alt="">
            </div>
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/3.png" alt="">
            </div>
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/4.png" alt="">
            </div>
        </div>
    </section>

    <section id="template" class="py-20 max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Custom & Creative CV</h3>
        <div class="grid md:grid-cols-4 gap-8">
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/5.png" alt="">
            </div>
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/6.png" alt="">
            </div>
            <div
                class="overflow-hidden hover:shadow-xl transition rounded-2xl shadow-lg hover:border-amber-600 border-2 border-gray-200">
                <img src="image/cv-template/7.png" alt="">
            </div>
            <div class="overflow-hidden rounded-2xl shadow-xl border-2 border-gray-200">
                <img src="image/cv-template/8.png" alt="">
            </div>
        </div>
    </section>

    <!-- Fitur Section -->
    {{-- <section id="fitur" class="py-20 container mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Kenapa Pilih Kami?</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow p-8 hover:shadow-lg transition">
                <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" class="w-16 mb-4"
                    alt="Desain Premium">
                <h4 class="text-xl font-semibold mb-2">Desain Premium</h4>
                <p>Template elegan, modern, dan sesuai tren HR terkini.</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-8 hover:shadow-lg transition">
                <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" class="w-16 mb-4"
                    alt="Mudah Digunakan">
                <h4 class="text-xl font-semibold mb-2">Mudah Digunakan</h4>
                <p>Isi formulir, lihat preview langsung, dan download CV kamu.</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-8 hover:shadow-lg transition">
                <img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png" class="w-16 mb-4"
                    alt="Support Cepat">
                <h4 class="text-xl font-semibold mb-2">Support Cepat</h4>
                <p>Tim kami siap bantu kamu 24 jam melalui chat dan WhatsApp.</p>
            </div>
        </div>
    </section> --}}

    <!-- Harga Section -->
    <section id="harga" class="py-20 bg-amber-200">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold mb-4">Paket Pembuatan CV Profesional</h3>
            <p class="text-gray-600 mb-12 max-w-xl mx-auto">
                Dapatkan CV profesional siap kirim hanya dengan harga terjangkau, termasuk revisi tanpa batas dan
                konsultasi interview gratis!
            </p>

            <div
                class="max-w-md mx-auto bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                <h4 class="text-3xl font-bold mb-2 text-amber-600">Paket CV Profesional</h4>
                <p class="text-gray-500 mb-6">Cocok untuk semua kalangan — fresh graduate hingga profesional
                    berpengalaman</p>

                <div class="text-4xl font-extrabold text-indigo-400 w-fit mx-auto mb-6 relative">
                    <div class="absolute top-1/2 left-0 w-full h-[2px] bg-red-700"></div>Rp25.000
                </div>
                <div class="text-4xl font-extrabold text-indigo-700 mb-6">Rp15.000</div>

                <ul class="text-sm text-gray-700 mb-8 space-y-3">
                    <li>✅ Desain CV Profesional & Modern</li>
                    <li>✅ File PDF Siap Kirim</li>
                    <li>✅ Revisi Tanpa Batas</li>
                    <li>✅ Konsultasi Interview Gratis</li>
                    <li>✅ Pengiriman Cepat (1x24 Jam)</li>
                </ul>

                <a href="/cv-form"
                    class="inline-block bg-indigo-600 text-white px-8 py-3 rounded-full text-lg font-semibold hover:bg-indigo-700 transition">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </section>



    <!-- Testimoni -->
    {{-- <section id="testimoni" class="py-20 container mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Apa Kata Mereka</h3>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="italic mb-4">“Desainnya keren banget, HR langsung notice waktu interview!”</p>
                <h5 class="font-semibold">— Rizky, Marketing</h5>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="italic mb-4">“Proses cepat banget dan hasilnya rapi. Worth it banget!”</p>
                <h5 class="font-semibold">— Dini, Akuntan</h5>
            </div>
            <div class="bg-white rounded-2xl shadow p-6">
                <p class="italic mb-4">“BuatCV.id bantu aku dapetin kerjaan impian di startup.”</p>
                <h5 class="font-semibold">— Yoga, Developer</h5>
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8 text-center">
        <p>&copy; 2025 CvMaker.reva — Jasa Pembuatan CV Profesional.</p>
    </footer>
</body>

</html>
