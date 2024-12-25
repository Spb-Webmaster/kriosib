<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\IndexPage;
use App\MoonShine\Pages\PartnerPage;
use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\UserSliderResource;

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
            ])
            ->pages([
                ...$config->getPages(),
                SettingPage::class,
                IndexPage::class,
                PartnerPage::class,
            ])
        ;
    }
}