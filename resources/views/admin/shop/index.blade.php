<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="x-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="lg:w-4/5 mx-auto flex justify-center">
                                @if(!is_null($shop->image))
                                    <img alt="ecommerce" class="" src="{{ asset("storage/images/" . $shop->image) }}">
                                @else
                                    <img alt="ecommerce" class="" src="https://dummyimage.com/400x400">
                                @endif
                                <div class="lg:pl-10 lg:py-6 lg:mt-0 ml-4">
                                    <h2 class="text-gray-500 tracking-widest text-2xl">BRAND NAME</h2>
                                    <h1 class="text-gray-900 tracking-widest text-2xl">The Catcher in the Rye</h1>
                                    <table class="text-left mt-5">
                                        <tr class="m-5">
                                            <th>店舗名</th>
                                            <td>{{ $shop->name }}</td>
                                        </tr>
                                        <tr class="m-5">
                                            <th>店舗詳細情報</th>
                                            <td>{{ $shop->information }}</td>
                                        </tr>
                                    </table>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        <a href="{{ route('admin.shop.edit', $shop->id) }}">
                                            編集
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>