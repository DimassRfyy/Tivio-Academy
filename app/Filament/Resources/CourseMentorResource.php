<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseMentorResource\Pages;
use App\Filament\Resources\CourseMentorResource\RelationManagers;
use App\Models\CourseMentor;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseMentorResource extends Resource
{
    protected static ?string $model = CourseMentor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Select::make('user_id')
                    ->label('Mentor')
                    ->options(function () {
                        return User::role('mentor')->pluck('name', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Textarea::make('about')
                    ->required(),
                
                Forms\Components\Select::make('is_active')
                    ->options([
                        true => 'Active',
                        false => 'Banned',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\ImageColumn::make('mentor.photo')
                ->circular(),
                
                Tables\Columns\TextColumn::make('mentor.name')
                    ->sortable()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('course.name')
                    ->sortable()
                    ->searchable(),

                    Tables\Columns\IconColumn::make('is_active')
                    -> boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Status'),
                
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ActionGroup::make([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                    ])
                        ->dropdown(false),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->icon('heroicon-m-bars-3')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListCourseMentors::route('/'),
            'create' => Pages\CreateCourseMentor::route('/create'),
            'edit' => Pages\EditCourseMentor::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
