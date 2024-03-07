<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/app.css">
    <title>Document</title>
</head>
<body>
<div class="edit">
    <h1>Edit post</h1>
    <div class="edit-form">
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="edit-form-content">
                <input type="text" name="title" value="{{$post->title}}">
                <textarea name="body">{{$post->body}}</textarea>
                <button>Save changes</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>