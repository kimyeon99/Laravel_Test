<div>
    <section class="rounded-b-lg  mt-4 ">

        <form action="{{ route('comments.store', ['post_id' => $post->id] ) }}" accept-charset="UTF-8" method="post">
            @csrf
            <textarea name="comment"
            class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" placeholder="댓글을 입력하세요." cols="6" rows="6" id="comment_content" spellcheck="false"></textarea>
            <button class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Comment </button>
        </form>

      <div id="task-comments" class="pt-4">
        <!--comment-->
        @foreach ($comments as  $comment)
<div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
  <div class="flex flex-row justify-center mr-2">
    <img alt="avatar" width="48" height="48" class="rounded-full w-10 h-10 mr-4 shadow-lg mb-4" src="https://cdn1.iconfinder.com/data/icons/technology-devices-2/100/Profile-512.png">
    <h3 class="text-purple-600 font-semibold text-lg text-center md:text-left "> {{ $comment->user->name }}</h3>
  </div>
    <p style="width: 90%" class="text-gray-600 text-lg md:text-left ">{{ $comment->comment }}</p>
    @if(Auth::check() && Auth::user()->id == $comment->user_id)
    <form action = "{{ route('comments.destroy', ['com_id' => $comment->id]) }}" method="post">
        @csrf
        @method('delete')
      <button id="form" class="p-3 mt-2 bg-red-500 text-white hover:bg-red-400" >삭제</button>
      </form>

      <button id="form" class="p-3 mt-2 bg-red-500 text-white hover:bg-red-400" 
                onclick=location.href="{{ route('comments.edit', ['com_id'=>$comment->id]) }}">수정</button>
    @endif
</div>

    
@endforeach
<!--  comment end-->
      </div>
    </section>

  </div>