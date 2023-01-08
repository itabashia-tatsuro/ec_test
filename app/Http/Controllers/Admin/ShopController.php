<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ShopController extends Controller
{
    /**
     * コントローラのコンストラクトの中でも認証チェックを行います
     * 
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop = Shop::find(Auth::id());
        return view('admin.shop.index', compact('shop'));
        // viewメソッドの第二引数にcompact関数を使っています
        // compact関数の引数に変数名を与えることで、blade側で使えるようになります
        // 「shop」とすることで、blade側で$shopとして使えるようになります
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $idに該当するデータが見つからない場合、
        // 404エラーページを表示してくれる
        $shop = Shop::findOrFail($id);
        return view('admin.shop.edit', compact('shop'));
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
        $shop = Shop::findOrFail($id);

        $shop->name = $request->name;
        $shop->information = $request->information;
        
        // 画像処理
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            // $path = Storage::putFile('public/images', $imageFile);
            // $shop->image = mb_substr($path,14);
            
            // リサイズ処理
            $fileName = uniqid(rand().'_');
            $extension = $imageFile->extension();
            $fileNameToStore = $fileName . '.' . $extension;
            $resizedImage = InterventionImage::make($imageFile)->resize(400, 400)->encode();
            // ここまで

            Storage::put('public/images/' . $fileNameToStore, $resizedImage);
            $shop->image = $fileNameToStore;
        }
        // ここまで
        $shop->save();

        return redirect()->route('admin.shop.index');
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
