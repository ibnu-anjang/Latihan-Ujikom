#!/bin/bash
sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-square-3-stack-3d';/protected static ?string \$navigationIcon = 'heroicon-o-square-3-stack-3d';\n    protected static ?string \$modelLabel = 'Layanan';\n    protected static ?string \$pluralModelLabel = 'Layanan';/" app/Filament/Resources/ServiceResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-truck';/protected static ?string \$navigationIcon = 'heroicon-o-truck';\n    protected static ?string \$modelLabel = 'Armada';\n    protected static ?string \$pluralModelLabel = 'Armada';/" app/Filament/Resources/ArmadaResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-document-text';/protected static ?string \$navigationIcon = 'heroicon-o-document-text';\n    protected static ?string \$modelLabel = 'Pengiriman';\n    protected static ?string \$pluralModelLabel = 'Pengiriman';/" app/Filament/Resources/PengirimanResource.php

sed -i "s/protected static ?string \$navigationIcon = 'heroicon-o-users';/protected static ?string \$navigationIcon = 'heroicon-o-users';\n    protected static ?string \$modelLabel = 'Anggota Tim';\n    protected static ?string \$pluralModelLabel = 'Anggota Tim';/" app/Filament/Resources/AnggotaTimResource.php
