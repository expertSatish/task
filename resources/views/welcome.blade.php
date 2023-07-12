@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Total Blogs: {{ count($blogs) }}</h2>
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-4">
            <div class="card p-4">
                <a style="text-decoration: none;" href="{{ url('blog-detail', $blog->slug) }}"><img class="card-img-top"
                        src="{{ asset($blog->image) }}" alt="Card image" style="width:100%"></a>
                <div class="card-body">
                    <a style="text-decoration: none;" href="{{ url('blog-detail', $blog->slug) }}">
                        <h4 class="card-title">{{ $blog->title }}</h4>
                    </a>
                    <p class="card-text">{{ $blog->content }}</p>
                    <div>
                        <button class="btn btn-primary p-2" onclick="likeBlog({{ $blog->id }}, 'like')">Like</button>
                        <span id="likesCount_{{ $blog->id }}">{{ $blog->likes }}</span>
                        <button class="btn btn-primary" onclick="likeBlog({{ $blog->id }}, 'dislike')">Dislike</button>
                        <span id="dislikesCount_{{ $blog->id }}">{{ $blog->dislikes }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function likeBlog(blogId, action) {
        axios.post('/like', { blog_id: blogId, action: action })
            .then(function (response) {
                var likesCountElement = document.getElementById('likesCount_' + blogId);
                likesCountElement.innerText = response.data.likes_count;

                var dislikesCountElement = document.getElementById('dislikesCount_' + blogId);
                dislikesCountElement.innerText = response.data.dislikes_count;
            })
            .catch(function (error) {
                console.log(error);
            });
    }
</script>
@endsection
