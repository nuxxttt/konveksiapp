<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                @if(isset($settings) && $settings->title)
                <script>document.write(new Date().getFullYear())</script> © {{$settings->title}}
                @else
                <script>document.write(new Date().getFullYear())</script> © Nustra Studio
                @endif
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
