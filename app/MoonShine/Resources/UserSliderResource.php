<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserSlider;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\AlpineJs;
use MoonShine\Support\Enums\ClickAction;
use MoonShine\Support\Enums\JsEvent;
use MoonShine\UI\Components\ActionButton;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Div;
use MoonShine\UI\Components\Layout\Divider;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use MoonShine\Support\ListOf;
use MoonShine\Laravel\Enums\Action;
/**
 * @extends ModelResource<UserSlider>
 */
class UserSliderResource extends ModelResource
{
    protected string $model = UserSlider::class;

    protected string $title = 'Слайдеры';

    protected string $column = 'title';

    protected string $sortColumn = 'title';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title'),

            Switcher::make('Слайдер', 'slider'),

        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Divider::make('Опции'),
                Grid::make([
                    Column::make([

                        Div::make([
                            Text::make('Название', 'title'),
                            Divider::make(''),

                            Json::make('Слайдер', 'slider')->fields([

                                Text::make('Заголовок', 'json_text'),
                                Textarea::make('Описание', 'json_desc'),
                                Textarea::make('Ссылка с ютуба (iframe)', 'json_video'),

                                Image::make(__('Изображение'), 'json_img')
                                    ->disk(config('moonshine.disk', 'moonshine'))
                                    ->dir('slider')
                                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                    ->removable()

                            ])->vertical()->creatable(limit: 30)
                                ->removable(),


                        ]),

                    ])->columnSpan(12),


                ])

            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param UserSlider $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
    protected function activeActions(): ListOf
    {
        return parent::activeActions()
            ->except(Action::VIEW, Action::MASS_DELETE, Action::DELETE, Action::CREATE)
            // ->only(Action::VIEW)
            ;
    }


/*    protected function topButtons(): ListOf
    {
      return parent::topButtons()->add(
            ActionButton::make('Refresh', '#')
                ->dispatchEvent(AlpineJs::event(JsEvent::TABLE_UPDATED, $this->getListComponentName()))
        );
    }*/

}
