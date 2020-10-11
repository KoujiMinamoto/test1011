<!DOCTYPE html>
<html>
    <head>
        <link rel="styleSheet" href="{{URL::asset('/css/home.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/design.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/aboutus.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/register.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/login.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/contact.css') }}" type="text/css">
        <link rel="styleSheet" href="{{URL::asset('/css/gallary.css') }}" type="text/css">
        <script type="text/javascript" src="{{URL::asset('/js/home.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/jquery-3.5.1.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/jquery-3.5.1.min.js') }}"></script>
        <script src="https://static.pdflibr.com/SuperSlide/2.1.3/jquery.SuperSlide.2.1.3.js"></script>
        <script type="text/javascript" src="{{URL::asset('/js/vue.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('/js/vue-router.js') }}"></script>
    </head>

    <body>
        <div id="home">
            <router-view></router-view>
        </div>
    </body>
    <script type="text/javascript"  src="{{URL::asset('/js/main.js') }}></script>



</html>