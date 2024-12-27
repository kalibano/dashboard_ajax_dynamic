<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    /**
     * Store a new product.
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function create(array $data)
    {
        return Product::create($data);
    }

    /**
     * Get a list of all products.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return Product::all(); // You can also use paginate() if you want pagination
    }
}
