<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers\CourseSectionsRelationManager;
use App\Models\Course;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Fieldset::make('Details')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        -> maxLength(255)
                        ->required(),
                    
                    Forms\Components\FileUpload::make('thumbnail')
                        ->image()
                        ->disk('public')
                        ->directory('courses/thumbnail')
                        ->required(),
                ]),

                Fieldset::make('Additional')
                ->schema([

                    Forms\Components\Repeater::make('benefits')
                        ->relationship('benefits')
                        ->defaultItems(4)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                            ->required(),
                        ]),
                    
                    Forms\Components\Textarea::make('about')
                        ->rows(10)
                        ->cols(20)
                        ->required(),

                    Forms\Components\Select::make('is_popular')
                        ->options([
                            true => 'Popular',
                            false => 'Not Popular',
                        ])
                        ->required(),

                    Forms\Components\Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                        

                ]),
                Fieldset::make('Tools')
                ->schema([
                    Forms\Components\Select::make('tools')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('tools', 'name')
                    ->required(),
                ]),
                Fieldset::make('Private Groups')
                ->schema([
                    Forms\Components\TextInput::make('whatsapp_group')
                    ->url()
                    ->suffixIcon('heroicon-m-link')
                    ->placeholder('Whatsapp Group Link')
                    ->nullable(),
                    Forms\Components\TextInput::make('discord_server')
                    ->url()
                    ->suffixIcon('heroicon-m-link')
                    ->placeholder('Discord Server Link')
                    ->nullable(),
                ]),
                ]);
        }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                ImageColumn::make('thumbnail'),

                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                
                TextColumn::make('category.name'),

                IconColumn::make('is_popular')
                    -> boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Popular'),
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
            CourseSectionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
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
