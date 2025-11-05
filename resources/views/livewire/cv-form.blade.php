<div class="max-w-5xl space-y-4 mx-auto py-10 px-6">
    {{-- Success Message --}}
    @if (session()->has('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-700 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="p-4 bg-emerald-700 text-white rounded">
        <h2 class="text-2xl font-semibold">Formulir Pembuatan CV</h2>
        <p class="text-xs">CV yang baik adalah CV yang “relevan, jelas, dan mudah dibaca.”</p>
    </div>

    <form wire:submit.prevent="save" class="space-y-8">

        <div class="space-y-6">
            <h2 class="text-xl font-bold">Pilih Template CV</h2>


            @if ($cv_template_id)
                @php
                    $selectedTemplate = $templates->firstWhere('id', $cv_template_id);
                @endphp
                <p class="text-green-600 font-semibold mb-2">
                    ✅ Template dipilih: {{ $selectedTemplate->name }}
                </p>
                <img src="{{ asset('storage/' . $selectedTemplate->image) }}" alt="{{ $selectedTemplate->name }}"
                    class="w-48 object-cover ring-2 ring-emerald-600 rounded-lg mx-auto border shadow">
            @endif

            <!-- Swiper Slider -->
            <div wire:ignore class="swiper mySwiper py-4">
                <div class="swiper-wrapper py-10">
                    @foreach ($templates as $template)
                        <div class="swiper-slide">
                            <div wire:click="$set('cv_template_id', {{ $template->id }})"
                                class="cursor-pointer
                                rounded-lg p-3 shadow hover:shadow-lg transition">
                                <img src="{{ asset('storage/' . $template->image) }}" alt="{{ $template->name }}"
                                    class="w-full  object-cover rounded-lg mb-2">
                                <h3 class="text-center font-semibold text-sm">{{ $template->name }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination & Navigation -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <input type="hidden" name="cv_template_id" wire:model="cv_template_id">
        </div>

        {{-- Personal Info --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">

            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Data Diri</h3>
            {{-- Foto --}}
            <div>
                <label class="block font-medium text-gray-700 mb-2">Foto profil cv</label>

                <div class="md:flex space-y-6 items-start gap-4">
                    {{-- Preview Foto --}}
                    <div class="relative">
                        @if ($photo)
                            <div class="relative group">
                                <img src="{{ $photo->temporaryUrl() }}"
                                    class="h-24 w-24 object-cover rounded-md border-4 border-white shadow-lg ring-2 ring-gray-200 transition-all duration-200 group-hover:ring-blue-400">

                                {{-- Loading Overlay --}}
                                <div wire:loading wire:target="photo"
                                    class="absolute inset-0 bg-black bg-opacity-50 rounded-md flex items-center justify-center">
                                    <svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        @else
                            <div
                                class="h-24 w-24 rounded-md bg-gradient-to-br from-gray-100 to-gray-200 border-4 border-white shadow-lg ring-2 ring-gray-200 flex items-center justify-center">
                                <svg class="h-10 w-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    {{-- Upload Button --}}
                    <div class="flex-1">
                        <label for="photo-upload" class="relative cursor-pointer">
                            <div
                                class="flex items-center justify-center px-4 py-3 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-400 hover:bg-blue-50 bg-white transition-all duration-200 group">
                                <div class="text-center">
                                    <svg class="mx-auto h-8 w-8 text-gray-400 group-hover:text-blue-500 transition-colors"
                                        stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path
                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <div class="mt-2 flex text-sm text-gray-600">
                                        <span class="font-medium text-blue-600 group-hover:text-blue-700">
                                            Upload foto
                                        </span>
                                        <span class="ml-1">atau drag & drop</span>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, GIF hingga 2MB</p>
                                </div>
                            </div>
                            <input id="photo-upload" type="file" wire:model="photo" class="sr-only" accept="image/*">
                        </label>

                        {{-- Loading Progress --}}
                        <div wire:loading wire:target="photo" class="mt-3">
                            <div class="flex items-center text-sm text-blue-600">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                <span>Mengupload foto...</span>
                            </div>
                        </div>

                        {{-- Error Message --}}
                        @error('photo')
                            <div class="mt-2 flex items-start">
                                <svg class="h-5 w-5 text-red-500 mr-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="grid md:grid-cols-2 gap-8">

                {{-- nama lengkap --}}
                <div>
                    <label class="flex flex-col gap-2">
                        <span>Nama Lengkap</span>
                        <input wire:model="full_name" type="text" placeholder="Tulis Nama Lengkap"
                            class="input" />
                    </label>
                    @error('full_name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- tanggal lahir --}}
                <div>
                    <label class="flex flex-col gap-2">
                        <span>Tanggal Lahir</span>
                        <input wire:model="birth_date" type="date" placeholder="" class="input" />
                    </label>
                    @error('birth_date')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                    <select wire:model="gender"
                        class="select w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Harap Pilih Tipe CV *</label>
                    <select wire:model="cv_type"
                        class="select w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                        <option value="umum">Umum</option>
                        <option value="pelaut">Pelaut</option>
                    </select>
                    @error('cv_type')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea wire:model="address"
                        class="textarea w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tentang Anda</label>
                    <textarea wire:model="summary"
                        class="textarea w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                    <p class="text-xs text-pink-500 italic">Jangan khuwatir, kita akan perbaiki agar professional.
                        Tulis saja bidang keahlian kamu. The rest we take care Ok!</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <input type="text" wire:model="phone" placeholder="081234XXX"
                        class="input w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" wire:model="email" placeholder="emailkamu@mail.com"
                        class="input w-full border-gray-300 rounded-md focus:ring-emerald-500 focus:border-emerald-500">
                </div>
            </div>
        </div>

        {{-- Pendidikan --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-700">🎓 Pendidikan</h3>
                <button type="button" wire:click="addItem('educations')"
                    class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
            </div>

            @foreach ($educations as $index => $education)
                <div class="border border-gray-200 rounded-lg p-4 relative">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Nama Sekolah *</label>
                            <input type="text" wire:model="educations.{{ $index }}.school_name"
                                class="input w-full border-gray-300 rounded-md">
                            @error("educations.$index.school_name")
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Jurusan</label>
                            <input type="text" wire:model="educations.{{ $index }}.major"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Gelar</label>
                            <input type="text" wire:model="educations.{{ $index }}.degree"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="block text-sm font-medium">Tahun Mulai</label>
                                <input type="number" wire:model="educations.{{ $index }}.start_year"
                                    class="input w-full border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Tahun Selesai</label>
                                <input type="number" wire:model="educations.{{ $index }}.end_year"
                                    class="input w-full border-gray-300 rounded-md">
                            </div>
                        </div>
                    </div>
                    <button type="button" wire:click="removeItem('educations', {{ $index }})"
                        class="bg-red-500 rounded text-white my-2 px-4 py-2">✕ Hapus</button>
                    <button type="button" wire:click="addItem('educations')"
                        class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                </div>
            @endforeach
        </div>

        {{-- Pengalaman --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-700">💼 Pengalaman Kerja</h3>
                <button type="button" wire:click="addItem('experiences')"
                    class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
            </div>

            @foreach ($experiences as $index => $exp)
                <div class="border border-gray-200 rounded-lg p-4 relative">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Nama Perusahaan *</label>
                            <input type="text" wire:model="experiences.{{ $index }}.company_name"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Posisi</label>
                            <input type="text" wire:model="experiences.{{ $index }}.position"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tanggal Mulai</label>
                            <input type="date" wire:model="experiences.{{ $index }}.start_date"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Tanggal Selesai</label>
                            <input type="date" wire:model="experiences.{{ $index }}.end_date"
                                class="input w-full border-gray-300 rounded-md">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Job Desk singkat</label>
                            <textarea wire:model="experiences.{{ $index }}.description"
                                class="textarea w-full border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                    <button type="button" wire:click="removeItem('experiences', {{ $index }})"
                        class="bg-red-500 rounded text-white my-2 px-4 py-2">✕ Hapus</button>
                    <button type="button" wire:click="addItem('experiences')"
                        class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                </div>
            @endforeach
        </div>

        {{-- Skills --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-700">⚙️ Keahlian</h3>
                <button type="button" wire:click="addItem('skills')"
                    class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
            </div>

            @foreach ($skills as $index => $skill)
                <div class="md:flex items-center gap-4 border border-gray-200 rounded-lg p-4">
                    <input type="text" wire:model="skills.{{ $index }}.skill_name"
                        placeholder="Nama Skill" class="input flex-1 border-gray-300 rounded-md">
                    <input type="text" wire:model="skills.{{ $index }}.level"
                        placeholder="Tingkat (Beginner, Expert...)" class="input flex-1 border-gray-300 rounded-md">
                    <button type="button" wire:click="removeItem('skills', {{ $index }})"
                        class="bg-red-500 rounded text-white my-2 px-4 py-2">✕ Hapus</button>
                    <button type="button" wire:click="addItem('skills')"
                        class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                </div>
            @endforeach
        </div>

        {{-- Languages --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-700">🌐 Bahasa</h3>
                <button type="button" wire:click="addItem('languages')"
                    class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
            </div>

            @foreach ($languages as $index => $lang)
                <div class="md:flex items-center gap-4 border border-gray-200 rounded-lg p-4">
                    <input type="text" wire:model="languages.{{ $index }}.language_name"
                        placeholder="Bahasa" class="input flex-1 border-gray-300 rounded-md">
                    <input type="text" wire:model="languages.{{ $index }}.proficiency"
                        placeholder="Tingkat (Fluent, Intermediate...)"
                        class="input flex-1 border-gray-300 rounded-md">
                    <div>
                        <button type="button" wire:click="removeItem('languages', {{ $index }})"
                            class="bg-red-500 rounded text-white my-2 px-4 py-2">✕ Hapus</button>
                        <button type="button" wire:click="addItem('languages')"
                            class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Certificates --}}
        <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-semibold text-gray-700">📜 Sertifikat & Dokumen</h3>
                <button type="button" wire:click="addItem('certificates')"
                    class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
            </div>

            @foreach ($certificates as $index => $cert)
                <div class="border border-gray-200 rounded-lg p-4 relative">
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" wire:model="certificates.{{ $index }}.certificate_name"
                            placeholder="Nama Sertifikat / Dokumen *" class="input border-gray-300 rounded-md">
                        <input type="text" wire:model="certificates.{{ $index }}.certificate_number"
                            placeholder="Nomor Sertifikat" class="input border-gray-300 rounded-md">
                        <input type="text" wire:model="certificates.{{ $index }}.issuer"
                            placeholder="Penerbit / Tempat pembuatan" class="input border-gray-300 rounded-md">
                        <input type="date" placeholder="tanggal"
                            wire:model="certificates.{{ $index }}.issue_date"
                            class="input border-gray-300 rounded-md">
                    </div>
                    <div>
                        <button type="button" wire:click="removeItem('certificates', {{ $index }})"
                            class="bg-red-500 rounded text-white my-2 px-4 py-2">✕ Hapus</button>
                        <button type="button" wire:click="addItem('certificates')"
                            class="px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pengalaman Pelaut (khusus jika cv_type == pelaut) --}}
        @if ($cv_type === 'pelaut')
            <div class="bg-emerald-100 shadow rounded-lg p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-700">⚓ Pengalaman Berlayar</h3>
                    <button type="button" wire:click="addItem('seaman_experiences')"
                        class="px-3 py-1 bg-emerald-600 text-white rounded hover:bg-emerald-700">+ Tambah</button>
                </div>

                @foreach ($seaman_experiences as $index => $sea)
                    <div class="border border-gray-200 rounded-lg p-4 relative">

                        <button type="button" wire:click="removeItem('seaman_experiences', {{ $index }})"
                            class="absolute top-2 right-2 text-red-500 hover:text-red-700">✕</button>

                        <div class="grid md:grid-cols-3 gap-4">
                            <input type="text" wire:model="seaman_experiences.{{ $index }}.vessel_name"
                                placeholder="Nama Kapal *" class="input border-gray-300 rounded-md">

                            <input type="text" wire:model="seaman_experiences.{{ $index }}.vessel_type"
                                placeholder="Tipe Kapal cth: Pesiar,Tanker..."
                                class="input border-gray-300 rounded-md">

                            <input type="text" wire:model="seaman_experiences.{{ $index }}.flag"
                                placeholder="Bendera Kapal, jika tahu" class="input border-gray-300 rounded-md">

                            <input type="text" wire:model="seaman_experiences.{{ $index }}.rank"
                                placeholder="Pangkat / Posisi" class="input border-gray-300 rounded-md">

                            <input type="number" wire:model="seaman_experiences.{{ $index }}.gt"
                                placeholder="Gross Tonage , Jika tahu" class="input border-gray-300 rounded-md">

                            <input type="number" wire:model="seaman_experiences.{{ $index }}.dwt"
                                placeholder="DWT, Jika tahu" class="input border-gray-300 rounded-md">

                            <input type="text" wire:model="seaman_experiences.{{ $index }}.engine"
                                placeholder="Jenis Mesin, Jika tahu" class="input border-gray-300 rounded-md">

                            <label for="sign_on">Sign on Date</label>
                            <input type="date" wire:model="seaman_experiences.{{ $index }}.sign_on"
                                class="input border-gray-300 rounded-md">

                            <label for="sign_on">Sign off Date</label>
                            <input type="date" wire:model="seaman_experiences.{{ $index }}.sign_off"
                                class="input border-gray-300 rounded-md">

                            <input type="text" wire:model="seaman_experiences.{{ $index }}.company"
                                placeholder="Nama Perusahaan" class="input border-gray-300 rounded-md">

                            <textarea wire:model="seaman_experiences.{{ $index }}.remarks" placeholder="Tambahkan catatan jika ada"
                                class="textarea md:col-span-3 border-gray-300 rounded-md"></textarea>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Bukti Pembayaran --}}
        <div class="bg-gradient-to-br from-white to-emerald-50 shadow-lg rounded-xl p-6 border border-emerald-100">
            <div class="flex items-center mb-4">
                <span class="text-2xl mr-2">💳</span>
                <h3 class="text-xl font-bold text-gray-800">Bukti Pembayaran</h3>
            </div>

            <div class="flex items-start gap-4">
                {{-- Preview Bukti Pembayaran --}}
                <div class="relative">
                    @if ($payment_proof)
                        <div class="relative group">
                            <img src="{{ $payment_proof->temporaryUrl() }}"
                                class="h-32 w-32 object-cover rounded-lg border-4 border-white shadow-lg ring-2 ring-emerald-200 transition-all duration-200">

                            {{-- Loading Overlay --}}
                            <div wire:loading wire:target="payment_proof"
                                class="absolute inset-0 bg-black bg-opacity-50 rounded-lg flex items-center justify-center">
                                <svg class="animate-spin h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    @else
                        <div
                            class="h-32 w-32 rounded-lg bg-gradient-to-br from-emerald-100 to-emerald-200 border-4 border-white shadow-lg ring-2 ring-emerald-200 flex items-center justify-center">
                            <svg class="h-12 w-12 text-emerald-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                </path>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Upload Area --}}
                <div class="flex-1">
                    <label for="payment-proof-upload" class="relative cursor-pointer">
                        <div
                            class="flex items-center justify-center px-4 py-4 border-2 border-dashed border-emerald-300 rounded-lg hover:border-emerald-500 hover:bg-emerald-50 transition-all duration-200 group">
                            <div class="text-center">
                                <svg class="mx-auto h-10 w-10 text-emerald-400 group-hover:text-emerald-600 transition-colors"
                                    stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <div class="mt-2 flex text-sm text-gray-600 justify-center">
                                    <span class="font-medium text-emerald-600 group-hover:text-emerald-700">
                                        Upload bukti pembayaran
                                    </span>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">PNG, JPG hingga 5MB</p>
                            </div>
                        </div>
                        <input id="payment-proof-upload" type="file" wire:model="payment_proof" class="sr-only"
                            accept="image/*">
                    </label>

                    {{-- Loading Progress --}}
                    <div wire:loading wire:target="payment_proof" class="mt-3">
                        <div
                            class="flex items-center justify-center text-sm text-emerald-600 bg-emerald-50 rounded-lg p-3 border border-emerald-200">
                            <svg class="animate-spin -ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="font-medium">Mengupload bukti pembayaran...</span>
                        </div>
                    </div>

                    {{-- Success Message --}}
                    <div wire:loading.remove wire:target="payment_proof">
                        @if ($payment_proof)
                            <div
                                class="mt-3 flex items-center text-sm text-emerald-600 bg-emerald-50 rounded-lg p-3 border border-emerald-200">
                                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">Bukti pembayaran berhasil diupload!</span>
                            </div>
                        @endif
                    </div>

                    {{-- Error Message --}}
                    @error('payment_proof')
                        <div class="mt-3 flex items-start bg-red-50 rounded-lg p-3 border border-red-200">
                            <svg class="h-5 w-5 text-red-500 mr-2 flex-shrink-0 mt-0.5" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 w-full md:w-fit py-4 bg-gradient-to-r from-green-500 to-green-700 text-white font-semibold rounded-lg shadow-lg 
               hover:from-green-600 hover:to-green-800 hover:scale-105 transform transition duration-300 
               focus:outline-none focus:ring-4 focus:ring-green-300">
                💾 Simpan CV
            </button>
        </div>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            },
        },
        preventClicks: true, // penting supaya klik card tetap jalan
        preventClicksPropagation: true,
    });
</script>
