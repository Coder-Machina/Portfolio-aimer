<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $modelLabel = 'Témoignage';

    protected static ?string $pluralModelLabel = 'Témoignages clients';

    protected static ?string $navigationGroup = 'Site public';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(['default' => 1, 'md' => 2])
            ->schema([
                Forms\Components\TextInput::make('client_name')
                    ->label('Nom du client / Entreprise')
                    ->required()
                    ->maxLength(100),

                Forms\Components\Select::make('specialty_id')
                    ->relationship('specialty', 'name')
                    ->label('Domaine concerné')
                    ->nullable()
                    ->native(false)
                    ->helperText('Laissez vide s\'il s\'agit d\'un avis global.'),

                Forms\Components\Select::make('rating')
                    ->label('Note')
                    ->options([
                        5 => '⭐⭐⭐⭐⭐ (5/5)',
                        4 => '⭐⭐⭐⭐ (4/5)',
                        3 => '⭐⭐⭐ (3/5)',
                        2 => '⭐⭐ (2/5)',
                        1 => '⭐ (1/5)',
                    ])
                    ->default(5)
                    ->required()
                    ->native(false),

                Forms\Components\Toggle::make('is_visible')
                    ->label('Visible sur le site')
                    ->default(true),

                Forms\Components\Textarea::make('text')
                    ->label('Témoignage du client')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label('Client')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Note')
                    ->formatStateUsing(fn (int $state): string => str_repeat('★', $state)),

                Tables\Columns\TextColumn::make('specialty.name')
                    ->label('Domaine')
                    ->default('Global')
                    ->badge(),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('Visible')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
