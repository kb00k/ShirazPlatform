<div class="list-group">
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'dashboard' ? ' active' : '' }}" href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبرد</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'ticket' ? ' active' : '' }}" href="{{ route('ticket.create') }}"><i class="fa fa-life-ring"></i> پشتیبانی</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'transaction' ? ' active' : '' }}" href="{{ route('ticket.create') }}"><i class="fa fa-bars"></i> فاکتورها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'items' ? ' active' : '' }}" href="{{ route('ticket.create') }}"><i class="fa fa-files-o"></i> خرید های شما</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(1) == 'transaction' ? ' active' : '' }}" href="{{ route('ticket.create') }}"><i class="fa fa-money"></i> تراکنش ها</a>
    @foreach($menus as $menu)
        @if($menu->type == 'user')
            <a class="list-group-item list-group-item-action{{ Request::segment(1) == $menu->route ? ' active' : '' }}" href="{{ route($menu->route) }}"><i class="{{ $menu->icon }}"></i> {{ $menu->title }}</a>
        @endif
    @endforeach
</div>