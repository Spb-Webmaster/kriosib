{{--UserSlider - всего два id  с разными слайдерами--}}
@props([
    'slider_id' => '1'
])
@php

        $user_slider = \App\Models\UserSlider::query()->where('id', $slider_id)->first();
        if(!$user_slider) {
           $user_slider = [];
        }

@endphp


@if(count($user_slider->slider))
    <div class="slider__2">
        <div class="h3">Декларации и сертификаты</div>
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach ($user_slider->slider as $slide)


                    <div class='swiper-slide slid_item2'><a
                            class="jbimage-link jbimage-gallery full_5950"
                            title="{{ $slide['json_text'] }}"
                            href="{{ Storage::url($slide['json_img']) }}" data-fancybox="jbimage-gallery-5950"
                            target="_blank" id="jbimage-link-676a33dc8f03c"><img
                                class="jbimage full_5950_e02610cd-597e-49f5-a974-126777193d88"
                                alt="{{ $slide['json_text'] }}"
                                title="{{ $slide['json_text'] }}"
                                src="{{ asset(intervention('160x232', $slide['json_img'], 'gallery', 'cover')) }}" width="160"
                                height="232" data-template="popup"/></a>
                    </div>


                @endforeach
            </div>
        </div>
    </div>
@endif
