@extends("front.layouts.master")
@section("title",$category->name)
@section("content")

    <div class="col-md-10 col-lg-8 col-xl-7">
        <!-- Post preview-->
        @include("front.widgets.articalWidget")


    </div>

@include("front.widgets.categoryWidget")
@endsection
