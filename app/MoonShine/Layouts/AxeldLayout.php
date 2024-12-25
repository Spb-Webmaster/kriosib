<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use App\MoonShine\Pages\CatalogPage;
use App\MoonShine\Pages\GalleryPage;
use App\MoonShine\Pages\IndexPage;
use App\MoonShine\Pages\PartnerPage;
use App\MoonShine\Pages\PricePage;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\GalleryResource;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PriceResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\UserSliderResource;
use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When
};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;

final class AxeldLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make('Пользователи', [
                MenuItem::make('Админ', MoonShineUserResource::class, 'users'),
                MenuItem::make('Роль', MoonShineUserRoleResource::class, 'hashtag'),
            ]),
            MenuGroup::make('Настройки', [
                MenuItem::make('Настройки сайта', SettingPage::class, 'adjustments-vertical'),
            ]),
            MenuGroup::make('Страницы', [
                MenuItem::make('Главная', IndexPage::class, 'document-chart-bar'),
                MenuItem::make('Каталог', CatalogPage::class, 'shopping-cart'),
                MenuItem::make('Прайс', PricePage::class, 'banknotes'),
                MenuItem::make('Фотогалерея', GalleryPage::class, 'photo'),
                MenuItem::make('Партнеры', PartnerPage::class, 'user-plus'),
            ]),
            MenuGroup::make('Каталог', [

                MenuGroup::make('Фотогалерея', [
                    MenuItem::make('Фото', GalleryResource::class, 'photo'),
                ]),
                MenuGroup::make('Продукция', [
                    MenuItem::make('Товары', ProductResource::class, 'shopping-cart'),
                ]),
                MenuGroup::make('Прайс', [
                    MenuItem::make('Цены', PriceResource::class, 'banknotes'),
                ]),
            ]),
            MenuGroup::make('Модули', [
                MenuItem::make('Слайдеры', UserSliderResource::class, 'swatch'),
            ]),

        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
