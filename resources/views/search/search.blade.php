<x-app-layout>
  <form class="flex h-screen w-screen items-center justify-center" action="/youtube/search" method="GET">
    <div class="rounded-lg border-8 border-cyan-400">
      <div>Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term" /></div>
      <div>Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="25" /></div>
      <div>
        <input type="submit" value="Search" />
      </div>
    </div>
  </form>
</x-app-layout>
