<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LandingController extends Controller
{
    //
    public function index()
    {
        // Ambil data promosi dari cache atau database
        $promotions = Cache::remember('landing_promotions', 60, function () {
            return Promotion::where('status', true)
                            ->where('start_date', '<=', now())
                            ->where('end_date', '>=', now())
                            ->get();
        });

        $products = Cache::remember('landing_products', 60, function () {
            return Products::with(['category', 'brand'])
                ->where('stock_quantity', '>=', 1) // Filter produk dengan stok lebih dari atau sama dengan 1
                ->get();
        });


        return view('landing', compact('promotions', 'products'));
    }
}
