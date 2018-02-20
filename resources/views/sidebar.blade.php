<div class="list-group">
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'dashboard' ? ' active' : '' }}" href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبرد</a>

    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'ticket' ? ' active' : '' }}" href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>  پشتیبانی</a>
    @foreach($menus as $menu)
        @if($menu->type == 'user')
            <a class="list-group-item list-group-item-action{{ Request::segment(1) == $menu->route ? ' active' : '' }}" href="{{ route($menu->route) }}"><i class="{{ $menu->icon }}"></i> {{ $menu->title }}</a>
        @endif
    @endforeach
</div>