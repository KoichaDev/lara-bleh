 @props(['post' => $post])

 <div class="mb-4">
     <a href="{{ route('users.posts', $post->user) }}"
        class="font-bold">{{ $post->user->name }}</a>
     <span class="text-gray-600 text-sm">
         {{-- {{ $post->created_at->toTimeString() }} --}}
         {{ $post->created_at->diffForHumans() }}
     </span>
     <p class="mb-2">{{ $post->body }}</p>

     {{-- @can() means can() whatever we can do --}}
     @can('delete', $post)
         <form action="{{ route('posts.destroy', $post) }}" method="post">
             @csrf
             @method('delete')
             <button type="submit" class="text-blue-500">Delete</button>
         </form>
     @endcan

     <div class="flex items-center">
         @auth
             @if (!$post->likedByUser(auth()->user()))

                 <form action="{{ route('posts.likes', $post) }}" method="post" class="mr-1">
                     @csrf
                     <button type="submit" class="text-blue-500">Like</button>
                 </form>
                 <form action="" method="post" class="mr-1">
                     @csrf
                     <button type="submit" class="text-blue-500">Unlike</button>
                 </form>

             @else
                 <form action="{{ route('posts.unlike', $post) }}" method="post"
                       class="mr-1">
                     @csrf
                     {{-- This is laravel to 'spoof' the method we want to use within this form, since delete doesn't exist on the method="delete" --}}
                     {{-- This will send a 'fake' delete request over to an end-point --}}
                     @method('DELETE')
                     <button type="submit" class="text-blue-500">Unlike</button>
                 </form>
             @endif
         @endauth

         <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
     </div>
 </div>
