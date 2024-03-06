<?php

namespace App\Filament\Widgets;

use App\Models\Annonce;
use App\Models\Image;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatistiquesDuSite extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make("Nombre totale d'utilsateur", User::count())
                ->description('tous les utilisateur ')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make("Nombre totale d'annonces", Annonce::count())
                ->description('tous les annonces')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make("le Nombre totales d'images", Image::count())
                ->description("le nombre totales d'images")
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')

                ->color('success'),
        ];
    }
}
