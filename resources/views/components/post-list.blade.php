
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 </head>
 
 <body>
 <section class="py-1 bg-blueGray-50">
 <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
   <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
     <div class="rounded-t mb-0 px-4 py-3 border-0">
       <div class="flex flex-wrap items-center">
         <div class="relative w-full px-4 max-w-full flex-grow flex-1">
           <h2 class="font-bold text-base text-blueGray-700">자동차 글 리스트</h2>
         </div>
         <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
             <button class="p-2 pl-5 pr-5 bg-yellow-500 text-gray-100 text-lg rounded-lg focus:border-4 border-yellow-300"
             onclick=location.href="{{ route('posts.create') }}">글쓰기</button>
         </div>
       </div>
     </div>
 
     <div class="block w-full overflow-x-auto">
       <table class="items-center bg-transparent w-full border-collapse ">
         <thead>
           <tr>
             <th class="px-8 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-bold text-left">
                            제조회사           
                         </th>
           <th class="px-8 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-bold text-left">
                           자동차명
                         </th>
            <th class="px-8 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-bold text-left">
                           제조년도
                         </th>
           <th class="px-8 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-bold text-left">
                           Created_at
                         </th>
            <th class="px-8 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-bold text-left">
                            좋아요 수
                          </th>
           </tr>
         </thead>
 
         <tbody>
             @foreach ($posts as $post)
           <tr>
             <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                 <a href="{{ route('posts.show', ['post' => $post->id]) }}">
                 {{ $post->company }}
                 </a>
             </th>
             <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                 {{ $post->carName }}
             </td>
             <td class="border-t-0 px-6 align-center border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                 {{ $post->year }}
             </td>
             <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
               <i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
               {{ $post->created_at->diffForHumans() }}
             </td>
             <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                <i class="fas fa-arrow-up text-emerald-500 mr-4"></i>
                {{ $post->likes->count() }}
              </td>
          </tr>
           @endforeach
         </tbody>
 
       </table>
     </div>
   </div>
 </div>
 
 <footer class="relative pt-8 pb-6 mt-16">
   <div class="container mx-auto px-4">
     <div class="flex flex-wrap items-center md:justify-between justify-center">
       <div class="w-full md:w-6/12 px-4 mx-auto text-center">
         <div class="text-sm text-blueGray-500 font-semibold py-1">
           {{ $posts->links() }}
         </div>
       </div>
     </div>
   </div>
 </footer>
 </section>
   
   </body>
 