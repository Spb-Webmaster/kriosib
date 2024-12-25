@extends('layouts.layout')
<x-seo.meta
    title="{{ config2('moonshine.gallery.metatitle') }}"
    description="{{ config2('moonshine.gallery.description') }}"
    keywords="{{ config2('moonshine.gallery.keywords') }}"
/>
@section('content')
    <div class="full__static_page">
        @if(config2('moonshine.gallery.title'))
            <div class="cat__">
                <h1>{{ config2('moonshine.gallery.title') }}</h1>
            </div>
        @endif
        @if(config2('moonshine.gallery.desc'))

            <div class="desc_static">
                {!! config2('moonshine.gallery.desc') !!}
            </div>
        @endif
    </div>
    <div class="full__static_page">


        <div class="tesers__">
            @foreach($items as $item)
                <div class="teaeser_item_" style="max-width: 349px;">
                    <div class="teaser_img">
                        <a class="jbimage-link jbimage-gallery full_2706" href="{{  Storage::url($item->img) }}"
                           data-fancybox="jbimage-gallery45" target="_blank">
                            <img class="jbimage full_2706" width="343" height="168"


                                 src=" {{ asset(intervention('343x168', $item->img, 'gallery', 'cover')) }}"
                                 data-template="popup">
                        </a>

                    </div>
                    <img src="{{ Storage::url('/images/temp/romb.png') }}" class="imagestempromb" alt="">
                    <div class="teaser_cont desc_static">
                        <p>{{ $item->title }}</p>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection


