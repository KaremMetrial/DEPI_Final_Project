<?php

    namespace App\Http\Controllers\Web;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use Gloudemans\Shoppingcart\Facades\Cart;
    use Illuminate\Http\Request;
    use mysql_xdevapi\Exception;

    class CartController extends Controller
    {
        public function addToCart(Request $request)
        {
            try {

            $product = Product::with(['productOptions', 'productSizes', 'productImages'])->findOrFail($request->product_id);

            $productSize = $product->productSizes->where('id', $request->product_size)->first();

            $productOptions = $product->productOptions->whereIn('id', $request->product_option);

            $options = [
                'product_size' => $productSize ? [
                    'id' => $productSize->id,
                    'name' => $productSize->name,
                    'price' => $productSize->price,
                ] : null,
                'product_options' => [],
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug
                ]
            ];

            foreach ($productOptions as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price,
                ];
            }

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options,
            ]);
            return response(['status' => 'success', 'message' => 'Product added to cart'], 200);
            }catch (\Exception $e){
                return response(['status' => 'success', 'message' => 'Something went wrong'], 500);
            }

        }

        public function getCartProducts()
        {
            return view('web.layouts.ajax.sidebar-cart-item')->render();
        }

        public function cartProductRemove($rowId)
        {
            try {
                Cart::remove($rowId);
                return response([
                    'status' => 'success',
                    'message'  => 'Item Deleted Successfully!',
                ]);
            }catch (\Exception $e){

                return response([
                    'status' => 'error',
                    'message'  => 'something went wrong!',
                ]);
            }
        }
    }
