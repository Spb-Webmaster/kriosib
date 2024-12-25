@extends('layouts.layout')
<x-seo.meta
    title="{{config2('moonshine.index.metatitle') }}"
    description="{{config2('moonshine.index.description') }}"
    keywords="{{config2('moonshine.index.keywords') }}"
/>
@section('content')
    <main>
        <section>
            <div class="block_3 ">
                <div class="axeld_cont_3_flex">

                    <div class="bl_03_left"></div>
                    <div class="bl_03_right">

                        <div class="desc_static">
                            {!! config2('moonshine.index.index_desc') !!}
                        </div>

                    </div>

                </div>
            </div><!--.block_3-->
        </section>
        <section>
            <div class="block_4 ">
                <div class="wi920 block_4_back">


                    @if(config2('moonshine.index.slider_top'))
                        <div class="slider__">

                            <x-slider.slick_slider slider_id="{{ config2('moonshine.index.slider_top')  }}"/>


                        </div>

                    @endif


                    <div class="land_flex">
                        <div class="land_left">

                            <div class="lan_001 lan">
                                <div class="h2">{{ config2('moonshine.index.index_a_1')  }}</div>
                                <p>{{ config2('moonshine.index.index_a_2')  }}</p>
                            </div>

                            <div class="lan_001 lan">
                                <div class="h2">{{ config2('moonshine.index.index_b_1')  }}</div>
                                <p>{{ config2('moonshine.index.index_b_2')  }}</p>
                            </div>

                            <div class="lan_001 lan">
                                <div class="h2">{{ config2('moonshine.index.index_c_1')  }}</div>
                                <p>{{ config2('moonshine.index.index_c_2')  }}</p>
                            </div>



                        </div>
                        <div class="land_right">

                            <img src="{{ Storage::url('/images/ru.png') }}" alt="ru">

                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section>

            <div class="block_5">
                <div class="axeld_cont_5_flex">

                    <div class="wi920">

                        <x-slider.swiper_slider slider_id="{{ config2('moonshine.index.slider_bottom')  }}"/>


                    </div>

                </div><!--.axeld_cont_5_flex-->

            </div><!--.block_5-->
        </section>
        <section>
            <div class="block_6">
                <div class="axeld_cont_6_flex">

                    <div class="bl_06_left">
                        <div class="bl_06_left_top">

                            <img src="{{ Storage::url('/images/index_left.jpg') }}" class="index_left" alt="">
                            <div class="bl_06_desc">
                                <h1>{{ config2('moonshine.index.index_left_title') }}</h1>
                                <p></p>
                                <p style="text-align: justify;">{{ config2('moonshine.index.index_left_text') }}</p>


                            </div>
                        </div>
                        <img src="{{ Storage::url('/images/index_left2.png') }}" class="index_left2" alt="">


                    </div>
                    <div class="bl_06_right">
                        <div class="desc_static">
                            <h2>{{ config2('moonshine.index.index_right_title') }}</h2>
                            {!!  config2('moonshine.index.index_right_text')  !!}
                            <p><a href="/production" class="rot">Каталог</a></p>
                        </div>
                    </div>

                </div><!--.axeld_cont_5_flex-->

            </div>
        </section>
    </main>
@endsection
