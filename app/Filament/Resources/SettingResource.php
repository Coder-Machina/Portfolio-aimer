<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $modelLabel = 'Paramètre';

    protected static ?string $pluralModelLabel = 'Configuration du site';

    protected static ?string $navigationGroup = 'Configuration';

    protected static ?int $navigationSort = 10;

    public static function canCreate(): bool
    {
        return Setting::query()->count() === 0;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(['default' => 1, 'md' => 2])
            ->schema([
                Forms\Components\TextInput::make('site_name')
                    ->label('Nom du site')
                    ->required()
                    ->maxLength(150),

                Forms\Components\TextInput::make('contact_email')
                    ->label('Email de contact')
                    ->email()
                    ->required()
                    ->maxLength(150)
                    ->helperText('Adresse qui recevra les notifications de nouveaux messages.'),

                Forms\Components\TextInput::make('phone')
                    ->label('Numéro de téléphone')
                    ->tel()
                    ->maxLength(30)
                    ->placeholder('+229 01 40 89 06 34'),

                Forms\Components\TextInput::make('whatsapp_number')
                    ->label('Numéro WhatsApp')
                    ->maxLength(30)
                    ->helperText('Format international sans le +. Ex : 22901408906'),

                Forms\Components\FileUpload::make('cv_file')
                    ->label('Mon CV (PDF)')
                    ->disk('public')
                    ->directory('cv')
                    ->acceptedFileTypes(['application/pdf'])
                    ->helperText('Ton CV en PDF — sera téléchargeable depuis la page À propos.')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('social_links')
                    ->label('Réseaux sociaux')
                    ->schema([
                        Forms\Components\Select::make('platform')
                            ->label('Plateforme')
                            ->options([
                                'TikTok' => 'TikTok',
                                'WhatsApp' => 'WhatsApp',
                                'Instagram' => 'Instagram',
                                'YouTube' => 'YouTube',
                                'LinkedIn' => 'LinkedIn',
                                'GitHub' => 'GitHub',
                                'Twitter' => 'X / Twitter',
                                'Email' => 'Email',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('url')
                            ->label('Lien URL complet')
                            ->url()
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('meta_description')
                    ->label('Description pour Google (SEO)')
                    ->rows(3)
                    ->columnSpanFull()
                    ->helperText('Description générale du portfolio indexée par les moteurs de recherche.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Site'),
                Tables\Columns\TextColumn::make('contact_email')
                    ->label('Email'),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('WhatsApp'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
