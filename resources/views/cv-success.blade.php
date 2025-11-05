<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CV Telah Di Order</title>

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
                <a href="/#fitur" class="hover:text-indigo-600 transition">Fitur</a>
                <a href="/#harga" class="hover:text-indigo-600 transition">Harga</a>
                <a href="/#kontak" class="hover:text-indigo-600 transition">Kontak</a>
            </nav>
            <a href="/cv-form"
                class="bg-amber-600 text-white text-xs md:text-sm px-5 py-2 rounded-full hover:bg-amber-700 transition">Buat
                CV
                Sekarang</a>
        </div>
    </header>

    <div class="max-w-4xl mx-auto mt-16 p-8 bg-white shadow-2xl rounded-2xl border border-gray-200 text-gray-800">
        <div class="text-center space-y-6">
            <!-- Header -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-green-600">🎉 CV Berhasil Dipesan!</h1>
            <p class="text-lg md:text-xl text-gray-600">
                CV kamu akan dikirim maksimal <span class="font-semibold">24 jam</span> setelah checkout.
            </p>

            <!-- Urgent contact -->
            <p class="text-gray-700">
                Jika ada kebutuhan CV <span class="font-semibold text-red-500">urgent</span>, atau konsultasi mengenai tips interview hubungi kami di:
            </p>
            <a href="https://wa.me/6289676863656" target="_blank"
                class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 hover:scale-105 transform transition duration-300">
                💬 WhatsApp Kami
            </a>

            <!-- Revision info -->
            <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg text-left space-y-2">
                <p class="font-semibold text-green-700">Catatan Penting:</p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Maksimal ganti desain template <span class="font-semibold">1x</span></li>
                    <li>Maksimal revisi data <span class="font-semibold">3x</span>, lebih dari itu dikenakan biaya
                        tambahan</li>
                    <li>CV dikirim dalam <span class="font-semibold">bahasa Inggris</span></li>
                    <li>Jika ingin dalam <span class="font-semibold">bahasa Indonesia</span>, hubungi kami:</li>
                </ul>
                <a href="https://wa.me/6289676863656" target="_blank"
                    class="inline-block mt-2 px-6 py-2 bg-green-500 text-white font-semibold rounded-lg shadow hover:bg-green-600 transition duration-300">
                    💬 WhatsApp
                </a>
            </div>

            <!-- CTA -->
            <p class="text-gray-600 mt-4">Terima kasih sudah memesan CV di kami ya! 🙌</p>
        </div>
    </div>



    <footer class="bg-gray-900 text-gray-300 py-8 text-center">
        <p>&copy; 2025 CvMaker.reva — Jasa Pembuatan CV Profesional.</p>
    </footer>
</body>

</html>
