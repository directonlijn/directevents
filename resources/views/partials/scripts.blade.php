<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@if (config('app.env') == 'local')
    {{--<script id="__bs_script__">//<![CDATA[--}}
        {{--document.write('<script src="http://'--}}
            {{--+ (location.host || 'localhost').split(':')[0]--}}
            {{--+ ':35729/livereload.js"></'--}}
            {{--+ 'script>');--}}
        {{--//]]>--}}
    {{--</script>--}}
    <script id="__bs_script__">//<![CDATA[
        document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.24.7'><\/script>".replace("HOST", location.hostname));
        //]]></script>
@endif