<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FifteenMillionResource\Pages;
use App\Filament\Resources\FifteenMillionResource\RelationManagers;
use App\Models\Achiever;
use App\Models\Member;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use NumberFormatter;

class FifteenMillionResource extends Resource
{
    protected static ?string $model = Achiever::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $label = '15 Million Achiever';

    protected static ?string $navigationGroup = 'Achievers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('member_id')
                    ->required()->options(function (){
                        return Member::pluck('members.name', 'members.id');
                    })
                ->label('Member'),
                Forms\Components\Select::make('position')
                    ->required()->options(function (){
                        return [
                            1 => '1st',
                            2 => '2nd',
                            3 => '3rd',
                            4 => '4th'
                        ];
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('member.name')
                    ->label('Member Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('position')
                    ->sortable()
                    ->formatStateUsing(function ($record){
                        $formatter = new NumberFormatter('en-US', NumberFormatter::ORDINAL);
                        return $formatter->format($record->position);
                    })
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
                return $query->where('type',2);
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
            'index' => Pages\ListAchievers::route('/'),
            'create' => Pages\CreateAchiever::route('/create'),
            'edit' => Pages\EditAchiever::route('/{record}/edit'),
        ];
    }
}
