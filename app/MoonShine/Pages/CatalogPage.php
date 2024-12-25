<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\TinyMce\Fields\TinyMce;
use MoonShine\UI\Components\Alert;
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

class CatalogPage extends Page
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
        return $this->title ?: 'Каталог сайта';
    }

    public function setting()
    {

        if (Storage::disk('config')->exists('moonshine/catalog.php')) {
            $result = include(storage_path('app/public/config/moonshine/catalog.php'));
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


            FormBuilder::make('/moonshine/catalog')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Галерея'), [


                            Divider::make('Каталог продукции'),
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
                            Alert::make(type: 'primary')->content('Каталог продукции создается в разделе «Каталог»'),

                        ]),


                    ]),


                ])


        ];
    }
}
