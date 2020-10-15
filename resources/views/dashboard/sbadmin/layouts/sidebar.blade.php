<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-dragon"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Azure <sup>CMS</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <li class="nav-item {{ Request::routeIs('media') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/media">
          <i class="fas fa-fw fa-camera"></i>
          <span>Media</span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (request()->is('dashboard/posts*')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" 
        data-toggle="collapse" data-target="#post" aria-expanded="true" aria-controls="post"
        >
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Post</span>
        </a>
        <div id="post" class="collapse {{ (request()->is('dashboard/posts*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts Content:</h6>
            <a class="collapse-item {{ Request::routeIs('posts.create') ? 'active' : '' }}" href="{{route('posts.create')}}">Add New</a>
          <a class="collapse-item {{ Request::routeIs('posts.index') ? 'active' : '' }}" href="{{route('posts.index')}}">List Posts</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ (request()->is('dashboard/pages*')) ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" 
        data-toggle="collapse" data-target="#pages" aria-expanded="true" aria-controls="pages"
        >
          <i class="fas fa-fw fa-list"></i>
          <span>Pages</span>
        </a>
        <div id="pages" class="collapse {{ (request()->is('dashboard/pages*')) ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pages Content:</h6>
            <a class="collapse-item {{ Request::routeIs('pages.create') ? 'active' : '' }}" href="{{route('pages.create')}}">Add New</a>
          <a class="collapse-item {{ Request::routeIs('pages.index') ? 'active' : '' }}" href="{{route('pages.index')}}">List Pages</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/dashboard/livechat">
          <i class="fas fa-fw fa-comments"></i>
          <span>Live Chat</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>