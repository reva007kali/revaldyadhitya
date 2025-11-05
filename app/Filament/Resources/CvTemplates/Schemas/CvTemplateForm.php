<?php

namespace App\Filament\Resources\CvTemplates\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class CvTemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('cv-templates')
                    ->image()
                    ->required(),
                Select::make('category')
                    ->options([
                        'ATS Friendly',
                        'Regular',
                        'Creative',
                    ]),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
