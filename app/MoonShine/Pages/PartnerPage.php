<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Collapse;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\UI\Components\Heading;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Div;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Tabs;
use MoonShine\UI\Components\Tabs\Tab;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Text;
use PhpParser\Node\Stmt\Block;

class PartnerPage extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Настройка сайта';
    }

    public function setting()
    {

        if (Storage::disk('config')->exists('moonshine/partner.php')) {
            $result = include(storage_path('app/public/config/moonshine/partner.php'));
        } else {
            $result = null;
        }

        return (is_array($result)) ? $result : null;

    }


    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        if (!is_null($this->setting())) {
            extract($this->setting());
        }


        return [


            FormBuilder::make('/moonshine/partner')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Партнеры'), [


                            Divider::make('Наши партнеры'),
                            Grid::make([
                                Column::make([
                                    Collapse::make('', [
                                        Text::make('Заголовок', 'title')->default((isset($title)) ? $title : ''),
                                        TinyMce::make('Описание', 'desc')->default((isset($desc)) ? $desc : ''),
                                    ]),

                                ])->columnSpan(6),
                                Column::make([
                                    Collapse::make('', [

                                        Text::make('Мета тэг (title) ', 'metatitle')->unescape()->default((isset($metatitle)) ? $metatitle : ''),
                                        Text::make('Мета тэг (description) ', 'description')->unescape()->default((isset($description)) ? $description : ''),
                                        Text::make('Мета тэг (keywords) ', 'keywords')->unescape()->default((isset($keywords)) ? $keywords : ''),

                                    ]),

                                ])->columnSpan(6),
                            ]),

                            Grid::make([
                                Column::make([

                                    Collapse::make('', [

                                        Json::make('Города', 'json_cities')->fields([

                                            Text::make('Введите город', 'json_city'),
                                            Text::make('Введите координаты, для яндекс карт', 'json_point'),

                                        ])->vertical()->creatable(limit: 300)
                                            ->removable()->default((isset($json_cities)) ? $json_cities : ''),

                                    ]),

                                ])->columnSpan(6),
                                Column::make([

                                    Collapse::make('', [

                                        Json::make('Партнеры', 'json_partners')->fields([

                                            Text::make('Введите Название организации', 'json_title'),

                                        ])->vertical()->creatable(limit: 300)
                                            ->removable()->default((isset($json_partners)) ? $json_partners : ''),

                                    ]),


                                ])->columnSpan(6),


                            ])
                        ]),


                    ]),


                ])


        ];
    }
}
