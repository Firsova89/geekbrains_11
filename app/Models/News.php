<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
   protected $table = "news";


   protected $fillable = [
	   'category_id', 'title', 'author', 'description', 'image'
   ];

   public function category(): BelongsTo
   {
	   return $this->belongsTo(Category::class, 'category_id', 'id');
   }
}