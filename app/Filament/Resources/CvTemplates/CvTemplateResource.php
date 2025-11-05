<?php

namespace App\Filament\Resources\CvTemplates;

use App\Filament\Resources\CvTemplates\Pages\CreateCvTemplate;
use App\Filament\Resources\CvTemplates\Pages\EditCvTemplate;
use App\Filament\Resources\CvTemplates\Pages\ListCvTemplates;
use App\Filament\Resources\CvTemplates\Pages\ViewCvTemplate;
use App\Filament\Resources\CvTemplates\Schemas\CvTemplateForm;
use App\Filament\Resources\CvTemplates\Schemas\CvTemplateInfolist;
use App\Filament\Resources\CvTemplates\Tables\CvTemplatesTable;
use App\Models\CvTemplate;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CvTemplateResource extends Resource
{
    protected static ?string $model = CvTemplate::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CvTemplate';

    protected static ?string $navigationLabel = 'Template CV';

    protected static ?int $navigationSort = 2;





    public static function form(Schema $schema): Schema
    {
        return CvTemplateForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CvTemplateInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CvTemplatesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCvTemplates::route('/'),
            'create' => CreateCvTemplate::route('/create'),
            'view' => ViewCvTemplate::route('/{record}'),
            'edit' => EditCvTemplate::route('/{record}/edit'),
        ];
    }
}
