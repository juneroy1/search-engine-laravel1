@extends('layouts.app')
<!--  -->
@section('content')
<div class="main">
    <img src="images/Explorium.jpg" alt="" class="explorium" />
    <div class="searchbar">
        <span class="material-icons searchicon">search</span>
        <form action="/results" method="GET">
            <input
                required
                class="inputfirstsearch"
                type="text"
                placeholder="Search"
                aria-label=".form-control-lg example"
                id="myInput"
                name="result"
            />
            <button id="myBtn" style="display: none" type="submit">
                Submit
            </button>
        </form>
    </div>
    <div class="recentsearch">
        <div class="row">
            <div class="col-md-12 text-center">
                @if($histories)
                <p for="">Recent search:</p>
                @foreach($histories as $history)
                <p>
                    <a
                        href="/results?result={{$history->search}}"
                        >{{$history->search}}</a
                    >
                </p>
                @endforeach

                <!-- end of if -->
                @endif
            </div>
        </div>
    </div>
</div>

<!-- <div
    class="container d-flex flex-column justify-content-center align-items-center"
    style="height: 100vh"
>
    <h1>Explorium</h1>
    <form class="w-50 form-control-lg" action="/results" method="GET">
        <input
            required
            class="form-control form-control-lg w-100"
            type="text"
            placeholder="Search"
            aria-label=".form-control-lg example"
            id="myInput"
            name="result"
        />
        <button id="myBtn" style="display: none" type="submit">Submit</button>
    </form>
    @if($histories)
    <label for="">Recent search:</label>
    @foreach($histories as $history)
    <a href="/results?result={{$history->search}}">{{$history->search}}</a>
    @endforeach

    @endif
</div> -->
@endsection
