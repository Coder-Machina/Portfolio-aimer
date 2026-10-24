<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMessagesWidget extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Derniers messages reçus';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::query()->latest()->limit(3)
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\IconColumn::make('is_read')
                    ->label('Statut')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-exclamation-circle')
                    ->trueColor('gray')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Expéditeur')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->copyable(),

                Tables\Columns\TextColumn::make('subject')
                    ->label('Sujet')
                    ->limit(40),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Date')
                    ->since(),
            ])
            ->actions([
                Tables\Actions\Action::make('markAsRead')
                    ->label('Marquer comme lu')
                    ->icon('heroicon-o-check')
                    ->color('success')
                    ->visible(fn (Contact $record): bool => ! $record->is_read)
                    ->action(fn (Contact $record) => $record->update(['is_read' => true])),
            ]);
    }
}
