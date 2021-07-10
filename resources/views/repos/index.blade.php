@extends('layouts.main')

@section('title') Home Page @endsection

@section('content')
    <div class="s002">
        <form action="{{route('repos.search')}}" method="post">
            @csrf
            <fieldset>
                <legend>Search Repositories</legend>
            </fieldset>
            <div class="inner-form">
                <div class="input-field first-wrap">
                    <div class="icon-wrap">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <input id="search" type="text" name="language" placeholder="Which programming language ?" />
                </div>
                <div class="input-field second-wrap">
                    <div class="icon-wrap">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <input class="datepicker" id="depart" name="date" type="text" placeholder="created at: 10-01-2019" />
                </div>
                <div class="input-field fouth-wrap">
                    <select data-trigger="" name="limit">
                        <option value="10" selected>10</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="input-field fifth-wrap">
                    <button class="btn-search" type="submit">SEARCH</button>
                </div>
            </div>
        </form>
        <span class="note">* The fields are not required, Feel free to hit the search button to discover the popular repositories</span>
    </div>


@endsection
