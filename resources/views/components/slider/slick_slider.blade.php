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
    <div class="block_4_regular_slider">

        @foreach ($user_slider->slider as $slide)

            <div class="slid_item">
                <div class="slid_item_flex">
                    <div class="slid_item_left">
                        <div class="slid_item_left_cont">
                            <div class="slid_item_277">
                                <h3>{{ $slide['json_text'] }}</h3>
                                <p>{{ $slide['json_desc'] }}</p>


                            </div><!--.slid_item_277-->
                        </div><!--.slid_item_left_cont-->
                    </div><!--.slid_item_left-->
                    <div class="slid_item_right">
                        @if( $slide['json_video'])
                            {!! $slide['json_video'] !!}
                        @else
                            <img src="{{ Storage::url($slide['json_img']) }}" alt="{{ $slide['json_text'] }}" />


                        @endif
                    </div>
                </div>
            </div><!--.slid_item-->

        @endforeach
    </div>
@endif
