<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('lokasi_akad')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi_resepsi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_jual')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('harga_modal')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('start_date')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('end_date')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('event_manager')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('account_manager')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lokasi_akad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi_resepsi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_jual')
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga_modal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_manager')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('account_manager')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
