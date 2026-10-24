<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $modelLabel = 'Projet';

    protected static ?string $pluralModelLabel = 'Mes projets';

    protected static ?string $navigationGroup = 'Portfolio';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->columns(['default' => 1, 'md' => 2])
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Titre du projet')
                    ->required()
                    ->maxLength(200)
                    ->columnSpanFull(),

                Forms\Components\Select::make('specialty_id')
                    ->relationship('specialty', 'name')
                    ->label('Domaine')
                    ->required()
                    ->native(false)
                    ->helperText('À quelle spécialité appartient ce projet ?'),

                Forms\Components\TextInput::make('order')
                    ->label('Ordre d\'affichage')
                    ->numeric()
                    ->default(0)
                    ->helperText('1 = premier projet affiché.'),

                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->required()
                    ->rows(3)
                    ->columnSpanFull()
                    ->helperText('Brève présentation du projet, du contexte et du résultat.'),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Image de couverture')
                    ->image()
                    ->disk('public')
                    ->directory('projects')
                    ->imagePreviewHeight('200')
                    ->columnSpanFull()
                    ->helperText('Formats acceptés : JPG, PNG, WebP. Sera automatiquement optimisée en WebP.'),

                Forms\Components\Section::make('Liens & Accès au projet')
                    ->description('Renseignez les liens pour permettre aux visiteurs d\'accéder directement à votre réalisation.')
                    ->schema([
                        Forms\Components\TextInput::make('project_url')
                            ->label('Lien direct du projet (Site, Démo ou GitHub)')
                            ->url()
                            ->maxLength(500)
                            ->placeholder('https://...')
                            ->helperText('Lien menant directement au projet : application publiée, site web, dépôt de code ou démo en ligne.'),

                        Forms\Components\TextInput::make('tiktok_url')
                            ->label('Lien TikTok / Réalisation vidéo')
                            ->url()
                            ->maxLength(500)
                            ->placeholder('https://www.tiktok.com/@...')
                            ->helperText('Lien direct vers la vidéo TikTok ou Reels démontrant la réalisation.'),
                    ])
                    ->columns(['default' => 1, 'md' => 2])
                    ->columnSpanFull(),

                Forms\Components\TagsInput::make('tags')
                    ->label('Tags')
                    ->placeholder('Nouveau tag')
                    ->columnSpanFull()
                    ->helperText('Mots-clés pour filtrer. Ex : Fashion, Football, Montage'),

                Forms\Components\Toggle::make('is_featured')
                    ->label('Mis en avant')
                    ->default(false)
                    ->helperText('Les projets mis en avant apparaissent sur la page d\'accueil.'),

                Forms\Components\Toggle::make('is_published')
                    ->label('Publié')
                    ->default(true)
                    ->helperText('Activez pour rendre ce projet visible sur le site.'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Aperçu')
                    ->square(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Titre')
                    ->searchable()
                    ->sortable()
                    ->limit(35),

                Tables\Columns\TextColumn::make('specialty.name')
                    ->label('Domaine')
                    ->badge()
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_featured')
                    ->label('En vedette')
                    ->boolean()
                    ->hiddenOn('sm'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Publié')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->label('Ordre')
                    ->sortable()
                    ->hiddenOn('sm'),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('specialty_id')
                    ->label('Domaine')
                    ->relationship('specialty', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
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
