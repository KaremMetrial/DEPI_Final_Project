<?php

    namespace App\Http\Controllers\Web;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Product;
    use App\Models\Slider;

    class FrontendController extends Controller
    {
        public function index()
        {
            $sliders = Slider::where('status', 1)->get();
            $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();

            return view('web.home.index', compact('sliders', 'categories'));
        }

        public function showProduct(string $slug)
        {
            $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
            $relatedProducts = Product::where('categories_id', $product->categories_id)->where('id', '!=', $product->id)->take(8)->latest()->get();

            return view('web.pages.product-details', compact('product', 'relatedProducts'));
        }

        public function loadProductModel($productId)
        {
            $product = Product::with(['category', 'productImages','productSizes' ,'productOptions'])->findOrFail($productId);
            return view('web.layouts.ajax.product-popup-model',compact('product'))->render();
        }
    }
