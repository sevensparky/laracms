<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>عمومی</h3>
        <ul class="nav side-menu">
            <li><a href="{{ route('panel.index') }}"><i class="fa fa-dashboard"></i> داشبورد </a></li>

            <li><a href="{{ route('categories.index') }}"><i class="fa fa-cubes"></i> دسته بندی ها</a></li>

            <li><a href="{{ route('tags.index') }}"><i class="fa fa-tags"></i> برچسب ها</a></li>

            <li><a href="{{ route('posts.index') }}"><i class="fa fa-pencil-square-o"></i>مقالات</a></li>

            {{-- TODO: clear this line --}}
            {{-- <li><a href="{{ route('shortlinks.index') }}" ><i class="fa fa-cube"></i> ابزار لینک کوتاه</a></li> --}}

            @can('view', auth()->user())
                <li><a href="{{ route('news.index') }}"><i class="fa fa-newspaper-o"></i> خبر ها</a></li>

                <li><a href="{{ route('comments.index') }}"><i class="fa fa-comment"></i>نظرات</a></li>
                
                <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i>کاربران</a></li>

                <li><a href="{{ route('faqs.index') }}"><i class="fa fa-question-circle"></i> سوالات متداول</a></li>
                
                <li><a href="{{ route('social.index') }}"><i class="fa fa-twitter"></i> شبکه های اجتماعی</a></li>
                
                <li><a href="{{ route('settings.index') }}"><i class="fa fa-crosshairs"></i>تنظیمات سایت</a></li>
            @endcan
        </ul>
    </div>

</div>
