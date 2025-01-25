<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseTestimonialResource\Pages;
use App\Filament\Resources\CourseTestimonialResource\RelationManagers;
use App\Models\CourseTestimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseTestimonialResource extends Resource
{
    protected static ?string $model = CourseTestimonial::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    public static function getNavigationLabel(): string
{
    return 'Student Testimonials';
}
    protected static ?string $navigationGroup = 'Customers';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('course_id')
                    ->relationship('course', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', function ($query) {
                        $query->whereHas('roles', function ($query) {
                            $query->where('name', 'student');
                        });
                    })
                    ->label('Student')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rating')
                    ->placeholder('write a number between 1 and 5')
                    ->minValue(1)
                    ->maxValue(5)
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('course.thumbnail')
                    ->label('Course Thumbnail')
                    ->sortable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('course_id')
                    ->relationship('course', 'name')
                    ->label('Course Name')
                    ->searchable(),
                SelectFilter::make('user_id')
                    ->relationship('user', 'name', function ($query) {
                        $query->whereHas('roles', function ($query) {
                            $query->where('name', 'student');
                        });
                    })
                    ->searchable()
                    ->label('User Name'),
                SelectFilter::make('rating')
                    ->options([
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                    ])
                    ->label('Rating'),
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
            'index' => Pages\ListCourseTestimonials::route('/'),
            'create' => Pages\CreateCourseTestimonial::route('/create'),
            'edit' => Pages\EditCourseTestimonial::route('/{record}/edit'),
        ];
    }
}
