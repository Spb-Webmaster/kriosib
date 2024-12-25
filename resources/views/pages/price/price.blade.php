@extends('layouts.layout')
<x-seo.meta
    title="{{ config2('moonshine.price.metatitle') }}"
    description="{{ config2('moonshine.price.description') }}"
    keywords="{{ config2('moonshine.price.keywords') }}"
/>
@section('content')
    <div class="full__static_page">
        @if(config2('moonshine.price.title'))
            <div class="cat__">
                <h1>{{ config2('moonshine.price.title') }}</h1>
            </div>
        @endif
        @if(config2('moonshine.price.desc'))

            <div class="desc_static">
                {!! config2('moonshine.price.desc') !!}
            </div>
        @endif
    </div>
    <div class="full__static_page" id="print_price">

        @if($prices)

            @php
                $y=1;
            @endphp
            @foreach($prices as $k=>$item)
                <div class="price_teaser price_teaser_1">
                    <div class="cl_shaddow cl_shaddow8303">


                        <h2>{{ $item->title }}</h2>


                        <div class="desc_static">
                            @if($item->subtitle)
                                <p>{{ $item->subtitle }}</p>
                            @endif
                            @if($item->desc)
                                {!!  $item->desc !!}
                            @endif

                        </div>
                    </div>
                </div>

                <div class="price_table table__8303 tab_{{$k}} ">

                    <div class="th_">
                        <div class="td__ td__1">#</div>
                        <div class="td__ td__2">Название</div>
                        <div class="td__ td__3">Цена, руб., <br> без НДС</div>
                        <div class="td__ td__4">Артикул</div>
                    </div>


                    @foreach($item->property as $p)

                        @if(isset($p['json_main']))
                            <div class="p_subtitle">{{$p['json_main']}}</div>
                        @else
                            <div class="cl2020 tr_">
                                <div class="td__ td__1">{{$y}}</div>
                                <div class="td__ td__2">{{ $p['json_title'] }}
                                </div>
                                <div class="td__ td__3">{{ ($p['json_price'])?price($p['json_price']):'-' }}</div>
                                <div class="td__ td__4"></div>
                            </div>
                        @endif
                            @if(isset($p['property_list']))
                                @foreach($p['property_list'] as $pp)

                                    <div class="cl2020 tr_">
                                        <div class="td__ td__1"></div>
                                        <div class="td__ td__2">   {{ $pp['json_title'] }}</div>
                                        <div class="td__ td__3">{{ ($pp['json_price'])?price($pp['json_price']):'-' }}</div>
                                        <div class="td__ td__4"></div>
                                    </div>

                                @endforeach

                             @endif



                        @php
                            $y++;
                        @endphp
                    @endforeach


                </div>
                <div class="bott__table pad_t36_important pad_b46_important">
                    <div class="bot__ bot__8303"><a class="waves-light modal-trigger" data-fancybox href="#call_me"><span>Консультация</span></a></div>
                </div>


            @endforeach

        @endif


    </div>
    <div class="print_price">
        <button class="waves-effect waves-light btn blue button PrintMe__js"  name="btnprint" >Распечатать</button>
    </div>

@endsection



