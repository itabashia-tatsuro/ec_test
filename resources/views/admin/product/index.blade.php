<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    @if (session('successMessage'))
        <div class="bg-blue-100 border border-blue-500 text-blue-700 px-4 py-3 rounded" role="alert">
            <p class="font-bold">
                {{ session('successMessage') }}
            </p>
        </div> 
    @endif

    <div class="py-12">
        <div class="x-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">商品一覧</h1>
                            </div>
                            <div class="flex flex-wrap -m-4">
                                <table>
                                    @foreach ($shops as $shop)
                                        @foreach($shop->product as $product)
                                            <tr>
                                                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                                                    <div class="block h-400 w-400 rounded overflow-hidden border-2 border-slate-700 hover:bg-slate-200">
                                                        @if (isset($product->images[0]))
                                                            <a href="{{ route('admin.product.show', $product->id) }}">
                                                                <img alt="商品画像" class="rounded-lg h-400 w-400 block border-slate-700" src="{{ asset("storage/product_images/" . $product->images[0]->image_name) }}">
                                                            </a>
                                                        @else
                                                            <a href="{{ route('admin.product.show', $product->id) }}">
                                                                <img alt="商品画像" class="rounded-lg h-400 w-400 block border-slate-700" src="https://dummyimage.com/400x400">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="mt-4">
                                                        <h3 class="text-gray-500 tracking-widest title-font mb-1">カテゴリ:{{ $product->category->category_name }}</h3>
                                                        <h2 class="text-gray-900 title-font text-lg font-medium">商品名：{{ $product->product_name }}</h2>
                                                        <p class="mt-1">金額：{{ $product->price }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>