<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@if(isset($settings) && $settings->title)
<title>{{ $title }} | {{$settings->title}} </title>
<meta content="Konveksi Tulungangung" name="description" />
<meta content="{{$settings->title}}" name="author" />
@else
<title>{{ $title }} | Nustra Group </title>
<meta content="Konveksi Tulungangung" name="description" />
<meta content="Nustra Studio" name="author" />
@endif

<!-- App favicon -->
<link rel="shortcut icon" href="/images/favicon.ico">
