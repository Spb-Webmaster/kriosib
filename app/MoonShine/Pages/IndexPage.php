<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\UserSlider;
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
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use PhpParser\Node\Stmt\Block;

class IndexPage extends Page
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

        if (Storage::disk('config')->exists('moonshine/index.php')) {
            $result = include(storage_path('app/public/config/moonshine/index.php'));
        } else {
            $result = null;
        }

        return (is_array($result)) ? $result : null;

    }

    public function sliders(): array
    {
        $collection = UserSlider::query()->select('id', 'title')->get();
        if ($collection) {
            $array[0] = '--';
            foreach ($collection as $item) {
                $array[$item->id] = $item->title;
            }
            return $array;
        }
        return [];
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


            FormBuilder::make('/moonshine/index')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Настройки'), [
                            Grid::make([

                                Column::make([
                                    Divider::make('Главная'),
                                    Collapse::make('', [

                                        TinyMce::make('Описание', 'index_desc')->default((isset($index_desc)) ? $index_desc : ''),

                                    ]),
                                    Collapse::make('', [


                                        Select::make('Выбрать слайдер', 'slider_top')
                                            ->options([
                                                '0' => 'Отключен',
                                                '1' => 'Включен'
                                            ])->default((isset($slider_top)) ? $slider_top : '')->hint('Редактирование слайдера в разделе "Модули" - "Слайдеры"')


                                    ]),

                                ])->columnSpan(6),
                                Column::make([
                                    Divider::make('Метотеги'),
                                    Collapse::make('', [

                                        Text::make('Мета тэг (title) ', 'metatitle')->unescape()->default((isset($metatitle)) ? $metatitle : ''),
                                        Text::make('Мета тэг (description) ', 'description')->unescape()->default((isset($description)) ? $description : ''),
                                        Text::make('Мета тэг (keywords) ', 'keywords')->unescape()->default((isset($keywords)) ? $keywords : ''),

                                    ]),

                                ])->columnSpan(6),


                            ]),


                            Grid::make([

                                Column::make([
                                    Divider::make('Главная'),


                                    Collapse::make('', [

                                        Text::make('Кол-во лет', 'index_a_1')->default((isset($index_a_1)) ? $index_a_1 : ''),

                                        Text::make('Текст', 'index_a_2')->default((isset($index_a_2)) ? $index_a_2 : ''),

                                        Text::make('Заказов', 'index_b_1')->default((isset($index_b_1)) ? $index_b_1 : ''),

                                        Text::make('Текст', 'index_b_2')->default((isset($index_b_2)) ? $index_b_2 : ''),

                                        Text::make('ГОСТ', 'index_c_1')->default((isset($index_c_1)) ? $index_c_1 : ''),

                                        Text::make('Текст', 'index_c_2')->default((isset($index_c_2)) ? $index_c_2 : ''),


                                    ]),
                                    Collapse::make('', [


                                        Select::make('Выбрать слайдер', 'slider_bottom')
                                            ->options([
                                                '0' => 'Отключен',
                                                '2' => 'Включен'
                                            ])->default((isset($slider_bottom)) ? $slider_bottom : '')->hint('Редактирование слайдера в разделе "Модули" - "Слайдеры"'),


                                    ]),

                                ])->columnSpan(12),
                            ]),


                            Grid::make([
                                Column::make([

                                    Collapse::make('', [

                                        Text::make('Заголовок', 'index_left_title')->default((isset($index_left_title)) ? $index_left_title : ''),

                                        Textarea::make('Описание', 'index_left_text')->default((isset($index_left_text)) ? $index_left_text : ''),


                                    ]),])->columnSpan(6),
                                Column::make([

                                    Collapse::make('', [

                                        Text::make('Заголовок', 'index_right_title')->default((isset($index_right_title)) ? $index_right_title : ''),

                                        TinyMce::make('Описание', 'index_right_text')->default((isset($index_right_text)) ? $index_right_text : ''),


                                    ]),
                                ])->columnSpan(6),

                            ]),


                        ]),


                    ]),


                ])


        ];
    }
}
