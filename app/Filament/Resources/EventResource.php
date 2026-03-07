<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Acara'),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255)
                    ->label('Lokasi Acara'),
                Forms\Components\DateTimePicker::make('event_date') // Kalender otomatis
                    ->required()
                    ->label('Tanggal & Jam Acara'),
                Forms\Components\Select::make('status')
                    ->options([
                        'upcoming' => 'Akan Datang',
                        'completed' => 'Sudah Selesai',
                    ])
                    ->required()
                    ->default('upcoming')
                    ->label('Status Acara'),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull()
                    ->label('Deskripsi Singkat'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama Acara'),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi'),
                Tables\Columns\TextColumn::make('event_date')
                    ->dateTime('d M Y - H:i')
                    ->sortable()
                    ->label('Waktu Pelaksanaan'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'upcoming' => 'warning',
                        'completed' => 'success',
                    })
                    ->label('Status'),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
