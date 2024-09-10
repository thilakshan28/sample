{{auth()->user()->name}}
<form method="post" action="{{ route('post.destroy',$post->id) }}">
    @csrf
    @method('DELETE')
    <p>Are you sure you want to delete?</p>
    <p>follwing will be deleted</p>
    <p>Title : {{$post->title}}</p> 
    <button type="submit">Delete</button>
</form>