<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
    </head>
    <body>
        <form action="/submit-sample" method="POST">
            @csrf
            <label>Title</label>
            <input type="text" name="title" /> <br />

            <label>Description</label>
            <input type="text" name="description" /> <br />
            <button type="submit">Submit</button>
        </form>
    </body>
</html>
