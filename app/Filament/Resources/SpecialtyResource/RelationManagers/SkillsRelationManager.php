<?php

declare(strict_types=1);

namespace App\Filament\Resources\SpecialtyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class SkillsRelationManager extends RelationManager
{
    protected static string $relationship = 'skills';

    protected static ?string $title = 'Mes compétences';

    protected static ?string $modelLabel = 'Compétence';

    public function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nom de la compétence')
                    ->required()
                    ->maxLength(100)
                    ->helperText('Ex : Montage vidéo, Clipping, Flutter & Dart'),

                Forms\Components\Select::make('level')
                    ->label('Niveau de maîtrise')
                    ->options([
                        'débutant' => 'Débutant',
                        'intermédiaire' => 'Intermédiaire',
                        'avancé' => 'Avancé',
                        'expert' => 'Expert',
                    ])
                    ->required()
                    ->native(false),

                Forms\Components\TextInput::make('order')
                    ->label('Ordre d\'affichage')
                    ->numeric()
                    ->default(0)
                    ->helperText('1 = première compétence affichée.'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->defaultSort('order')
            ->columns([
                Tables\Columns\TextColumn::make('order')
                    ->label('Ordre')
                    ->sortable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Compétence')
                    ->searchable(),

                Tables\Columns\TextColumn::make('level')
                    ->label('Niveau')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'expert' => 'warning',
                        'avancé' => 'success',
                        'intermédiaire' => 'info',
                        default => 'gray',
                    }),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Ajouter une compétence'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
