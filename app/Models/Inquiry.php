<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phone',
        'rental_date',
        'message',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'rental_date' => 'date',
        ];
    }
}
