<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
     </head>
<body>
    <form action="{{ route('comments.update', ['com_id' => $comment->id] ) }}" accept-charset="UTF-8" method="post">
        @csrf
        @method('patch')
        <textarea name="comment"
        class="w-full shadow-inner p-4 border-0 mb-4 rounded-lg focus:shadow-outline text-2xl" cols="6" rows="6" id="comment_content" spellcheck="false">
        {!! $comment->comment !!}
        </textarea>
        <button class="font-bold py-2 px-4 w-full bg-purple-400 text-lg text-white shadow-md rounded-lg ">Comment </button>
      </form>
</body>
</html>