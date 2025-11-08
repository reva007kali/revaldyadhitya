<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>The CV maker</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.png" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <link rel="stylesheet" href="css/style.css">
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css'])


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


</head>

<body class="bg-black p-4">

    <a href="https://wa.me/6289676863656" target="_blank" rel="noopener noreferrer"
        class="fixed right-4 bottom-6 z-50 flex items-center justify-center w-14 h-14 rounded-full shadow-lg transform transition hover:scale-105 focus:outline-none focus:ring-4 focus:ring-green-300"
        style="background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);" aria-label="Hubungi via WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor"
            aria-hidden="true">
            <path
                d="M20.52 3.48A11.89 11.89 0 0012 0C5.37 0 .02 5.35.02 12c0 2.11.56 4.18 1.62 6.02L0 24l6.21-1.62A11.93 11.93 0 0012 24c6.63 0 11.98-5.35 11.98-12 0-3.2-1.25-6.18-3.46-8.52zM12 21.6a9.56 9.56 0 01-4.9-1.32l-.35-.22-3.69.96.98-3.6-.23-.37A9.5 9.5 0 012.4 12c0-5.28 4.3-9.58 9.6-9.58 2.57 0 4.97.99 6.79 2.8 1.81 1.82 2.8 4.22 2.8 6.79 0 5.3-4.3 9.6-9.6 9.6z" />
            <path
                d="M18.2 15.07c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.18.2-.36.22-.66.07-.3-.15-1.27-.47-2.42-1.49-.9-.79-1.5-1.77-1.67-2.07-.17-.3-.02-.46.13-.61.13-.13.3-.34.45-.51.15-.17.2-.28.3-.47.1-.2 0-.38-.05-.53-.05-.15-.67-1.6-.92-2.19-.24-.57-.49-.5-.67-.51l-.57-.01c-.2 0-.52.07-.8.37-.28.3-1.06 1.03-1.06 2.5s1.09 2.9 1.24 3.1c.15.2 2.14 3.3 5.18 4.63 2.04.86 2.87.93 3.9.78 1.03-.15 1.77-.84 2.02-1.64.25-.8.25-1.48.18-1.63-.07-.15-.26-.25-.56-.4z" />
        </svg>
    </a>


    <!-- Navbar -->
    <header
        class="fixed w-full mx-auto top-0 left-1/2 rounded-b-2xl -translate-x-1/2 bg-white/70 backdrop-blur-sm border-[1px] border-white/40 shadow z-50">
        <div class="container mx-auto flex justify-between items-center py-2 px-4">
            <a href="/">
                <h1 class="text-2xl font-bold text-brand-primary">TheCvMaker<span class="text-zinc-800 text-xs">by
                        Reva</span>
                </h1>
            </a>
            <nav class="hidden md:flex space-x-8 font-medium">
                <a href="#fitur" class="hover:text-indigo-600 transition">Fitur</a>
                <a href="#harga" class="hover:text-indigo-600 transition">Harga</a>
                <a href="#testimoni" class="hover:text-indigo-600 transition">Testimoni</a>
                <a href="#kontak" class="hover:text-indigo-600 transition">Kontak</a>
            </nav>
            <a href="/cv-form"
                class="bg-brand-primary text-white text-xs md:text-sm px-5 py-2 rounded-full hover:bg-brand-secondary transition">Buat
                CV
                Sekarang</a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="grid relative md:grid-cols-2 gap-4 min-h-[95svh]">
        <div class="relative p-10 flex items-end  rounded-2xl overflow-hidden">
            <img class="absolute top-0 left-0 w-full h-full object-cover object-bottom" src="image/hero-bg.png"
                alt="hero-bg">
            <div class="absolute bottom-0 left-0 w-full h-2/3 bg-gradient-to-t from-brand-navy-darker to-transparent">
            </div>
            <div class="relative">
                <h1 class="text-4xl font-semibold text-white">CV Professional kurang dari 5 menit.</h1>
                <p class="text-white text-lg mb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo
                    eaque odit quaerat magni alias fuga dolor harum asperiores iure eos?</p>
                <div class="flex gap-4">
                    <a class="px-6 py-2 bg-brand-primary rounded-full text-white text-lg" href="/cv-form">Buat CV</a>
                    <a class="px-6 py-2 bg-brand-primary rounded-full text-white text-lg" href="/cv-form">Explore Desain
                        CV</a>
                </div>
            </div>
        </div>
        <div class="relative bg-brand-primary rounded-2xl overflow-hidden">
            <h1 class="text-white text-4xl absolute bottom-10 right-10">The CV Maker</h1>
            <img class="absolute bottom-20 left-0 object-cover object-center w-full" src="image/phone-mockup2.png"
                alt="">
        </div>
    </section>

    <section id="template" class="py-20 mt-4 px-6 bg-zinc-100 rounded-2xl">
        <h3 class="text-3xl font-bold text-brand-navy text-center mb-3">Desain CV <span
                class="text-brand-primary">Professional</span></h3>
        <p class="text-xl font-medium text-brand-navy text-center mb-12">Buat Cv dalam bahasa indonesia maupun bahasa
            inggris.</p>

        @livewire('template-slider')
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
    <section id="harga" class="py-20 my-4 rounded-2xl bg-brand-navy">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h3 class="text-3xl font-bold text-white mb-4">Paket Pembuatan CV Profesional</h3>
            <p class="mb-12 max-w-xl mx-auto text-white">
                Dapatkan CV profesional siap kirim hanya dengan harga terjangkau, termasuk revisi tanpa batas dan
                konsultasi interview gratis!
            </p>

            <div
                class="max-w-md mx-auto bg-white p-10 rounded-2xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                <h4 class="text-3xl font-bold mb-2 text-brand-primary">Paket CV Profesional</h4>
                <p class="text-gray-500 mb-6">Cocok untuk semua kalangan — fresh graduate hingga profesional
                    berpengalaman</p>

                <div class="text-4xl font-extrabold text-indigo-400 w-fit mx-auto mb-6 relative">
                    <div class="absolute top-1/2 left-0 w-full h-[2px] bg-red-700"></div>Rp25.000
                </div>
                <div class="text-4xl font-extrabold text-indigo-700 mb-6">Rp15.000</div>

                <ul class="text-sm text-gray-700 mb-8 space-y-3">
                    <li>✅ Desain CV Profesional & Modern</li>
                    <li>✅ File PDF Siap Kirim</li>
                    <li>✅ 3x Revisi Data & Desain</li>
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
    <footer class="bg-brand-primary rounded-2xl py-8 text-center text-white">
        <p>&copy; 2025 CvMaker.reva — Jasa Pembuatan CV Profesional.</p>
    </footer>
</body>

</html>
