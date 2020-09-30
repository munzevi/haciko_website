@foreach(\App\Models\Setting::where('segment','Meta Tagler')->get() as $meta)
    @if($meta->key == 'canonical' || \Illuminate\Support\Str::contains($meta->key,'icon'))
        <link rel="{{$meta->key}}" href="{{$meta->value}}">
    @elseif(\Illuminate\Support\Str::startsWith($meta->key,'og'))
        <meta property="{{$meta->key}}" content="{{$meta->key}}" />
    @else
        <meta name="{{$meta->key}}" content="{{$meta->value}}"/>
    @endif
@endforeach

<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<!-- CSS Files -->
<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('backend/assets/css/paper-dashboard.min.css?v=2.0.1')}}" rel="stylesheet" />
