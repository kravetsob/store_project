<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'category_id', 'price', 'description', 'path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Логика для создания или обновления продукта
     */
    public function handle(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->name = $validated['name'];
        $this->category_id = $validated['category'];
        $this->price = $validated['price'];
        $this->description = $validated['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('products', 'public');
            $this->path = $imagePath;
        }

        $this->save();
    }
}
