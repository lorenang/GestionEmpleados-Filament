<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmpleadoResource\Pages;
use App\Filament\Resources\EmpleadoResource\RelationManagers;
use App\Models\Empleado;
use App\Models\Sucursal;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class EmpleadoResource extends Resource
{
    protected static ?string $model = Empleado::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')->label('Nombre'),
                TextInput::make('apellido')->label('Apellido'),
                TextInput::make('email')->label('E-mail'),
                TextInput::make('telefono')->numeric(),
                DatePicker::make('fecha_de_ingreso')->label('Fecha de Ingreso'),
                DatePicker::make('fecha_de_nacimiento')->label('Fecha de Nacimiento'),

                Select::make('sucursal_id')->label('Sucursal')->options(Sucursal::all()->pluck('nombre', 'id'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nombre'),
                TextColumn::make('apellido'),
                TextColumn::make('email'),
                TextColumn::make('telefono'),
                TextColumn::make('fecha_de_ingreso')->date(),
                TextColumn::make('fecha_de_nacimiento')->date(),
                TextColumn::make('sucursal.nombre')
            ])
            ->filters([
                SelectFilter::make('sucursal')->relationship('sucursal', 'nombre')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                ExportBulkAction::make()
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
            'index' => Pages\ListEmpleados::route('/'),
            'create' => Pages\CreateEmpleado::route('/create'),
            'edit' => Pages\EditEmpleado::route('/{record}/edit'),
        ];
    }
}
