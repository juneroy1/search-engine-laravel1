@extends('layouts.app')
<!--  -->
@section('content')
     <div
            class="container d-flex flex-column justify-content-start align-items-center"
            
        >
            <a href="/" style="text-decoration: none;">
            <img src="images/Explorium.jpg" alt="" class="explorium" />
            </a>
            <form class="w-50 form-control-lg" action="/results" method="GET">
                <input
                    style="z-index: 100; position: relative;"
                    required
                    class="form-control form-control-lg w-100"
                    type="text"
                    value="{{ $search }}"
                    placeholder="Search"
                    aria-label=".form-control-lg example"
                    id="myInput"
                    name="result"
                />
                <button id="myBtn" style="display: none" type="submit">
                    Submit
                </button>
            </form>
           
            @if(count($results) <= 0)
            <div class="card mt-4 w-50">
                <div class="card-body">
                    <h5 class="card-title">Sorry, no records found</h5>
                </div>
            </div>
            @endif

            <!-- it will fetch or loop one by one the result, this $results variable is from the PageController and function results  -->
            @foreach($results as $result)
            <div class="card mt-4 w-50">
                <div class="card-body cursor-pointer">
                    
                    <!-- if column category == programming then the link/url/route to view this is 
                    programming/{programming} with GET method 
                    -->
                    @if($result->category == "programming")
                    <a href="{{ "/programming/$result->id"}}">
                    @endif
                    
                    <!-- if column category == school then the link/url/route to view this is 
                    school/{school} with GET method 
                    -->
                    @if($result->category == "school")
                    <a href="{{ "/school/$result->id"}}">
                    @endif

                    <!-- if column category == movie then the link/url/route to view this is 
                    movie/{movie} with GET method 
                    -->
                    @if($result->category == "movie")
                    <a href="{{ "/movie/$result->id"}}">
                    @endif
                        
                    <!-- if column category == music then the link/url/route to view this is 
                    music/{music} with GET method 
                    -->
                    @if($result->category == "music")
                    <a href="{{ "/music/$result->id"}}">
                    @endif


                    <!-- if column category == animal then the link/url/route to view this is 
                    animal/{animal} with GET method 
                    -->
                    @if($result->category == "animal")
                    <a href="{{ "/animal/$result->id"}}">
                    @endif
                    
                    <!-- if column category == application then the link/url/route to view this is 
                    application/{application} with GET method 
                    -->
                     @if($result->category == "application")
                    <a href="{{ "/application/$result->id"}}">
                    @endif


                    <!-- if column category == country then the link/url/route to view this is 
                    country/{country} with GET method 
                    -->
                    @if($result->category == "country")
                    <a href="{{ "/country/$result->id"}}">
                    @endif


                    <!-- if column category == book then the link/url/route to view this is 
                    book/{book} with GET method 
                    -->
                     @if($result->category == "book")
                    <a href="{{ "/book/$result->id"}}">
                    @endif

                    <!-- if column category == student then the link/url/route to view this is 
                    student/{student} with GET method 
                    -->
                    @if($result->type == "student")
                    <a href="{{ "/student/$result->id"}}">
                    @endif

                    <!-- if column category == teacher then the link/url/route to view this is 
                    teacher/{teacher} with GET method 
                    -->
                    @if($result->type == "teacher")
                    <a href="{{ "/teacher/$result->id"}}">
                    @endif


                    <!-- if column category == color then the link/url/route to view this is 
                    color/{color} with GET method 
                    -->
                    @if($result->category == "color")
                    <a href="{{ "/color/$result->id"}}">
                    @endif

                        <h5 class="card-title">
                            @if($result->first_name)
                            {{$result->first_name}}
                            @endif @if($result->name)
                            {{$result->name}}
                            @endif
                        </h5>
                    </a>

                    <!-- check if last_name column is exist then display last_name -->
                    @if($result->last_name)
                    <p class="card-text">
                        {{$result->last_name}}
                    </p>
                    @endif

                     <!-- check if address column is exist then display address -->
                    @if($result->address)
                    <p class="card-text">                       
                        {{$result->address}}
                    </p>
                    @endif


                    @if($result->description || $result->details)
                    <div
                        class="card-text overflow-hidden"
                        style="max-height: 200px"
                    >
                        {!!$result->description!!} {!!$result->details!!}
                    </div>
                    @endif
                    
                </div>
            </div>
            @endforeach
        </div>
    <!-- </body> -->
    @endsection
   

      
