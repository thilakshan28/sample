{{auth()->user()->name}}
<form method="post" action="{{ route('post.update',$post->id) }}">
    @csrf
    @method('PUT')
    <label>
        Title
    </label>
    <input type="text" name="title" value="{{$post->title}}">
    <label>
        Content
    </label>
    <textarea name="content" >{{$post->content}}</textarea>
    <button type="submit">Submit</button>
</form>