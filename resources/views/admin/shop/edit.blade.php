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
                                <form class="w-full max-w-sm" method="post" action="{{ route('admin.shop.update', $shop->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="name">
                                            店舗名
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="name" name="name" type="text" value="{{ $shop->name }}">
                                        </div>
                                    </div>
                                    <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-password">
                                            店舗情報
                                        </label>
                                        </div>
                                        <div class="md:w-2/3">
                                        {{-- <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="information" name="information" type="text" value=""> --}}
                                        <textarea name="information" id="" cols="30" rows="10" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">{{ $shop->information }}</textarea>
                                        </div>
                                    </div>
                                    <div class="md:items-center mb-6">
                                        <img alt="店舗イメージ画像" class="lg:w-full h-64 object-cover object-center rounded border border-gray-200" src="{{ asset("storage/images/" . $shop->image) }}">
                                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg">
                                    </div>
                                    <div class="md:flex md:items-center justify-end">
                                        <div class="md:w-2/3">
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button" onclick="location.href='{{ route('admin.shop.index') }}'">
                                                戻る
                                            </button>
                                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                                更新
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
</x-app-layout>