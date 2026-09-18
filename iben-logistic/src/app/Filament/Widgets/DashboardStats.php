<?php
namespace App\Filament\Widgets;

use App\Models\Service;
use App\Models\Armada;
use App\Models\Pengiriman;
use App\Models\AnggotaTim;
use App\Models\Galeri;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Layanan', Service::count())
                ->description(Service::where('status', 'Aktif')->count() . ' aktif')
                ->descriptionIcon('heroicon-m-square-3-stack-3d')
                ->color('primary'),
            Stat::make('Total Armada', Armada::count())
                ->description(Armada::where('status', 'Tersedia')->count() . ' tersedia')
                ->descriptionIcon('heroicon-m-truck')
                ->color('success'),
            Stat::make('Total Pengiriman', Pengiriman::count())
                ->description(Pengiriman::where('status', 'Dalam Proses')->count() . ' dalam proses')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning'),
            Stat::make('Anggota Tim', AnggotaTim::count())
                ->description(AnggotaTim::where('status', 'Aktif')->count() . ' aktif')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
            Stat::make('Galeri Foto', Galeri::count())
                ->description(Galeri::where('status', 'Aktif')->count() . ' foto terbit')
                ->descriptionIcon('heroicon-m-photo')
                ->color('success'),
        ];
    }
}
