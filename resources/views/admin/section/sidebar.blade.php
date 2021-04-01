<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>عمومی</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> داشبورد </a>
            </li>
            <li><a href="{{ route('categories.index') }}" ><i class="fa fa-cubes"></i> دسته بندی ها</a>
            </li>
            <li><a href="{{ route('posts.index') }}"><i class="fa fa-newspaper-o"></i>مقالات</a>
            </li>
            <li><a href="{{ route('tags.index') }}" ><i class="fa fa-tags"></i> تگ ها</a>
            </li>
            @can('view', User::class)
            <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i>کاربران</a>
            </li>   
            @endcan
        </ul>
    </div>

</div>