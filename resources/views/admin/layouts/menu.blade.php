

@if (Sentinel::getUser()->hasAccess(['users']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}">
    <i class="livicon" data-c="#31B0D5" data-hc="#31B0D5" data-name="users" data-size="18"
               data-loop="true"></i>
               User Management
    </a>
</li>
@endif

@if (Sentinel::getUser()->hasAccess(['roles']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/roles*') ? 'active' : '' }}">
    <a href="{!! route('admin.roles.index') !!}">
    <i class="livicon" data-c="#31B0D5" data-hc="#31B0D5" data-name="keys" data-size="18"
               data-loop="true"></i>
               Role Management
    </a>
</li>
@endif

@if (Sentinel::getUser()->hasAccess(['banners']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/webbanners*') ? 'active' : '' }}">
    <a href="{!! route('admin.banners.index') !!}">
    <i class="livicon" data-c="#31B0D5" data-hc="#31B0D5" data-name="image" data-size="18"
               data-loop="true"></i>
               Banners / Videos
    </a>
</li>
@endif


@if (Sentinel::getUser()->hasAccess(['pages']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/pages*') ? 'active' : '' }}">
    <a href="{!! route('admin.pages.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="edit" data-size="18"
               data-loop="true"></i>
               Pages
    </a>
</li>
@endif

@if (Sentinel::getUser()->hasAccess(['footers']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/footers*') ? 'active' : '' }}">
    <a href="{!! route('admin.footers.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="wrench" data-size="18"
               data-loop="true"></i>
               Footers
    </a>
</li>
@endif

@if (Sentinel::getUser()->hasAccess(['footer-menu-links']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/menu-data*') ? 'active' : '' }}">
    <a href="{!! route('admin.menus.data') !!}">
        <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="responsive" data-size="18"
           data-loop="true"></i>
        Footer Menu Links
    </a>
</li>
@endif

@if (Sentinel::getUser()->hasAccess(['header-menu-links']) || Sentinel::inRole('admin'))
<li class="{{ Request::is('admin/menubuilders/0/builder') ? 'active' : '' }}">
    <a href="{{ route('admin.menubuilders.builder', 0 ) }}">
        <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="responsive" data-size="18"
           data-loop="true"></i>
        Header Menu Links
    </a>
</li>
@endif

<li class="{{ Request::is('admin/developers*') ? 'active' : '' }}">
    <a href="{!! route('admin.developers.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="home" data-size="18"
               data-loop="true"></i>
               Developers
    </a>
</li>

<li class="{{ Request::is('admin/languages*') ? 'active' : '' }}">
    <a href="{!! route('admin.languages.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="home" data-size="18"
               data-loop="true"></i>
               Languages
    </a>
</li>

