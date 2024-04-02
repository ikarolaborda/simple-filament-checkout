<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use NumberFormatter;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('name'),
                TextEntry::make('price')
                    ->formatStateUsing(function ($state) {
                        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);

                        return $formatter->formatCurrency($state / 100, 'eur');
                    }),
                Actions::make([
                    Action::make('Buy product')
                        ->url(fn ($record): string => self::getUrl('checkout', [$record])),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('price')
                    ->formatStateUsing(function ($state) {
                        $formatter = new NumberFormatter(app()->getLocale(), NumberFormatter::CURRENCY);

                        return $formatter->formatCurrency($state / 100, 'eur');
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'view' => Pages\ViewProduct::route('/{record}'),
            'checkout' => Pages\Checkout::route('/{record}/checkout'),
        ];
    }
}
