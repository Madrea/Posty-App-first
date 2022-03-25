@props(['post' => $post])


    <div class="mb-4">
        <a href="{{ route('users.posts', $post->user) }}" class="post-author">{{ $post->user->name }}</a> 
        <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
    
        <p class="post-body">{{ $post->body }}</p>

        <div class="image-div">

            @if ($post->image_path)
               <img src="{{ asset('images/' . $post->image_path) }}" alt=" " class="image">
            @endif

        </div>

        <div class="div-buttons pb-3">

            <div class="like-div">
                @auth
                    @if (!$post->likedBy(auth()->user()))

                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                            @csrf
                            <button type="submit" class="like-unlike-button"><i class="fa-solid fa-thumbs-up pr-1"></i>Like</button>
                        </form>
                    @else
                        <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="like-unlike-button"><i class="fa-solid fa-thumbs-down pr-1"></i>Unlike</button>
                        </form>

                    @endif  
                    
                @endauth
                <span class="pl-2 like">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>               
            </div>

            <div class="del-edit-div">
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="like-unlike-button pr-3"><i class="fa-solid fa-trash pr-1"></i>Delete</button>
                    </form>
                @endcan

                @can('update', $post)
                    <form action="{{ route('posts.edit', $post) }}" method="get" class="mr-1">
                        @csrf
                        <button type="submit" class="like-unlike-button"><i class="fa-solid fa-pen-to-square pr-1"></i>Edit</button>
                    </form>
                @endcan
            </div>

            
        </div>

    </div>