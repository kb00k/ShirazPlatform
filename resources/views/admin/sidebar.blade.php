<div class="list-group">
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'dashboard' ? ' active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa fa-cogs"></i> داشبرد</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'user' ? ' active' : '' }}" href="{{ route('admin.user') }}"><i class="fa fa-users"></i> مدیریت کاربرها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'page' ? ' active' : '' }}" href="{{ route('admin.page') }}"><i class="fa fa-files-o"></i> مدیریت صفحه ها</a>
    @foreach($menus as $menu)
        @if($menu->type == 'admin')
        <a class="list-group-item list-group-item-action{{ Request::segment(2) == $menu->route ? ' active' : '' }}" href="{{ route('admin.' . $menu->route) }}"><i class="{{ $menu->icon }}"></i> {{ $menu->title }}</a>
        @endif
    @endforeach
</div>