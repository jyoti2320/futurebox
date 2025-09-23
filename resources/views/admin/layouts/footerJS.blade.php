<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
<script>
CKEDITOR.editorConfig = function( config ) {
    config.versionCheck = false;
};

$(document).ready(function () {
    CKEDITOR.replace('editor',{
        allowedContent: true,
        extraAllowedContent: '*(*);*{*};*[*]',
    });
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2', {
        toolbar: [
            ['BulletedList'],
        ]
    });
});
</script>

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{url('admin/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{url('admin/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{url('admin/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{url('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

  <script src="{{url('admin/assets/vendor/js/menu.js')}}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{url('admin/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

  <!-- Main JS -->
  <script src="{{url('admin/assets/js/main.js')}}"></script>

  <!-- Page JS -->
  <script src="{{url('admin/assets/js/dashboards-analytics.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


  <!-- Place this tag in your head or just before your close body tag. -->

<script>
     toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "4000",       // 4 seconds
        "extendedTimeOut": "1000"
    }
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    @if (Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @endif

    @if (Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
    @endif

    @if (Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
    @endif

    @if (Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
    @endif
</script>
<script>
    document.getElementById('blog_title').addEventListener('input', function () {
        let title = this.value;
        let slug = title
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, '') // remove special chars
            .replace(/\s+/g, '-')         // replace spaces with hyphen
            .replace(/-+/g, '-');         // remove multiple hyphens

        document.getElementById('slug').value = slug;
    });
</script>
</body>

</html>
