@extends('backend.layouts.master')

@section('page_header')
  Yetkili Kullanıcı Alanı
@endsection
@section('content')
<div class="col-md-12">
  <div class="card ">
    <div class="card-header ">
      <h4 class="card-title">Hoşgeldin, {{Auth::user()->name}}</h4>
      <p>buraya biraz içerik eklememiz gerektiğinin farkında olduğumuzu umarım?</p>
    </div>
    <div class="card-body ">
      <div class="row">
        <div class="col-md-12">
            Yetkilerin :
            @foreach(Auth::user()->roles as $role)
                <div class="badge badge-pill badge-warning text-light" style="font-size: 14px; font-weight:600;text-transform: capitalize;"><small>{{$role->name}}</small></div>
            @endforeach
                <br>İzinlerin :
            @foreach(Auth::user()->getAllPermissions() as $perm)
                <div class="badge badge-pill badge-danger text-light" style="font-size: 14px; font-weight:600;text-transform: capitalize;"><small>{{$perm->name}}</small></div>
            @endforeach

          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
