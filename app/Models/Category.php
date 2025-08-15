<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $fillable = ['name', 'path'];

    /**
     * Логика сохранения или обновления категории
     */
    public function handle(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->name = $validated['name'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('categories', 'public');
            $this->path = $imagePath;
        }

        $this->save();
    }
}
