<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ダッシュ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            </div>
            <div>
                <a href="/memos">
                <div class="absolute left-10 top-1/4 h-1/4 w-2/5 bg-zinc-100 shadow-lg shadow-slate-800">
                <p class="text-4xl absolute top-1/3 right-1/3 h-1/1 w-1/1 ">作成したメモを確認する</p>
                </div>
              </a>
              <a href="/dashboard/search">
                <div class="absolute top-1/4 right-10 h-1/4 w-2/5 bg-zinc-100 shadow-lg shadow-slate-800">
                <p class="text-4xl absolute top-1/3 right-1/3 h-1/1 w-1/1">メモをする動画を探す</p>
                </div>
              </a>
            </div>
        </div>
    </div>
</x-app-layout>
