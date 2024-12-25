<footer>
    <div class="footer">
        <div class="flex_footer">
            <div class="f1">
                <div class="ff1">
                    <div class="f1__">

                        <a href="/"><img src="{{ Storage::url('/images/logo.png') }}" width="108" height="28"></a>


                    </div>
                    <div class="f1__2">® Криосиб 1997-{{ date("Y") }}</div>
                </div>
            </div>
            <div class="f2">
                <div class="ff2">

                    <div class="f2__">{{ config2('moonshine.setting.footer_pro') }}</div>
                    <div class="f2__2">{{ config2('moonshine.setting.footer_phone') }} | <a href="/usloviya-ispolzovaniya-sajta">Условия использлвания сайта</a></div>



                </div>
            </div><!--.f2-->

        </div><!--.flex_footer-->
    </div><!--.footer-->
</footer>
