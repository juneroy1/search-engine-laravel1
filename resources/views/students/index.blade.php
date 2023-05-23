<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <div class="container mt-4">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">
                    ×
                </button>
                <strong>{{ $message }}</strong>
            </div>
            @endif @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">
                    ×
                </button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <h1>Register Student Form</h1>
            <form action="student" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >First name</label
                        >
                        <input
                            required
                            type="text"
                            id="first_name"
                            class="form-control"
                            name="first_name"
                            aria-labelledby="first_name"
                        />
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >Last name</label
                        >
                        <input
                            required
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-control"
                            aria-labelledby="last_name"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >Middle name</label
                        >
                        <input
                            required
                            type="text"
                            id="middle_name"
                            name="middle_name"
                            class="form-control"
                            aria-labelledby="middle_name"
                        />
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >Address</label
                        >
                        <input
                            required
                            type="text"
                            id="address"
                            name="address"
                            class="form-control"
                            aria-labelledby="address"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >Birthdate</label
                        >
                        <input
                            required
                            type="date"
                            id="birthdate"
                            name="birthdate"
                            class="form-control"
                            aria-labelledby="birthdate"
                        />
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email:</label>
                        <input
                            required
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            aria-labelledby="email"
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="description" class="form-label"
                            >Description</label
                        >
                        <textarea
                            rows="20"
                            cols="20"
                            id="description"
                            name="description"
                            class="form-control"
                            aria-labelledby="description"
                        ></textarea>
                        <!-- <input
                            type="date"
                            id="birthdate"
                            class="form-control"
                            aria-labelledby="birthdate"
                        /> -->
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mb-3">
                            Create
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container mt-4">
            <h1>Students list</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Middle name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->id}}</th>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->middle_name}}</td>
                        <td>{{$student->address}}</td>
                        <td>{!!$student->description !!}</td>
                        <td>
                            <a
                                href="/student/{{$student->id}}/edit"
                                class="btn btn-primary"
                                >Edit</a
                            >
                            <form
                                action="/student/{{$student->id}}"
                                method="POST"
                            >
                                @method('DELETE') @csrf
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    <script
        src="http://js.nicedit.com/nicEdit-latest.js"
        type="text/javascript"
    ></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"
    ></script>
</html>
