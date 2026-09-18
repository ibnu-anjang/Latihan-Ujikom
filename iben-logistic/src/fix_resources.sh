#!/bin/bash
sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-rectangle-stack';/protected static ?string \$navigationIcon = 'heroicon-o-square-3-stack-3d';/" app/Filament/Resources/ServiceResource.php
sed -i "s/Forms\\\\Components\\\\TextInput::make('status')->required()/Forms\\\\Components\\\\Select::make('status')->options(['Aktif'=>'Aktif','Nonaktif'=>'Nonaktif'])->required()/" app/Filament/Resources/ServiceResource.php
sed -i "s/Tables\\\\Columns\\\\TextColumn::make('status')/Tables\\\\Columns\\\\TextColumn::make('status')->badge()->color(fn (string \$state): string => match (\$state) { 'Aktif' => 'success', 'Nonaktif' => 'danger' })/" app/Filament/Resources/ServiceResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-rectangle-stack';/protected static ?string \$navigationIcon = 'heroicon-o-truck';/" app/Filament/Resources/ArmadaResource.php
sed -i "s/Forms\\\\Components\\\\TextInput::make('status')->required()/Forms\\\\Components\\\\Select::make('status')->options(['Tersedia'=>'Tersedia','Beroperasi'=>'Beroperasi','Servis'=>'Servis'])->required()/" app/Filament/Resources/ArmadaResource.php
sed -i "s/Tables\\\\Columns\\\\TextColumn::make('status')/Tables\\\\Columns\\\\TextColumn::make('status')->badge()->color(fn (string \$state): string => match (\$state) { 'Tersedia' => 'success', 'Beroperasi' => 'warning', 'Servis' => 'danger' })/" app/Filament/Resources/ArmadaResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-rectangle-stack';/protected static ?string \$navigationIcon = 'heroicon-o-document-text';/" app/Filament/Resources/PengirimanResource.php
sed -i "s/Forms\\\\Components\\\\TextInput::make('status')->required()/Forms\\\\Components\\\\Select::make('status')->options(['Tertunda'=>'Tertunda','Dalam Proses'=>'Dalam Proses','Selesai'=>'Selesai'])->required()/" app/Filament/Resources/PengirimanResource.php
sed -i "s/Tables\\\\Columns\\\\TextColumn::make('status')/Tables\\\\Columns\\\\TextColumn::make('status')->badge()->color(fn (string \$state): string => match (\$state) { 'Selesai' => 'success', 'Dalam Proses' => 'warning', 'Tertunda' => 'danger' })/" app/Filament/Resources/PengirimanResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-rectangle-stack';/protected static ?string \$navigationIcon = 'heroicon-o-users';/" app/Filament/Resources/AnggotaTimResource.php
sed -i "s/Forms\\\\Components\\\\TextInput::make('status')->required()/Forms\\\\Components\\\\Select::make('status')->options(['Aktif'=>'Aktif','Cuti'=>'Cuti'])->required()/" app/Filament/Resources/AnggotaTimResource.php
sed -i "s/Tables\\\\Columns\\\\TextColumn::make('status')/Tables\\\\Columns\\\\TextColumn::make('status')->badge()->color(fn (string \$state): string => match (\$state) { 'Aktif' => 'success', 'Cuti' => 'warning' })/" app/Filament/Resources/AnggotaTimResource.php
