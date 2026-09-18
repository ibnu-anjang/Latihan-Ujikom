<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengirimanResource\Pages;
use App\Filament\Resources\PengirimanResource\RelationManagers;
use App\Models\Pengiriman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengirimanResource extends Resource
{
    protected static ?string $model = Pengiriman::class;

    protected static ?string $slug = 'pengiriman';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $modelLabel = 'Pengiriman';
    protected static ?string $pluralModelLabel = 'Pengiriman';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('pelanggan')
                    ->label('Nama Pelanggan / Perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tujuan')
                    ->label('Kota / Alamat Tujuan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('layanan')
                    ->label('Layanan')
                    ->options([
                        'Angkutan Darat' => 'Angkutan Darat',
                        'Kargo Udara' => 'Kargo Udara',
                        'Pergudangan' => 'Pergudangan',
                        'Kargo Laut' => 'Kargo Laut',
                    ])
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Tertunda' => 'Tertunda',
                        'Dalam Proses' => 'Dalam Proses',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Tertunda')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal Pengiriman')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pelanggan')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tujuan')
                    ->label('Tujuan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('layanan')
                    ->label('Layanan')
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Selesai' => 'success',
                        'Dalam Proses' => 'warning',
                        'Tertunda' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Tertunda' => 'Tertunda',
                        'Dalam Proses' => 'Dalam Proses',
                        'Selesai' => 'Selesai',
                    ]),
                Tables\Filters\SelectFilter::make('layanan')
                    ->options([
                        'Angkutan Darat' => 'Angkutan Darat',
                        'Kargo Udara' => 'Kargo Udara',
                        'Pergudangan' => 'Pergudangan',
                        'Kargo Laut' => 'Kargo Laut',
                    ]),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPengirimen::route('/'),
            'create' => Pages\CreatePengiriman::route('/create'),
            'edit' => Pages\EditPengiriman::route('/{record}/edit'),
        ];
    }
}
