@if(session('success'))
<div class="col-md-6 d-flex justify-content-end align-items-center">
    <div class="toast show align-items-end text-white bg-primary border-0 mb-4 top-right" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<script>
    // Get the toast element
    var toast = document.querySelector('.toast');

    // Set a timeout to hide the toast after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        var bootstrapToast = new bootstrap.Toast(toast);
        bootstrapToast.hide();
    }, 1500);
</script>

@endif




