<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title>booq publishing</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="bower_components/bxslider-4/dist/jquery.bxslider.css" />

    {{--<link rel="stylesheet" href="bower_components/bxslider/bx_styles/bx_styles.css" />--}}
    {{--<link rel="stylesheet" href="styles/bootstrap.css" />--}}
    <link rel="stylesheet" href="css/main.css">

            <!--[if lt IE 9]>
            <script src="bower_components/respond/dest/respond.min.js"></script>
            <script src="bower_components/es5-shim/es5-shim.js"></script>
            <script src="bower_components/json3/lib/json3.js"></script>

            <![endif]-->

            <script src="bower_components/jquery/dist/jquery.js"></script>
            <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
            <script src="bower_components/isotope/dist/isotope.pkgd.min.js"></script>
            <script src="bower_components/bxslider-4/dist/jquery.bxslider.min.js"></script>

  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <!-- Add your site or application content here -->
    <div class="container-fluid">
      <div class="header clearfix">
        <ul class="nav nav-pills pull-right" style="margin-top: 20px;width: 600px;">
          <li class="{{ ($menu == 'home') ? 'active' : '' }}"><a href="{{ action('MainController@index') }}">Home</a></li>
          <li class="{{ ($menu == 'catalogues') ? 'active' : '' }}"><a href="catalogues">Catalogues</a></li>
          <li class="{{ ($menu == 'about') ? 'active' : '' }}"><a href="about">About</a></li>
          <li class="{{ ($menu == 'contact') ? 'active' : '' }}"><a href="contact">Contact</a></li>
          <li class="{{ ($menu == 'cart') ? 'active' : '' }}"><a href="cart">Cart</a></li>
          <div class="input-group input-group-sm col-xs-2">
              <input type="text" class="form-control" style="width:172px;" ng-model="searchFilter" placeholder="Search..." aria-describedby="sizing-addon3">
              <span class="input-group-addon" id="sizing-addon3"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            </div>
        </ul>
        <h3 class="logo text-muted col-sm-2 col-sm-offset-0 col-xs-6 col-xs-offset-3">
            <a href="{{ action('MainController@index') }}"><img class="ximg-responsive" src="imgs/logo-color2-Small.jpg" /></a>
        </h3>
      </div>

      @yield('content')

      <div class="footer text-right">
        <p><span class="glyphicon glyphicon-copyright-mark"></span> booq publishing</p>
      </div>
    </div>


    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID -->
     {{--<script>--}}
       {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
       {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
       {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
       {{--})(window,document,'script','//www.google-analytics.com/analytics.js','ga');--}}

       {{--ga('create', 'UA-XXXXX-X');--}}
       {{--ga('send', 'pageview');--}}
    {{--</script>--}}

        <!-- build:js(.) scripts/oldieshim.js -->
        <!--[if lt IE 9]>
        <!--<script src="bower_components/respond/dest/respond.min.js"></script>-->
        <!--<script src="bower_components/es5-shim/es5-shim.js"></script>-->
        <!--<script src="bower_components/json3/lib/json3.js"></script>-->

        <![endif]-->
        <!-- endbuild -->

        <!-- build:js(.) scripts/vendor.js -->
        <!-- bower:js -->
        {{--<script src="bower_components/jquery/dist/jquery.js"></script>--}}
        {{--<script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>--}}
        {{--<script src="bower_components/isotope/dist/isotope.pkgd.min.js"></script>--}}
        {{--<script src="bower_components/get-style-property/get-style-property.js"></script>--}}
        {{--<script src="bower_components/get-size/get-size.js"></script>--}}
        {{--<script src="bower_components/matches-selector/matches-selector.js"></script>--}}
        {{--<script src="bower_components/eventie/eventie.js"></script>--}}
        {{--<script src="bower_components/doc-ready/doc-ready.js"></script>--}}
        {{--<script src="bower_components/eventEmitter/EventEmitter.js"></script>--}}
        {{--<script src="bower_components/outlayer/item.js"></script>--}}
        {{--<script src="bower_components/outlayer/outlayer.js"></script>--}}
        {{--<script src="bower_components/masonry/masonry.js"></script>--}}
        {{--<script src="bower_components/isotope/js/item.js"></script>--}}
        {{--<script src="bower_components/isotope/js/layout-mode.js"></script>--}}
        {{--<script src="bower_components/isotope/js/isotope.js"></script>--}}
        {{--<script src="bower_components/isotope/js/layout-modes/vertical.js"></script>--}}
        {{--<script src="bower_components/isotope/js/layout-modes/fit-rows.js"></script>--}}
        {{--<script src="bower_components/isotope/js/layout-modes/masonry.js"></script>--}}
        <!-- endbower -->
        <!-- endbuild -->

        {{--<script src="bower_components/bxslider/jquery.bxSlider.min.js"></script>--}}

</body>
</html>
