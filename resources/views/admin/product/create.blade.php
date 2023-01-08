<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product Form') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="font-bold">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="x-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-4/5 mx-auto flex justify-center">
                                <form class="w-full max-w-sm" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                            <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="category">
                                                カテゴリー ※必須
                                            </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <select name="category_id">
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="product_name">
                                            商品名 ※必須
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="product_name" type="text" value="{{ old('product_name') }}">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="information">
                                            商品情報 ※必須
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <textarea name="information" cols="30" rows="10" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">{{ old('information') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="price">
                                            価格 ※必須
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="price" name="price" type="number" value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="sort_order">
                                            表示順
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="sort_order" name="sort_order" type="number" value="{{ old('sort_order') }}">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="stock">
                                            初期在庫 ※必須
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="stock" name="stock" type="number" value="{{ old('stock') }}">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="is_selling">
                                            販売状態
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                            <div><input class="" name="is_selling" type="radio" value="1" checked>販売中</div>
                                            <div><input class="" name="is_selling" type="radio" value="0">停止中</div>
                                        </div>
                                    </div>

                                    {{-- 画像選択モーダル（１～３枚） --}}
                                    <x-select-image :images="$images" name="image1"></x-select-image>
                                    <x-select-image :images="$images" name="image2"></x-select-image>
                                    <x-select-image :images="$images" name="image3"></x-select-image>

                                    <div class="md:flex md:items-center justify-end">
                                        <div class="md:w-2/3">
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" onclick="location.href='{{ route('admin.product.index') }}'">
                                                戻る
                                            </button>
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                                登録
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <script>
        'use strict';
        
        const images = document.querySelectorAll('.image'); // クラス名で取得

        images.forEach(image => {
            image.addEventListener('click', function(e) {
                const imageName = e.target.dataset.id.substr(0,6); // data-idの6文字
                const imageId = e.target.dataset.id.replace(imageName + '_', ''); // 6文字カット
                const imageFile = e.target.dataset.file;
                const imagePath = e.target.dataset.path;
                const modal = e.target.dataset.modal;

                // サムネイルとinput type=hiddenのvalueに設定する
                document.getElementById(imageName + '_thumbnail').src = imagePath + '/' + imageFile;
                document.getElementById(imageName + '_hidden').value = imageFile;
                MicroModal.close(modal);
            }, );
        });
    </script>
</x-app-layout>