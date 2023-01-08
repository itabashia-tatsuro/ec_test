<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * コントローラのコンストラクトの中でも認証チェックを行います
     * 
     */
    public function __construct()
    {
        $this->middleware('auth:admin');

        $this->middleware(function($request, $next) {

            // ルーティングに「product」が含まれているかをチェック
            $routeName = Route::currentRouteName();
            $name = mb_substr($routeName, 6, 7);
            if ($name !== 'product') {
                abort(404);
            }

            // ショップ情報がテーブル内にあるかをチェック
            Shop::findOrFail(Auth::id());

            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Shop::findOrFail(Auth::id())->product;
        
        // N+1問題の対策「Eagerロード」 ⇒ withメソッド
        // withメソッドの使い方 ⇒ Eloquent::with('リレーション')
        // リレーションの連鎖は「.（ドット）」でつなぐ
        // 今回のリレーションは、product経由でcategoryとimagesをつなぐ
        $shops = Shop::with(['product.category', 'product.images'])
                    ->where('id', Auth::id())
                    ->get();

        return view('admin.product.index' , compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $images = Image::all();
        return view('admin.product.create', compact('categories', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|exists:categories,id', // テーブルに存在しているかどうかをチェック
            'product_name' => 'required|string|max:40',
            'information'  => 'required|string|max:1000',
            'price'        => 'required|integer',
            'sort_order'   => 'nullable|integer',
            'stock'        => 'required|integer',
            'is_selling'   => 'required',
            'image1'       => 'nullable|string',
            'image2'       => 'nullable|string',
            'image3'       => 'nullable|string',
        ]);

        // 複数のテーブルに保存する=>トランザクション
        try {
            DB::transaction(function() use($request) {
                $product = Product::create([
                    'shop_id'      => Auth::id(),
                    'product_name' => $request->product_name,
                    'information'  => $request->information,
                    'category_id'  => $request->category_id,
                    'price'        => $request->price,
                    'sort_order'   => $request->sort_order,
                    'is_selling'   => $request->is_selling,
                    'stock'        => $request->stock
                ]);

                // 画像
                if (!is_null($request->image1)) {
                    Image::create([
                        'product_id' => $product->id,
                        'image_name' => $request->image1
                    ]);
                }
                if (!is_null($request->image2)) {
                    Image::create([
                        'product_id' => $product->id,
                        'image_name' => $request->image2
                    ]);
                }
                if (!is_null($request->image3)) {
                    Image::create([
                        'product_id' => $product->id,
                        'image_name' => $request->image3
                    ]);
                }
            });

        } catch( \Throwable $e) {
            \Log::error($e);
            throw $e;
        }

        return redirect()->route('admin.product.index')->with('successMessage', '商品を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 商品情報を取得
        $product = Product::findOrFail($id);
        
        // アクセスしてきたログインユーザーが、
        // 「別店舗の商品」を取得できないようにする
        if ($product->shop_id !== Auth::id()) {
            abort(404);
        }

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 商品情報を取得
        $product = Product::findOrFail($id);
        
        // アクセスしてきたログインユーザーが、
        // 「別店舗の商品」を取得できないようにする
        if ($product->shop_id !== Auth::id()) {
            abort(404);
        }

        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
