<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      <li class="menu-header">Sales</li>
      <li><a class="nav-link" href="{{ URL::to('admin/view-categories') }}"><i class="fas fa-list-ul"></i><span>Categories</span></a>
      <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-gift"></i><span>Products</span></a>
      <li><a class="nav-link" href="{{ URL::to('admin/view-categories') }}"><i class="fas fa-store"></i><span>Orders</span></a>
      <li class="menu-header">News</li>
      <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-newspaper"></i><span>Articles</span></a>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
    </div>
  </aside>
</div>