<header>
    <img src="{{ Storage::url('/images/temp/top.png') }}" class="btn-top">
    <div class="block_1">

        <div class="axeld_cont_1_flex" style="display: flex;">

            <div class="bl_01_1">

                <div class="bl_01_img"><img src="{{ Storage::url('/images/placeholder.png') }}" /></div>
                <div class="bl_01_option">
                    <div class="sity">{{ config2('moonshine.setting.city_nov') }}</div>
                    <div class="start_office">{{ config2('moonshine.setting.main_office') }}</div>
                </div>

            </div>
            <div class="bl_01_2">

                <div class="bl_01_option">
                    <div class="sity"><img src="{{ Storage::url('/images/truba.png') }}"> {{ config2('moonshine.setting.phone1') }}, {{ config2('moonshine.setting.phone2') }}
                    </div>
                    <div class="start_office"><img src="{{ Storage::url('/images/email.png') }}"> <a href="mailto:{{ config2('moonshine.setting.email') }}">{{ config2('moonshine.setting.email') }}</a>
                    </div>
                </div>

            </div>
            <div class="bl_01_3">

                <div class="bl_01_img"><img src="{{ Storage::url('/images/placeholder.png') }}"></div>
                <div class="bl_01_option">
                    <div class="sity">{{ config2('moonshine.setting.city_spb') }}</div>
                    <div class="start_office">{{ config2('moonshine.setting.main_diller') }}</div>
                </div>

            </div>
            <div class="bl_01_4">

                <div class="bl_01_option">
                    <div class="sity"><img src="{{ Storage::url('/images/truba.png') }}"> {{ config2('moonshine.setting.phone3') }}</div>
                    <div class="start_office"><img src="{{ Storage::url('/images/email.png') }}"> <a
                            href="mailto:{{ config2('moonshine.setting.email2') }}">{{ config2('moonshine.setting.email2') }}</a></div>
                </div>

            </div>

        </div><!--axeld_cont_1_flex-->


    </div><!--blok_1-->

    <div class="block_2">

        <div class="axeld_cont_2_flex">
            <div class="bl_02_left">


                <a href="/"><img src="{{ Storage::url('/images/logo.png') }}" width="166" height="43"></a>

            </div>


            <div class="bl_02_right">

                @include('include.menu.menu_top')

            </div>
        </div>

    </div>
    <div class="clear"></div>
</header>
