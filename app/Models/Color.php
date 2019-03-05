<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Color extends Model implements Sortable
{
    use SortableTrait;

    public $timestamps = false;
    protected $fillable = ['name', 'hex_code', 'order_column', 'printer'];

    public function filaments()
    {

        return $this->belongsToMany('App\Models\Filament', 'filaments_colors', 'color', 'filament');
    }

    /**
     * The printer for the filament.
     */
    public function owningPrinter()
    {
        return $this->hasOne(Printer::class, 'id', 'printer');
    }


}
