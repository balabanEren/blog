@extends("front.layouts.master")
@section("title")

    {{$currentPage->title}}
@endsection
@section("img")
    {{$currentPage->image}}
@endsection
@section("content")

    <div class="col-md-8 col-xl-6">
      <p>{{$currentPage->content}}</p>

    </div>

    @include("front.widgets.categoryWidget")
@endsection
