<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 </head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('수정하기') }}
        </h2>
    </x-slot>


<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <form method="POST" action="{{ route('posts.update', ['post'=>$post->id]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                  <div class="mb-4">
                      <label class="text-xl text-gray-600">제조회사 <span class="text-red-500">*</span></label></br>
                      <input type="text" class="border-2 border-gray-300 p-2 w-full" name="company" value="{{ old('company') ? old('company') : $post->company }}">
                  </div>
                  @error('company')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                  <div class="mb-4">
                    <label class="text-xl text-gray-600">자동차명 <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="carName" value="{{ old('carName') ? old('carName') : $post->carName }}">
                </div>
                @error('carName')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                <div class="mb-4">
                    <label class="text-xl text-gray-600">제조년도 <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="year" value="{{ old('year') ? old('year') : $post->year }}">
                </div>
                @error('year')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                <div class="mb-4">
                    <label class="text-xl text-gray-600">가격 <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="money"  value="{{ old('money') ? old('money') : $post->money }}">
                </div>
                @error('money')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                <div class="mb-4">
                    <label class="text-xl text-gray-600">차종 <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="carJong"  value="{{ old('carJong') ? old('carJong') : $post->carJong }}">
                </div>
                @error('carJong')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                <div class="mb-4">
                    <label class="text-xl text-gray-600">외형 <span class="text-red-500">*</span></label></br>
                    <input type="text" class="border-2 border-gray-300 p-2 w-full" name="hung" value="{{ old('hung') ? old('hung') : $post->hung }}">
                </div>
                @error('hung')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror


                  <div class="mb-8">
                  <input type="file" class="form-control" name="image">
                  </div>
                  @error('image')
                  <div class ="text-red-800 ml-3">
                      <span>{{  $message }}</span>
                  </div>
                  @enderror

                  <div class="flex p-1">
                      <button class="mr-3 p-3 bg-blue-500 text-white hover:bg-blue-400" >Submit</button>
                  </div>
                    </form>
                    <div class="flex p-1">

                      <button class="p-3 bg-red-500 text-white hover:bg-red-400" onclick=location.href="{{ route('posts.index', ['post'=>$post->id]) }}">Cancle</button>
                  </div>

                  <!-- if를 넣지 않으면 이미지 삭제할 경우 엑스박스가 떠서 넣음.-->
                  @if($post->image)
              <img src="{{ '/storage/images/' . $post->image }}" class="w-20 h-20 rounded-full" alt="..." style="width: 80% margin: 0px auto;">
              <form action = "{{ route('posts.imageDel', ['post'=>$post->id]) }}" method="post">
                @csrf
                @method('delete')
                  <button class="btn btn-danger h-8 my-1">X</button>
              </form> 
              @endif


            <form action = "{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('delete')
              <button id="form" class="p-3 mt-2 bg-red-500 text-white hover:bg-red-400"> 글 삭제하기</button>
              </form>

          </div>


      </div>
  </div>
</div>
</x-app-layout>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'content' );
</script>