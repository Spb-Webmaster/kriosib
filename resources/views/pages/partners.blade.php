@extends('layouts.layout')
<x-seo.meta
    title="{{ config2('moonshine.partner.metatitle') }}"
    description="{{ config2('moonshine.partner.description') }}"
    keywords="{{ config2('moonshine.partner.keywords') }}"
/>@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43db27ba-be61-4e84-b139-ff37ad4802b8&lang=ru_RU"
            type="text/javascript"></script>
    <div class="full__static_page">

        @if(config2('moonshine.partner.title'))
            <div class="cat__">
                <h1>{{ config2('moonshine.partner.title') }}</h1>
            </div>
        @endif
        @if(config2('moonshine.partner.desc'))

            <div class="desc_static">
                {!! config2('moonshine.partner.desc') !!}
            </div>
        @endif

    </div>




    <div class="part_map">
        <div class="yandex_map" id="yandex_map841">
            <script type="text/javascript">
                var myMap;
                ymaps.ready(init);

                function init() {
                    var myMap = new ymaps.Map("map2841", {
                        center: [57.0694, 64.8681],
                        zoom: 4,
                        controls: [
                            'zoomControl', 'searchControl', 'typeSelector', 'zoomControl', 'fullscreenControl']
                    });

                    @if(config2('moonshine.partner.json_cities'))

                    @foreach(config2('moonshine.partner.json_cities') as $k => $item)
                    // Создаем геообъект с типом геометрии "Точка".
                    myPlacemark{{ $k  }} = new ymaps.Placemark([{{ $item['json_point'] }}], {
                        // Свойства.
                        balloonContent: '{{ $item['json_city'] }}'
                    }, {
                        // Необходимо указать данный тип макета.
                        iconLayout: 'default#image',
                        // Своё изображение иконки метки.
                        //
                        iconImageHref: '{{ Storage::url('/images/myIcon.png') }}',
                        // Размеры метки
                        iconImageSize: [58, 55],
                        // Смещение левого верхнего угла иконки относительно
                        // её "ножки" (точки привязки).
                        iconImageOffset: [-28, -48]
                    });


                    @endforeach


                    myMap.behaviors.disable('scrollZoom');
                    myMap.geoObjects
                    @foreach(config2('moonshine.partner.json_cities') as $k => $item)
                        .add(myPlacemark{{ $k }})
                    @endforeach


                    @endif
                }
            </script>
            <div class="spb-webmaster" id="map2841" style=" width:100%;  height:560px; "></div>
        </div>
        <div class="clear" style="clear:both"></div>
    </div><!--.part_map-->
    <div class="full__static_page">


        <div class="desc_static cat_title  pad_30_0"><h2>Наши заказчики:</h2>
            <ul class="customers">
                @foreach(config2('moonshine.partner.json_partners') as $k => $item)

                    <li>{!! $item['json_title'] !!}</li>

                @endforeach

            </ul></div><!--.desc_static-->
    </div>
@endsection

