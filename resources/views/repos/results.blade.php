@extends('layouts.main')

@section('title') Results Page @endsection

@section('content')

    <div class="container">
        <div class="search-form">
            <form action="{{route('repos.search')}}" method="post">
                @csrf
                <p class="py-2 my-1">Discover The most popular repositories on GitHub <a href="{{route('home')}}" class="btn btn-primary"><i class="fas fa-home"></i></a></p>
                <div class="row my-3" id="search">
                    <div class="col-3 position-relative">
                        <div class="awesome-icon position-absolute">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <input type="text" class="form-control choices__inner pl-40" placeholder="Language"
                               name="language">
                    </div>
                    <div class="col-3 position-relative">
                        <div class="awesome-icon position-absolute">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                        <input type="date" class="form-control choices__inner datepicker pl-40" name="date"
                               placeholder="10-01-2019">
                    </div>
                    <div class="col-2">
                        <select data-trigger="" name="limit" id="limit" class="form-control">
                            <option value="10" selected>10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary w-100 search-btn">SEARCH</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="results">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Language</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Link</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($repos as $index => $repo)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$repo['name']}}</td>
                        <td>{{$repo['owner']['login']}}</td>
                        <td>{{$repo['language']}}</td>
                        <td>{{\Carbon\Carbon::parse($repo['created_at'])->format('d-m-Y')}}</td>
                        <td><a target="_blank" class="btn btn-danger" href="{{$repo['html_url']}}"><i
                                    class="fas fa-external-link-alt"></i></a></td>
                    </tr>
                @empty

                @endforelse


                </tbody>
            </table>
        </div>
    </div>

@endsection
