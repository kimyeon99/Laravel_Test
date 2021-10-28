<div>
    <div class="card" style="width: 50%; margin:0px auto">
            <img src="{{ '/storage/images/' . $post->image }}" class="card-img-top" alt="..." style="width: 80% margin: 0px auto;">

        <ul class="list-group list-group-flush">
            <li class="list-group-item">제조회사: {{ $post->company }}</li>
            <li class="list-group-item">자동차명: {{ $post->carName }}</li>
            <li class="list-group-item">제조년도: {{ $post->year }}</li>
            <li class="list-group-item">가격: {{ $post->money }}</li>
            <li class="list-group-item">차종: {{ $post->carJong }}</li>
            <li class="list-group-item">외형: {{ $post->hung }}</li>
            <li class="list-group-item">작성자: {{ $post->user->name }}</li>
            <li class="list-group-item">등록일: {{ $post->created_at }} ({{ $post->created_at->diffForHumans() }})</li>
            <li class="list-group-item">변경일: {{ $post->updated_at }} ({{ $post->updated_at->diffForHumans() }})</li>

            @if(Auth::check() && Auth::user()->id == $post->user->id)
            <form action = "{{ route('likes.store', ['post' => $post]) }}" method="post">
                @csrf
                @if ($liked)
                <button class="py-3 px-6 text-white rounded-lg bg-red-500 shadow-lg block md:inline-block">좋아요 취소(총 좋아요 수: {{ $post->likes()->count() }})</button>
                @else
                    <button class="py-3 px-6 text-white rounded-lg bg-gray-500 shadow-lg block md:inline-block">좋아요(총 좋아요 수: {{ $post->likes()->count() }})</button>
                @endif
            </form>
            @endif


            @if(Auth::check() && Auth::user()->id == $post->user->id)
            <button class="mr-3 p-3 bg-blue-500 text-white hover:bg-blue-400" onclick=location.href="{{ route('posts.edit', ['post' => $post->id]) }}">수정</button>
            @endif
            <button class="p-3 bg-red-500 text-white hover:bg-red-400" onclick=location.href="{{ route('posts.index') }}">돌아가기</button>
        </ul>


             

          
          
        </div>
      </div>
    </div>
    