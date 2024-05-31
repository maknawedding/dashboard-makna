<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use App\Models\Client;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pengantin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pengantin_lk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('namaortu_lk')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('namaortu_pr')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('pengantin_pr')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('whatsapp')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('attachments')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pengantin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengantin_lk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('namaortu_lk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('namaortu_pr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pengantin_pr')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
