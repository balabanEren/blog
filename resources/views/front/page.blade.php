@extends("front.layouts.master")
@section("title")
    {{$artical->title}}
@endsection
@section("img")
    {{ asset('storage/images/PHP_image').'/'.$artical->image }}
@endsection
@section("content")

    <div class="col-md-8 col-xl-6">s
      <p>lorem5..</p>
        <p>lorem5..</p>
        <p>lorem5..</p>
    </div>

    @include("front.widgets.categoryWidget")
@endsection
