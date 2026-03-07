<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Berita'),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->label('Slug URL'),
                Forms\Components\RichEditor::make('content') // Ini yang bikin keren!
                    ->required()
                    ->columnSpanFull()
                    ->label('Isi Berita'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->label('Foto Dokumentasi'),
                Forms\Components\Select::make('status')
                    ->options([
                        'draft' => 'Draft (Simpan Dulu)',
                        'published' => 'Publish (Tayangkan)',
                    ])
                    ->required()
                    ->default('published')
                    ->label('Status Publikasi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable() // Biar bisa dicari lewat kolom search
                    ->label('Judul Berita'),
                Tables\Columns\TextColumn::make('status')
                    ->badge() // Bikin tampilannya jadi kotak warna-warni
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'warning',
                        'published' => 'success',
                    })
                    ->label('Status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->label('Tanggal Dibuat'),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
