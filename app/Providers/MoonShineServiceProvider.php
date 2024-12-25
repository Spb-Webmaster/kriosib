<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\CatalogPage;
use App\MoonShine\Pages\GalleryPage;
use App\MoonShine\Pages\IndexPage;
use App\MoonShine\Pages\PartnerPage;
use App\MoonShine\Pages\PricePage;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\UserSliderResource;
use App\MoonShine\Resources\GalleryResource;
use App\MoonShine\Resources\PriceResource;
use App\MoonShine\Resources\ProductResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        // $config->authEnable();

        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                UserSliderResource::class,
                GalleryResource::class,
                PriceResource::class,
                ProductResource::class,
            ])
            ->pages([
                ...$config->getPages(),
                SettingPage::class,
                IndexPage::class,
                CatalogPage::class,
                PricePage::class,
                GalleryPage::class,
                PartnerPage::class,

            ])
        ;
    }
}
