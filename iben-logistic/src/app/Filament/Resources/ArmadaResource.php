<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArmadaResource\Pages;
use App\Filament\Resources\ArmadaResource\RelationManagers;
use App\Models\Armada;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArmadaResource extends Resource
{
    protected static ?string $model = Armada::class;

    protected static ?string $navigationIcon = 'heroicon-o-truck';
    protected static ?string $modelLabel = 'Armada';
    protected static ?string $pluralModelLabel = 'Armada';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto Kendaraan')
                    ->image()
                    ->disk('public')
                    ->directory('armada')
                    ->maxSize(3072)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('nomorKendaraan')
                    ->label('Nomor Plat Kendaraan')
                    ->placeholder('Contoh: B 1001 IL')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipe')
                    ->label('Tipe Kendaraan')
                    ->options([
                        'Truk Berat' => 'Truk Berat (Tronton / Trailer)',
                        'Truk Box' => 'Truk Box (CDE / CDD)',
                        'Mobil Van' => 'Mobil Van / Blind Van',
                        'Pick Up' => 'Pick Up',
                        'Kontainer' => 'Kontainer',
                    ])
                    ->default('Truk Berat')
                    ->required(),
                Forms\Components\TextInput::make('kapasitas')
                    ->label('Kapasitas Angkut')
                    ->placeholder('Contoh: 10 Ton, 2 Ton, 800 Kg')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('driver')
                    ->label('Nama Driver / Sopir')
                    ->placeholder('Contoh: Budi Santoso')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->label('Status Operasional')
                    ->options([
                        'Tersedia' => 'Tersedia',
                        'Beroperasi' => 'Beroperasi',
                        'Servis' => 'Servis',
                    ])
                    ->default('Tersedia')
                    ->required(),
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
                    ->defaultImageUrl('https://placehold.co/100x100/1e3a8a/white?text=Armada'),
                Tables\Columns\TextColumn::make('nomorKendaraan')
                    ->label('Nomor Kendaraan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipe')
                    ->label('Tipe')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kapasitas')
                    ->label('Kapasitas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('driver')
                    ->label('Driver')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Tersedia' => 'success',
                        'Beroperasi' => 'warning',
                        'Servis' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Tersedia' => 'Tersedia',
                        'Beroperasi' => 'Beroperasi',
                        'Servis' => 'Servis',
                    ]),
                Tables\Filters\SelectFilter::make('tipe')
                    ->options([
                        'Truk Berat' => 'Truk Berat',
                        'Truk Box' => 'Truk Box',
                        'Mobil Van' => 'Mobil Van',
                        'Pick Up' => 'Pick Up',
                        'Kontainer' => 'Kontainer',
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
            'index' => Pages\ListArmadas::route('/'),
            'create' => Pages\CreateArmada::route('/create'),
            'edit' => Pages\EditArmada::route('/{record}/edit'),
        ];
    }
}
