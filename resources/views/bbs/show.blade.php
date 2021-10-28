<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('상세보기') }}
        </h2>
    </x-slot>
    <x-post-show :post="$post" :liked="$liked"/>
    <x-post-comment :post="$post" :comments="$comments" />

</x-app-layout>




