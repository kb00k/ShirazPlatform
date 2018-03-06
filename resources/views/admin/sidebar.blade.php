<div class="list-group">
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'dashboard' ? ' active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa fa-cogs"></i> داشبرد</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'user' ? ' active' : '' }}" href="{{ route('admin.user') }}"><i class="fa fa-users"></i> کاربرها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'page' ? ' active' : '' }}" href="{{ route('admin.page') }}"><i class="fa fa-window-restore"></i> صفحه ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'article' ? ' active' : '' }}" href="{{ route('admin.article') }}"><i class="fa fa-newspaper-o"></i> مقاله ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'transaction' ? ' active' : '' }}" href="{{ route('admin.transaction') }}"><i class="fa fa-money"></i> تراکنش ها </a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'file' ? ' active' : '' }}" href="{{ route('admin.file') }}"><i class="fa fa-files-o"></i> فایل ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'ticket' ? ' active' : '' }}" href="{{ route('admin.ticket') }}"><i class="fa fa-life-ring"></i> تیکت های پشتیبانی</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'account' ? ' active' : '' }}" href="{{ route('admin.account') }}"><i class="fa fa-address-book-o"></i> حساب ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'category' ? ' active' : '' }}" href="{{ route('admin.category') }}"><i class="fa fa-object-group"></i> دسته ها</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'setting' ? ' active' : '' }}" href="{{ route('admin.setting') }}"><i class="fa fa-cog fa-spin"></i>  تنظیمات</a>
    <a class="list-group-item list-group-item-action{{ Request::segment(2) == 'app' ? ' active' : '' }}" href="{{ route('admin.app') }}"><i class="fa fa-rocket"></i> برنامه ها</a>
    @foreach($menus as $menu)
        @if($menu->type == 'admin')
        <a class="list-group-item list-group-item-action{{ Request::segment(2) == $menu->route ? ' active' : '' }}" href="{{ route('admin.' . $menu->route) }}"><i class="{{ $menu->icon }}"></i> {{ $menu->title }}</a>
        @endif
    @endforeach
</div>