<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2018
        <div class="bullet"></div>
        Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>
<script src="{{ asset('web/js/jquery-3.6.0.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ asset('admin/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/modules/popper.js') }}"></script>
<script src="{{ asset('admin/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/js/stisla.js') }}"></script>


<!-- Template JS File -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('admin/js/page/features-post-create.js') }}"></script>




<script src="{{ asset('build/assets/toastr.min.js') }}"></script>

<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}")
    @endforeach
    @endif
</script>
@stack('admin-js')
</body>
</html>
