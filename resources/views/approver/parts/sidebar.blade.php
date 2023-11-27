<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(auth()->user()->role == 'approver')
      <x-sidebar.approversidebar />
      @endif
    </ul>

  </aside>