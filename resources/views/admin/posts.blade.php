<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1 class="text-center pt-4">Search with Relationships in <strong class="text-danger">Laravel</strong></h1>
        <hr>
        <div class="row py-2">
            <div class="col-md-6">
                <h2><a href="" class="btn btn-success">Add New Post</a></h2>
            </div>
            <div class="col-md-6">
                <div class="form-goup">
                    <form method="get" action="/search">
                        <div class="input-group">
                            <input class="form-control" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-primary">Search</button>
    </div>
                    </form>
                </div>
            </div>
        </div>





        
    </div>
</x-app-layout>