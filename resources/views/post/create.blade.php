{{auth()->user()->name}}
<form method="post" action="{{ route('post.store') }}">
    @csrf
    <label>
        Title
    </label>
    <input type="text" name="title">
    <label>
        Content
    </label>
    <textarea name="content" ></textarea>
    <button type="submit">Submit</button>
</form>