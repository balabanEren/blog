@extends("front.layouts.master")
@section("title")
    Blog Site
@endsection
@section("content")

    <div class="col-md-10 col-lg-8 col-xl-7">
        @include("front.widgets.articalWidget")
        <!-- Divider-->

    </div>
@include("front.widgets.categoryWidget")
@endsection
