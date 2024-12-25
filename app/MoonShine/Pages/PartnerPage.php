<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use Illuminate\Support\Facades\Storage;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
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
                        Tab::make(__('Настройки'), [

                            Grid::make([

                                Column::make([
                                    Divider::make('Header'),
                                    Collapse::make('', [
                                        Text::make('Город', 'city_nov')->default((isset($city_nov)) ? $city_nov : ''),
                                        Text::make('Головной офис', 'main_office')->default((isset($main_office)) ? $main_office : ''),
                                        Text::make(__('Телефон'), 'phone1')->default((isset($phone1)) ? $phone1 : ''),
                                        Text::make(__('Телефон 2'), 'phone2')->default((isset($phone2)) ? $phone2 : ''),
                                        Text::make(__('Email'), 'email')->default((isset($email)) ? $email : ''),
                                        Text::make('Дилерский центр', 'main_diller')->default((isset($main_diller)) ? $main_diller : ''),

                                        Text::make(__('Город'), 'city_spb')->default((isset($city_spb)) ? $city_spb : ''),
                                        Text::make(__('Телефон 3'), 'phone3')->default((isset($phone3)) ? $phone3 : ''),
                                        Text::make(__('Email'), 'email2')->default((isset($email2)) ? $email2 : ''),

                                    ])

                                ])->columnSpan(12),
                            ]),

                            Grid::make([


                                Column::make([

                                    Divider::make('Контакты в Санкт-Петербурге'),

                                    Collapse::make('', [

                                        Text::make('Лейбл', 'con_spb_label')->default((isset($con_spb_label)) ? $con_spb_label : ''),
                                        Text::make('Адрес', 'con_spb_address')->default((isset($con_spb_address)) ? $con_spb_address : ''),
                                        Text::make('Компания', 'con_spb_company')->default((isset($con_spb_company)) ? $con_spb_company : ''),
                                        Text::make('Карта -  координаты', 'con_spb_piont')->default((isset($con_spb_piont)) ? $con_spb_piont : ''),
                                        Text::make('Лейбл', 'con_spb_label2')->default((isset($con_spb_label2)) ? $con_spb_label2 : ''),
                                        Text::make('Телефон', 'con_spb_phone')->default((isset($con_spb_phone)) ? $con_spb_phone : ''),
                                        Text::make('Email', 'con_spb_email')->default((isset($con_spb_email)) ? $con_spb_email : ''),

                                    ]),


                                ])->columnSpan(6),


                                Column::make([
                                    Divider::make('Контакты в Новосибирске'),

                                    Collapse::make('', [

                                        Text::make('Лейбл', 'con_nov_label')->default((isset($con_nov_label)) ? $con_nov_label : ''),
                                        Text::make('Адрес', 'con_nov_address')->default((isset($con_nov_address)) ? $con_nov_address : ''),
                                        Text::make('Компания', 'con_nov_company')->default((isset($con_nov_company)) ? $con_nov_company : ''),
                                        Text::make('Карта -  координаты', 'con_nov_piont')->default((isset($con_nov_piont)) ? $con_nov_piont : ''),
                                        Text::make('Лейбл', 'con_nov_label2')->default((isset($con_nov_label2)) ? $con_nov_label2 : ''),
                                        Text::make('Телефон', 'con_nov_phone')->default((isset($con_nov_phone)) ? $con_nov_phone : ''),
                                        Text::make('Email', 'con_nov_email')->default((isset($con_nov_email)) ? $con_nov_email : ''),
                                    ]),

                                ])->columnSpan(6),
                            ]),
                            Grid::make([

                                Column::make([
                                    Divider::make('Footer'),
                                    Collapse::make('', [
                                        Text::make('Производство', 'footer_pro')->default((isset($footer_pro)) ? $footer_pro : ''),
                                        Text::make('Телефоны', 'footer_phone')->default((isset($footer_phone)) ? $footer_phone : ''),


                                    ])

                                ])->columnSpan(12),
                            ]),

                        ]),

                        Tab::make(__('Дополнительные опции'), [

                            Divider::make('Дополнительные опции'),
                            Grid::make([
                                Column::make([


                                    Div::make([     ]),

                                ])->columnSpan(6),

                                Column::make([

                                    Div::make([      ]),

                                ])->columnSpan(6),


                            ])


                        ]),

                        Tab::make(__('Email получателя системных сообщений'), [

                            Divider::make('Опции'),
                            Grid::make([
                                Column::make([

                                    Div::make([
                                        Json::make('Электронная почта', 'json_emails')->fields([

                                            Text::make('', 'json_email')->hint('Владелец этого email будет получать все уведомления (изменения) при редактировании личных кабинетов пользователями.'),

                                        ])->vertical()->creatable(limit: 3)
                                            ->removable()->default((isset($json_emails)) ? $json_emails : ''),


                                    ]),

                                ])->columnSpan(12),


                            ])


                        ]),

                    ]),


                ])


        ];
    }
}
