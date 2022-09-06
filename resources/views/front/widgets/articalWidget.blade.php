@if(count($articles)>0)
    @foreach($articles as $article)
        <div class="post-preview">
            <a href="{{route("blok_single",$article->slug)}}">
                <h2 class="post-title">{{$article->title}}</h2>

                <img src="{{ asset('storage/PHP_image/'.$article->image) }}" class="thumb_image">

                <h3 class="post-subtitle">{{Str::limit($article->context,50)}}</h3>
            </a>

            <p class="post-meta">
                <a href="#!">Category: {{$article->getCategory->name}}</a>
                {{$article->created_at->diffforHumans()}}
            </p>
        </div>

        @if(!$loop->last)
            <hr class="my-4"/>
        @endif
    @endforeach
    <!-- Divider-->
    <hr class="my-4"/>
    <!-- Pager-->
    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
            →</a></div>
    {{$articles->links()}}
@endif


@if(count($articles)<=0)
    <div class="alert alert-danger">
        <h1>Artical not found</h1>
    </div>
@endif
