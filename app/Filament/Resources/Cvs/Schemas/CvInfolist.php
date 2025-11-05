<?php

namespace App\Filament\Resources\Cvs\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Tables\Columns\TextColumn;

class CvInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ====================== DATA UTAMA ======================
                Section::make('Data Utama')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([
                            ImageEntry::make('photo')
                                ->label('Foto CV')
                                ->disk('public') // gunakan disk public
                                ->visibility('public')
                                ->circular() // biar tampil bulat
                                ->size(120)
                                ->extraAttributes(['class' => 'mx-auto']),
                            ImageEntry::make('payment_proof')
                                ->label('Bukti Pembayaran')
                                ->disk('public') // gunakan disk public
                                ->visibility('public')
                                ->circular() // biar tampil bulat
                                ->size(120)
                                ->extraAttributes(['class' => 'mx-auto']),

                            TextEntry::make('full_name')->label('Nama Lengkap'),
                            TextEntry::make('birth_date')->label('Tanggal Lahir')->date(),
                            TextEntry::make('gender')->label('Jenis Kelamin'),
                            TextEntry::make('phone')->label('Telepon'),
                            TextEntry::make('email')->label('Email'),
                        ]),
                        TextEntry::make('address')->label('Alamat')->columnSpanFull(),
                        TextEntry::make('summary')->label('Ringkasan Diri')->columnSpanFull(),
                        TextEntry::make('cv_type')
                            ->label('Jenis CV')
                            ->badge()
                            ->color(fn($state) => $state === 'pelaut' ? 'info' : 'success'),
                        ImageEntry::make('template.image')
                            ->label('Template')
                            ->disk('public')
                            ->size(50)// gunakan disk public
                            ->visibility('public')
                            ->width(250)
                            ->height('full')
                            ->extraAttributes(['class' => 'mx-auto']),
                        TextEntry::make('template.name')
                            ->label('Nama Template'),
                    ])
                    ->collapsible(),

                // ====================== PENDIDIKAN ======================
                Section::make('Pendidikan')
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        RepeatableEntry::make('educations')
                            ->label('Riwayat Pendidikan')
                            ->schema([
                                TextEntry::make('school_name')->label('Sekolah / Universitas'),
                                TextEntry::make('major')->label('Jurusan'),
                                TextEntry::make('degree')->label('Gelar'),
                                Grid::make(2)->schema([
                                    TextEntry::make('start_year')->label('Mulai'),
                                    TextEntry::make('end_year')->label('Selesai'),
                                ]),
                            ])
                            ->columns(1),
                    ])
                    ->collapsible(),

                // ====================== PENGALAMAN KERJA ======================
                Section::make('Pengalaman Kerja')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        RepeatableEntry::make('experiences')
                            ->label('Pengalaman Kerja')
                            ->schema([
                                TextEntry::make('company_name')->label('Perusahaan'),
                                TextEntry::make('position')->label('Posisi'),
                                Grid::make(2)->schema([
                                    TextEntry::make('start_date')->label('Mulai')->date(),
                                    TextEntry::make('end_date')->label('Selesai')->date(),
                                ]),
                                TextEntry::make('description')->label('Deskripsi'),
                            ])
                            ->columns(1),
                    ])
                    ->collapsible(),

                // ====================== PENGALAMAN BERLAYAR ======================
                Section::make('Pengalaman Berlayar')
                    ->icon('')
                    ->schema([
                        RepeatableEntry::make('seamanExperiences')
                            ->label('Pengalaman Berlayar')
                            ->schema([
                                TextEntry::make('vessel_name')->label('Nama Kapal'),
                                TextEntry::make('vessel_type')->label('Jenis Kapal'),
                                TextEntry::make('flag')->label('Bendera'),
                                TextEntry::make('rank')->label('Jabatan'),
                                TextEntry::make('gt')->label('GT'),
                                TextEntry::make('dwt')->label('DWT'),
                                TextEntry::make('engine')->label('Mesin'),
                                TextEntry::make('sign_on')->label('Tanggal Naik'),
                                TextEntry::make('sign_off')->label('Tanggal Turun'),
                                TextEntry::make('company')->label('Perusahaan'),
                                TextEntry::make('remarks')->label('Keterangan'),
                            ])
                            ->columns(1)
                    ])
                    ->collapsible(),

                // ====================== KEAHLIAN ======================
                Section::make('Keahlian (Skills)')
                    ->icon('heroicon-o-light-bulb')
                    ->schema([
                        RepeatableEntry::make('skills')
                            ->label('Daftar Skill')
                            ->schema([
                                TextEntry::make('skill_name')->label('Nama Skill'),
                                TextEntry::make('level')->label('Level'),
                            ])
                            ->columns(1),
                    ])
                    ->collapsible(),

                // ====================== BAHASA ======================
                Section::make('Bahasa')
                    ->icon('heroicon-o-language')
                    ->schema([
                        RepeatableEntry::make('languages')
                            ->label('Bahasa yang Dikuasai')
                            ->schema([
                                TextEntry::make('language_name')->label('Bahasa'),
                                TextEntry::make('proficiency')->label('Kemampuan'),
                            ])
                            ->columns(1),
                    ])
                    ->collapsible(),

                // ====================== SERTIFIKAT ======================
                Section::make('Sertifikat')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        RepeatableEntry::make('certificates')
                            ->label('Sertifikat Profesional')
                            ->schema([
                                TextEntry::make('certificate_name')->label('Nama Sertifikat'),
                                TextEntry::make('issuer')->label('Diterbitkan Oleh'),
                                TextEntry::make('issue_date')->label('Tanggal Terbit')->date(),
                            ])
                            ->columns(1),
                    ])
                    ->collapsible(),
            ]);
    }
}
