@php
    // 画像によってモーダルを使い分ける 
    if($name === 'image1') { $modal = 'modal-1'; }
    if($name === 'image2') { $modal = 'modal-2'; }
    if($name === 'image3') { $modal = 'modal-3'; }
@endphp

<div class="modal micromodal-slide" id="{{ $modal }}" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="{{ $modal }}-title">
      <header class="modal__header">
        <h2 class="modal__title" id="{{ $modal }}-title">
          ファイルを選択してください
        </h2>
        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="{{ $modal }}-content">
        <div class="flex flex-wrap">
          @foreach($images as $image)
              <div class="text-gray-700">
                <img
                  style="width:100%;height:300px;object-fit:cover;"
                  class="image"
                  data-id="{{ $name }}_{{ $image->id }}"
                  data-file="{{ $image->image_name }}"
                  data-path="{{ asset('storage/product_images/') }}"
                  data-modal="{{ $modal }}"
                  src="{{ asset("storage/product_images/" . $image->image_name) }}">
              </div>
              <div>{{ $image->image_name }}</div>
          @endforeach
        </div>
      </main>
      <footer class="modal__footer">
        <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
      </footer>
    </div>
  </div>
</div>

<div class="flex justify-around items-center mb-4">
  <a data-micromodal-trigger="{{ $modal }}" href='javascript:;'>ファイルを選択</a>
  <div class="w-1/4">
    <img id="{{ $name }}_thumbnail"  src="">
  </div>
</div>

<input id="{{ $name }}_hidden" type="hidden" name="{{ $name }}" value="">