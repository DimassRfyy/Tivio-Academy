<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionContentResource\Pages;
use App\Filament\Resources\SectionContentResource\RelationManagers;
use App\Models\SectionContent;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionContentResource extends Resource
{
    protected static ?string $model = SectionContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('course_section_id')
                ->label('Course Section')
                ->options(function() {
                    return \App\Models\CourseSection::with('course')
                    ->get()
                    ->mapWithKeys(function ($section) {
                        return [
                            $section->id => $section->course
                                ?"{$section->course->name} - {$section->name}"
                                : $section->name,
                        ];
                    })
                    ->toArray();
                })
                ->searchable()
                ->required(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\RichEditor::make('content')
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('sectionContent/images')
                    ->fileAttachmentsVisibility('public')
                    ->columnSpanFull()
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('courseSection.name')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('courseSection.course.name')
                    ->sortable()
                    ->searchable(),
                

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
            'index' => Pages\ListSectionContents::route('/'),
            'create' => Pages\CreateSectionContent::route('/create'),
            'edit' => Pages\EditSectionContent::route('/{record}/edit'),
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
