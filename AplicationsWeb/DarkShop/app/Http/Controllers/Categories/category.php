<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class category extends Controller
{
    public function showCategoriesBuyer($categoria)
    {
        return view('roles.buyer.pages.categories.buyer_category', [
            'categoria' => $categoria
        ]);
    }

    public function showCategoriesVendor($categoria)
    {
        return view('roles.vendor.pages.categories.vendor_category', [
            'categoria' => $categoria
        ]);
    }
}
