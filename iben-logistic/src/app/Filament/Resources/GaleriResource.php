<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $modelLabel = 'Galeri Foto';
    protected static ?string $pluralModelLabel = 'Galeri Foto';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Galeri')
                    ->image()
                    ->disk('public')
                    ->directory('galeri')
                    ->required()
                    ->maxSize(5120)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Foto')
                    ->placeholder('Contoh: Armada Truk Tronton Ekspedisi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('kategori')
                    ->label('Kategori')
                    ->options([
                        'Armada' => 'Armada Kendaraan',
                        'Fasilitas' => 'Fasilitas & Kantor',
                        'Gudang' => 'Pergudangan & Penyimpanan',
                        'Operasional' => 'Aktivitas Operasional',
                    ])
                    ->default('Armada')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status Publikasi')
                    ->options([
                        'Aktif' => 'Aktif (Tampil di Web)',
                        'Nonaktif' => 'Nonaktif (Disembunyikan)',
                    ])
                    ->default('Aktif')
                    ->required(),
                Forms\Components\TextInput::make('urutan')
                    ->label('Urutan Tampilan')
                    ->numeric()
                    ->default(1)
                    ->required(),
                Forms\Components\Textarea::make('keterangan')
                    ->label('Keterangan / Deskripsi Singkat')
                    ->placeholder('Keterangan opsional tentang foto ini')
                    ->rows(2)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Armada' => 'info',
                        'Fasilitas' => 'warning',
                        'Gudang' => 'danger',
                        'Operasional' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Aktif' => 'success',
                        'Nonaktif' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('urutan', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'Armada' => 'Armada',
                        'Fasilitas' => 'Fasilitas',
                        'Gudang' => 'Gudang',
                        'Operasional' => 'Operasional',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Nonaktif' => 'Nonaktif',
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}
