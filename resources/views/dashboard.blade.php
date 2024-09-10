<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        <a class="btn btn-warning" href="{{route('post.add')}}" role="button">Add Post</a>
        <table>
            <thead>
                <th>Id</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created By</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->user->name}}</td>
                        <td><a href="{{ route('post.edit', $post->id) }}">Edit</a></td>
                        <td><a href="{{ route('post.delete', $post->id) }}">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
