<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    public const HASH_LENGTH = 6;

    protected $fillable = [
        'destination_url',
        'hash',
    ];

    public function getShortUrl(): string
    {
        return route('links.redirect_to_destination', ['hash' => $this->hash]);
    }

    public function getDestinationUrl(): string
    {
        return $this->destination_url;
    }
}
