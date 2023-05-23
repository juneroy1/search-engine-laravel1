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
            <h1>Register Programming Details</h1>
            <form action="programming" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputPassword5" class="form-label"
                            >Programming Name</label
                        >
                        <input
                            required
                            type="text"
                            id="name"
                            class="form-control"
                            name="name"
                            aria-labelledby="name"
                        />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="details" class="form-label">Details</label>
                        <textarea
                            rows="20"
                            cols="20"
                            id="details"
                            name="details"
                            class="form-control"
                            aria-labelledby="details"
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
            <h1>Programming list</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Programming Language Name</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programs as $program)
                    <tr>
                        <th scope="row">{{$program->id}}</th>
                        <td>{{$program->name}}</td>
                        <td>{!!$program->details !!}</td>
                        <td>
                            <a
                                href="/program/{{$program->id}}/edit"
                                class="btn btn-primary"
                                >Edit</a
                            >
                            <form
                                action="/program/{{$program->id}}"
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
