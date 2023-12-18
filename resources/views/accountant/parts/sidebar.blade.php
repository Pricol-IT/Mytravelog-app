<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(auth()->user()->role == 'accountant')
      <x-sidebar.accountantsidebar />
      @endif
    </ul>

  </aside>