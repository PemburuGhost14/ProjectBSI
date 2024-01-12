<?php

namespace App\Models;

use App\Http\Controllers\Back\KategoriController;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['kategori_id', 'title', 'slug', 'desc', 'img', 'views', 'status', 'publish_date'];

     
    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
