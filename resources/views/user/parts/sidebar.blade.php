<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(auth()->user()->role == 'user')
      <x-sidebar.user-sidebar-component />
      @endif
    </ul>

  </aside>