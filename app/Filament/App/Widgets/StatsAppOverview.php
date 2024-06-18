<?php

namespace App\Filament\App\Widgets;

use App\Models\Departement;
use App\Models\Employee;
use App\Models\Team;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAppOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Users', Team::find(Filament::getTenant())->first()->members->count())
                ->description('All users from the database')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Departements', Departement::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('All departement from the database')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Employee', Employee::query()->whereBelongsTo(Filament::getTenant())->count())
                ->description('Employee from database')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
