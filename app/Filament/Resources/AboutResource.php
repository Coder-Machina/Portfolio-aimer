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
                Forms\Components\Tabs::make('À propos de moi')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Biographie & Profil')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Forms\Components\FileUpload::make('photo')
                                    ->label('Photo de profil')
                                    ->image()
                                    ->disk('public')
                                    ->directory('about')
                                    ->imagePreviewHeight('200')
                                    ->helperText('Photo professionnelle — sera automatiquement optimisée en WebP.'),

                                Forms\Components\TextInput::make('headline')
                                    ->label('Titre d\'accroche principal')
                                    ->placeholder('L\'art du montage au service de vos histoires')
                                    ->maxLength(255)
                                    ->helperText('Grand titre affiché au-dessus de la biographie.'),

                                Forms\Components\Textarea::make('bio')
                                    ->label('Biographie complète')
                                    ->required()
                                    ->rows(8)
                                    ->helperText('Présentation complète de votre parcours, de votre approche et de vos ambitions.'),
                            ]),

                        Forms\Components\Tabs\Tab::make('Expériences professionnelles')
                            ->icon('heroicon-o-briefcase')
                            ->schema([
                                Forms\Components\Repeater::make('experiences')
                                    ->label('Postes & Expériences')
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => ($state['role'] ?? null).' — '.($state['company'] ?? ''))
                                    ->schema([
                                        Forms\Components\TextInput::make('role')
                                            ->label('Intitulé du poste / Rôle')
                                            ->required()
                                            ->placeholder('ex: Vidéaste & monteur'),
                                        Forms\Components\TextInput::make('company')
                                            ->label('Entreprise / Organisation')
                                            ->required()
                                            ->placeholder('ex: Supreme Academy'),
                                        Forms\Components\TextInput::make('period')
                                            ->label('Période')
                                            ->required()
                                            ->placeholder('ex: Depuis août 2026 (En cours)'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Missions & Réalisations')
                                            ->rows(2)
                                            ->placeholder('Conception, tournage et montage des contenus vidéo pour les réseaux sociaux...'),
                                    ])
                                    ->columns(3),
                            ]),

                        Forms\Components\Tabs\Tab::make('Formations académiques')
                            ->icon('heroicon-o-academic-cap')
                            ->schema([
                                Forms\Components\Repeater::make('educations')
                                    ->label('Diplômes & Formations')
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => ($state['degree'] ?? null).' — '.($state['institution'] ?? ''))
                                    ->schema([
                                        Forms\Components\TextInput::make('degree')
                                            ->label('Formation / Diplôme')
                                            ->required()
                                            ->placeholder('ex: Licence en Génie Logiciel (Bac+3)'),
                                        Forms\Components\TextInput::make('institution')
                                            ->label('Établissement / École')
                                            ->required()
                                            ->placeholder('ex: ESGIS Cotonou'),
                                        Forms\Components\TextInput::make('period')
                                            ->label('Année / Période')
                                            ->required()
                                            ->placeholder('ex: Sept. 2023 à 2026'),
                                        Forms\Components\Textarea::make('description')
                                            ->label('Spécialité / Détails')
                                            ->rows(2)
                                            ->placeholder('Conception logicielle, développement mobile Flutter et web...'),
                                    ])
                                    ->columns(3),
                            ]),

                        Forms\Components\Tabs\Tab::make('Certifications & Distinctions')
                            ->icon('heroicon-o-shield-check')
                            ->schema([
                                Forms\Components\Repeater::make('certifications')
                                    ->label('Certificats officiels')
                                    ->collapsible()
                                    ->itemLabel(fn (array $state): ?string => ($state['title'] ?? null).' ('.($state['issuer'] ?? '').')')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label('Intitulé de la certification')
                                            ->required()
                                            ->placeholder('ex: Certificat de participation : Design Graphique & Montage Vidéo'),
                                        Forms\Components\TextInput::make('issuer')
                                            ->label('Organisme émetteur')
                                            ->required()
                                            ->placeholder('ex: ESGIS'),
                                        Forms\Components\TextInput::make('date')
                                            ->label('Date d\'obtention')
                                            ->placeholder('ex: Septembre 2024'),
                                        Forms\Components\TextInput::make('description')
                                            ->label('Détail / Contexte')
                                            ->placeholder('ex: Justificatif officiel disponible en annexe'),
                                    ])
                                    ->columns(2),
                            ]),

                        Forms\Components\Tabs\Tab::make('Langues & Personnalité')
                            ->icon('heroicon-o-language')
                            ->schema([
                                Forms\Components\Repeater::make('languages')
                                    ->label('Langues pratiquées')
                                    ->schema([
                                        Forms\Components\TextInput::make('language')
                                            ->label('Langue')
                                            ->required()
                                            ->placeholder('ex: Français'),
                                        Forms\Components\Select::make('level')
                                            ->label('Niveau')
                                            ->options([
                                                'Langue maternelle' => 'Langue maternelle',
                                                'Très bon' => 'Très bon',
                                                'Bon' => 'Bon',
                                                'Moyen' => 'Moyen',
                                                'Notions' => 'Notions',
                                            ])
                                            ->required(),
                                    ])
                                    ->columns(2),

                                Forms\Components\TagsInput::make('qualities')
                                    ->label('Qualités personnelles & Atouts')
                                    ->placeholder('Ajouter une qualité et appuyer sur Entrée')
                                    ->helperText('Ex: Professionnalisme, Autonomie, Créativité, Esprit d\'équipe...'),

                                Forms\Components\TagsInput::make('interests')
                                    ->label('Centres d\'intérêt & Passions')
                                    ->placeholder('Ajouter un centre d\'intérêt et appuyer sur Entrée')
                                    ->helperText('Ex: Vidéo & Cinéma, Football, Musique, Lecture, Danse...'),
                            ]),
                    ]),
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
