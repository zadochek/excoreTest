<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            @can('create', auth()->user())
            <li class="app-sidebar__heading">Сотрудники</li>
            <li>
                <a href="/posts">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Записи сотрудников
                </a>
            </li>
            <li>
                <a href="/employee/create">
                    <i class="metismenu-icon pe-7s-plus"></i>
                    Добавить сотрудника
                </a>
            </li>
            @endcan

            @can('create-post', auth()->user())
            <li>
                <a href="/posts">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Мои записи
                </a>
            </li>
            <li>
                <a href="/post/create">
                    <i class="metismenu-icon pe-7s-plus"></i>
                    Добавить запись
                </a>
            </li>
            @endcan
            <li class="app-sidebar__heading">
                <form action="/logout" method="POST">
                @csrf
                    <button class="btn btn-outline-link pl-5" type="submit"><i class="metismenu-icon pe-7s-power"></i> Выход</button>
                </form>
            </li>
        </ul>
    </div>
</div>