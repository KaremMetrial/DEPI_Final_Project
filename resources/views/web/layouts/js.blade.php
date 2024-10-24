
<!--jquery library js-->
<script src="{{ asset('web/js/jquery-3.6.0.min.js') }}"></script>
{{--<script src="{{ asset('build/assets/app-DI6-W-r-.js') }}"></script>--}}
<!--bootstrap js-->
<script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('web/js/Font-Awesome.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('web/js/slick.min.js') }}"></script>
<!-- isotop js -->
<script src="{{ asset('web/js/isotope.pkgd.min.js') }}"></script>
<!-- simplyCountdownjs -->
<script src="{{ asset('web/js/simplyCountdown.js') }}"></script>
<!-- counter up js -->
<script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.countup.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('web/js/jquery.nice-select.min.js') }}"></script>
<!-- venobox js -->
<script src="{{ asset('web/js/venobox.min.js') }}"></script>
<!-- sticky sidebar js -->
<script src="{{ asset('web/js/sticky_sidebar.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('web/js/wow.min.js') }}"></script>
<!-- ex zoom js -->
<script src="{{ asset('web/js/jquery.exzoom.js') }}"></script>

<!--main/custom js-->
<script src="{{ asset('web/js/main.js') }}"></script>
<script src="{{ asset('build/assets/toastr.min.js') }}"></script>

<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
             toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>
@include('web.layouts.global-script')
@stack('web-js')
</body>

</html>
