@extends("front.layouts.master")

@section("title")
    {{$artical->title}}
@endsection

@section("img")
    {{ asset('storage/images/PHP_image').'/'.$artical->image }}
@endsection

@section("content")

                <div class="col-md-8 col-xl-6">
                    {{$artical->context}}
                    <p><i> Number Of Hits: </i> <b>{{$artical->hit}}</b></p>
                </div>

            @include("front.widgets.categoryWidget")
@endsection
