<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $modelLabel = 'À propos';

    protected static ?string $pluralModelLabel = 'À propos';

    protected static ?string $navigationGroup = 'Site public';

    protected static ?int $navigationSort = 6;

    public static function canCreate(): bool
    {
        return About::query()->count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\FileUpload::make('photo')
                    ->label('Ma photo de profil')
                    ->image()
                    ->disk('public')
                    ->directory('about')
                    ->imagePreviewHeight('200')
                    ->helperText('Photo professionnelle — sera automatiquement optimisée en WebP.'),

                Forms\Components\Textarea::make('bio')
                    ->label('Ma biographie')
                    ->required()
                    ->rows(8)
                    ->helperText('Présentation complète de votre parcours, de votre approche et de vos compétences.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Photo')
                    ->circular(),

                Tables\Columns\TextColumn::make('bio')
                    ->label('Biographie')
                    ->limit(80),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
