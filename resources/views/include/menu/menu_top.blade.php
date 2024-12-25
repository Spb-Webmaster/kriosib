<div class="top_menu">
    <nav>
        <ul class="nav menu">

            <li class="{{ active_linkMenu(config('app.app_url')) }}"><a
                    class="add__mobile_menu  {{ active_linkMenu(config('app.app_url')) }}"
                    href="{{config('app.app_url')}}">{{ __('Главная') }}</a></li>

            <li class="">
                <a href="/production"><span
                        class="temp_html_mod_menu">Каталог</span></a>
            </li>

            <li class="">
                <a href="/price"><span
                        class="temp_html_mod_menu">Прайс</span></a>
            </li>


            <li class="{{ active_linkMenu(route('gallery')) }}">
                <a class="add__mobile_menu" href="{{ route('gallery')  }}">{{ __('Фотогалерея') }}</a>

            </li>
    <li class="{{ active_linkMenu(route('partners')) }}">
                <a class="add__mobile_menu" href="{{ route('partners')  }}">{{ __('Парнеры') }}</a>

            </li>

            <li class="{{ active_linkMenu(route('contacts')) }}">
                <a class="add__mobile_menu" href="{{ route('contacts')  }}">{{ __('Контакты') }}</a>

            </li>

        </ul>
        <a href="#" id="pull">Меню</a>

    </nav>
</div>
