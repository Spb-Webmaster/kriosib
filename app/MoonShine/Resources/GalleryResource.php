<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\UserSlider;
use Illuminate\Database\Eloquent\Model;
use App\Models\Gallery;

use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\ClickAction;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Collapse;
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
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Gallery>
 */
class GalleryResource extends ModelResource
{
    protected string $model = Gallery::class;
    protected string $title = 'Слайдеры';

    protected string $column = 'title';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Image::make('Фото', 'img'),
            Text::make('Название', 'title'),
            Number::make('Сортировка','sorting'),
            Switcher::make('Публикация', 'published')->updateOnPreview(),


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
                Divider::make('Галерея'),
                Grid::make([
                    Column::make([

                        Collapse::make('', [
                            Text::make('Название', 'title'),

                            Image::make(__('Изображение'), 'img')
                                ->disk(config('moonshine.disk', 'moonshine'))
                                ->dir('gallery')
                                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                ->removable(),

            Number::make('Сортировка','sorting')->buttons()->default(999),


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
            ->except(Action::VIEW, Action::MASS_DELETE, Action::DELETE, /*Action::CREATE*/)
            // ->only(Action::VIEW)
            ;
    }

}
