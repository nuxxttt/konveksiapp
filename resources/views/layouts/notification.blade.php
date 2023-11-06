@section('css')
    @vite(['node_modules/jquery-toast-plugin/dist/jquery.toast.min.css'])
@endsection
@if(session('success'))
<script>
    window.onload = function() {
        $.NotificationApp.send("{{ session('success') }}", [], 'top-right', 'rgba(0,0,0,0.2)', 'primary');
    };
</script>
@endif
@section('script-bottom')
    @vite(['resources/js/pages/toastr.init.js',])
@endsection
