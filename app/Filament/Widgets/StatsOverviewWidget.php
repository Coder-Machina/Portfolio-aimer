<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Contact;
use App\Models\Project;
use App\Models\Specialty;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $activeSpecialties = Specialty::query()->where('is_visible', true)->count();
        $publishedProjects = Project::query()->where('is_published', true)->count();
        $unreadMessages = Contact::query()->where('is_read', false)->count();

        // [WHY] Count projects broken down by specialty for quick mobile overview
        $specialtyBreakdown = Specialty::query()
            ->withCount(['projects' => fn ($q) => $q->where('is_published', true)])
            ->get()
            ->map(fn (Specialty $s): string => "{$s->name}: {$s->projects_count}")
            ->join(' · ');

        return [
            Stat::make('Domaines actifs', (string) $activeSpecialties)
                ->description('Domaines visibles sur le portfolio')
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('success'),

            Stat::make('Projets publiés', (string) $publishedProjects)
                ->description($specialtyBreakdown ?: 'Aucun projet')
                ->descriptionIcon('heroicon-m-video-camera')
                ->color('warning'),

            Stat::make('Messages non lus', (string) $unreadMessages)
                ->description($unreadMessages > 0 ? 'Nouveaux contacts à traiter' : 'Tous les messages sont traités')
                ->descriptionIcon('heroicon-m-envelope')
                ->color($unreadMessages > 0 ? 'danger' : 'gray'),
        ];
    }
}
