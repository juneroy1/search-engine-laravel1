@extends('layouts.app')
<!--  -->
@section('content')
<div
    class="container d-flex flex-column justify-content-start align-items-center"
    style="height: 100vh"
>
    <div class="card mt-4 w-100">
        <div class="card-body cursor-pointer">
            <!-- for displaying name or first_name and last_name -->
            <h5 class="card-title">
                Name:
                <!-- if first_name colum exist in table from database then display the first_name -->
                @if($result->first_name)
                {{$result->first_name}}
                @endif

                <!-- if middle_name colum exist in table from database then display the middle_name -->
                @if($result->middle_name)
                {{$result->middle_name}}
                @endif

                <!-- if last_name colum exist in table from database then display the last_name -->
                @if($result->last_name)
                {{$result->last_name}}
                @endif

                <!-- if name colum exist in table from database then display the name -->
                @if($result->name)
                {{$result->name}}
                @endif
            </h5>

            <!-- if address column exist in table from database then display address -->
            @if($result->address)
            <h5 class="card-title">Address: {{$result->address}}</h5>
            @endif

            <!-- if position column exist in table from database then display position -->
            @if($result->position)
            <h5 class="card-title">Position: {{$result->position}}</h5>
            @endif

            <!-- if birthdate column exist in table from database then display birthdate -->
            @if($result->birthdate)
            <h5 class="card-title">Birthdate: {{$result->birthdate}}</h5>
            @endif

            <!-- if email column exist in table from database then display email -->
            @if($result->email)
            <h5 class="card-title">Email: {{$result->email}}</h5>
            @endif

            <!-- if description or details column exist in table from database then display description -->
            <div class="card-text">
                <h5 class="card-title">Details:</h5>
                {!!$result->description!!} {!!$result->details!!}
            </div>
        </div>
    </div>
</div>
@endsection
