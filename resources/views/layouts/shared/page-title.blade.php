<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <p class="breadcrumb-item active">
                    @if ($sub_title == "")
                        <a class="breadcrumb-item active" href="{{ route("any", "index") }}">Dashboard</a> / {{ $page_title }}
                    @else
                        <a class="breadcrumb-item active" href="{{URL::previous()}}"><i class="ri-arrow-left-double-line"></i> </a>/ {{ $page_title }}
                    @endif</p>
                </ol>
            </div>
            <h4 class="page-title">{{ $page_title }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
