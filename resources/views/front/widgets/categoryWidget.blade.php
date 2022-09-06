@isset($categories)
<div class="col-md-3">
    <div class="card-header">
        Category
    </div>
    <div class="list-group">
        @foreach($categories as $cat)
            <li class="list-group-item @if(Request::segment(2)==$cat->slug) active @endif" >
                <a href="{{route("category_name",$cat->slug)}}">{{$cat->name}}</a><span class="badge bg-danger float-right">{{$cat->articleCount()}}</span>
            </li>
        @endforeach
    </div>
</div>
@endisset
