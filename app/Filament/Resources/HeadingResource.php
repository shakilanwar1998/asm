<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeadingResource\Pages;
use App\Filament\Resources\HeadingResource\RelationManagers;
use App\Models\Customization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HeadingResource extends Resource
{
    protected static ?string $model = Customization::class;

    protected static ?string $navigationIcon = 'heroicon-o-window';
    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $label = 'Heading';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('module_name')
                ->label('Section Name')
                ->options(function (){
                    return [
                        '10_million_title' => '10 Million Heading',
                        '15_million_title' => '15 Million Heading'
                    ];
                }),
                Forms\Components\TextInput::make('value')
                    ->label('Heading')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('module_name')
                    ->label('Section Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Heading')
                    ->searchable(),
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
            ])->modifyQueryUsing(function ($query){
                return $query->where('type',1);
            });
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
            'index' => Pages\ListHeadings::route('/'),
            'create' => Pages\CreateHeading::route('/create'),
            'edit' => Pages\EditHeading::route('/{record}/edit'),
        ];
    }
}
