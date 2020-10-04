@if(empty($contents->banner['banner']['value']))
<div class="page-title-area" style="background-image: url(/assets/images/banner3.jpeg);">
@else
<div class="page-title-area" style="background-image: url({{$contents->banner['banner']['value']}});">
@endif
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>{{$contents->name}}</h2>
                    {!!$settings['breadcrumbs']!!}
                </div>
            </div>
        </div>
    </div>
</div>
