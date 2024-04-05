<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestResource\Pages;
use App\Filament\Resources\TestResource\RelationManagers;
use App\Models\Test;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TestResource extends Resource
{
    protected static ?string $model = Test::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\Repeater::make('question')
                ->label("Options")
                ->collapsible()
                ->collapsed()
                ->itemLabel("")
                ->schema([
                    Forms\Components\FileUpload::make('option')
                        ->label("Option")
                        ->disk('public')
                        ->fetchFileInformation(false)
                        ->maxSize(200000)
                        ->acceptedFileTypes(['image/jpeg','image/jpg','image/png','audio/mpeg','video/mp4','video/ogg','video/webm'])
                        ->visibility('public')
                        ->columnSpan(3),
                    Forms\Components\Toggle::make("is_true")
                        ->columnSpan(1)
                        ->onColor('success')
                        ->offColor('danger')
                        ->inline(false),
                ])
                ->columns('4')
                ->columnSpan('2'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTests::route('/'),
            'create' => Pages\CreateTest::route('/create'),
            'edit' => Pages\EditTest::route('/{record}/edit'),
        ];
    }
}
