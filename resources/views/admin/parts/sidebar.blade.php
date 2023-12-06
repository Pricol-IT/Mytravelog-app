<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(auth('admin')->user())
      <x-sidebar.adminsidebar />
      @endif
    </ul>

  </aside>