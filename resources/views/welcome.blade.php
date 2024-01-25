<x-app-layout>
  <div class="flex h-screen items-center justify-center">
    <div class="flex h-1/3 w-1/3 items-center justify-center rounded-full bg-cyan-300">
      <div class="flex flex-col">
        <div class="text-6xl">welcome</div>
        <div class="flex">
          @if (Route::has('login')) @auth
          <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
          @else
          <a href="{{ route('login') }}" class="underline ">Log in</a>
          <div class="flex-1"></div>

          @if (Route::has('register'))
          <a href="{{ route('register') }}" class="underline">Register</a>
          @endif @endauth
        </div>
        @endif
      </div>
    </div>
  </div>
</x-app-layout>
