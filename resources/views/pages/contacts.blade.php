@extends('layouts.layout')
<x-seo.meta
    title="Контакты для связи"
    description="Контакты для связи компании криосиб"
    keywords="Контакты"
/>
@section('content')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=43db27ba-be61-4e84-b139-ff37ad4802b8&lang=ru_RU"
            type="text/javascript"></script>

    <div class="jbcontent jbcontent_page jbcontent_page_contacts">
        <div class="cat__">
            <h1 style="text-align: center">Контактная информация</h1>
        </div>
        <div class=" justify-content w_1000">
            <div class="desc_static col1">
                <div class="desc__label"><span>{{ config2('moonshine.setting.con_spb_label') }}</span></div>
                <div class="desc__1">{{ config2('moonshine.setting.con_spb_address') }}
                    <div>{{ config2('moonshine.setting.con_spb_company') }}</div>
                </div>
            </div><!--.desc_static-->

            <div class="desc_static col2">
                <div class="desc__label"><span>{{ config2('moonshine.setting.con_spb_label2') }}</span></div>
                <div class="desc__1">{{ config2('moonshine.setting.con_spb_phone') }}<br>
                    {!! config2('moonshine.setting.con_spb_email') !!}</div>
            </div><!--.desc_static-->

        </div><!--.justify-content w_1000-->
    </div>

    <div class="mmaapp">
        <div class="mmap mmap1">
            <div class="yandex_map" id="yandex_map268">
                <script type="text/javascript">

                    var myMap;
                    // Дождёмся загрузки API и готовности DOM.
                    ymaps.ready(init);

                    function init() {
                        var myMap = new ymaps.Map("map2268", {
                            center: [{{ config2('moonshine.setting.con_spb_piont') }}],
                            zoom: 15,
                            controls: ['zoomControl',]
                            //,type: "yandex#satellite" // загрузка спутник
                        });
                        // Создаем геообъект с типом геометрии "Точка".
                        myPlacemark0 = new ymaps.Placemark([{{ config2('moonshine.setting.con_spb_piont') }}], {
                            // Свойства.
                            balloonContent: '<h3>{{ config2('moonshine.setting.con_spb_label') }}</h3><p>{{ config2('moonshine.setting.con_spb_address') }}</p>'
                        }, {

                            // Опции.
                            // Необходимо указать данный тип макета.
                            iconLayout: 'default#image',
                            // Своё изображение иконки метки.
                            //0
                            iconImageHref: '{{ Storage::url('/images/logo_map.png') }}',
                            // Размеры метки.
                            iconImageSize: [184, 89],
                            // Смещение левого верхнего угла иконки относительно
                            // её "ножки" (точки привязки).
                            iconImageOffset: [-95, -75]
                        });


                        myMap.behaviors.disable('scrollZoom'); //myMap.controls.add(new ymaps.control.SearchControl({options: { position: { top: 40, left:10 }}}));
                        myMap.controls.add(new ymaps.control.TypeSelector({options: {position: {top: 40, right: 10}}}));

                        myMap.geoObjects
                            .add(myPlacemark0)

                    }

                </script>
                <div class="spb-webmaster_" id="map2268"  style="width:100%; height:467px;"></div>
            </div>
            <div class="clear" style="clear:both"></div>
        </div><!--.mmap1-->
    </div><!--.mmaapp-->


    <div class="jbcontent jbcontent_page jbcontent_page_contacts">
        <div class=" justify-content w_1000">
            <div class="desc_static col1">
                <div class="desc__label"><span>{{ config2('moonshine.setting.con_nov_label') }}</span></div>
                <div class="desc__1">{{ config2('moonshine.setting.con_nov_address') }}
                    <div>{{ config2('moonshine.setting.con_nov_company') }}</div>
                </div>
            </div><!--.desc_static-->

            <div class="desc_static col2">
                <div class="desc__label"><span>{{ config2('moonshine.setting.con_nov_label2') }}</span></div>
                <div class="desc__1">{{ config2('moonshine.setting.con_nov_phone') }}<br>
                    {!! config2('moonshine.setting.con_nov_email') !!}</div>
            </div><!--.desc_static-->

        </div><!--.justify-content w_1000-->
    </div>

    <div class="mmaapp">
        <div class="mmap mmap1">
            <div class="yandex_map" id="yandex_map269">
                <script type="text/javascript">

                    var myMap;
                    // Дождёмся загрузки API и готовности DOM.
                    ymaps.ready(init);

                    function init() {
                        var myMap = new ymaps.Map("map2269", {
                            center: [{{ config2('moonshine.setting.con_nov_piont') }}],
                            zoom: 15,
                            controls: ['zoomControl',]
                            //,type: "yandex#satellite" // загрузка спутник
                        });
                        // Создаем геообъект с типом геометрии "Точка".
                        myPlacemark0 = new ymaps.Placemark([{{ config2('moonshine.setting.con_nov_piont') }}], {
                            // Свойства.
                            balloonContent: '<h3>{{ config2('moonshine.setting.con_nov_label') }}</h3><p>{{ config2('moonshine.setting.con_nov_address') }}</p>'
                        }, {

                            // Опции.
                            // Необходимо указать данный тип макета.
                            iconLayout: 'default#image',
                            // Своё изображение иконки метки.
                            //0
                            iconImageHref: '{{ Storage::url('/images/logo_map.png') }}',
                            // Размеры метки.
                            iconImageSize: [184, 89],
                            // Смещение левого верхнего угла иконки относительно
                            // её "ножки" (точки привязки).
                            iconImageOffset: [-95, -75]
                        });


                        myMap.behaviors.disable('scrollZoom'); //myMap.controls.add(new ymaps.control.SearchControl({options: { position: { top: 40, left:10 }}}));
                        myMap.controls.add(new ymaps.control.TypeSelector({options: {position: {top: 40, right: 10}}}));

                        myMap.geoObjects
                            .add(myPlacemark0)

                    }

                </script>
                <div class="spb-webmaster_" id="map2269"  style="width:100%; height:467px;"></div>
            </div>
            <div class="clear" style="clear:both"></div>
        </div><!--.mmap1-->
    </div><!--.mmaapp-->
@endsection
