<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(auth()->user()->role == 'travels')
      <x-sidebar.travelssidebar />
      @endif
    </ul>

  </aside>