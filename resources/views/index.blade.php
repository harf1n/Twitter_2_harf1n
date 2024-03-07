<!DOCTYPE html>
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

@auth
    <div class="header">
        <h2>Twitter 2</h2>
        <div class="header-btns">

            <div class="header-btn">
                <form action="/myposts" method="GET">
                    @csrf

                    <button style="background: #008ac5; color: #000; font-size: 1.1em;">My posts</button>

                </form>
            </div>
            <div class="header-btn">
                <form action="/" method="GET">
                    @csrf

                    <button style="background: #008ac5; color: #000; font-size: 1.1em;">All posts</button>

                </form>
            </div>
            <div class="header-btn" style="background: #000;">
                <form action="/logout" method="POST">
                    @csrf

                    <button style="background: #000; color: #008ac5; font-size: 1.1em;">Log out</button>

                </form>
            </div>
        </div>
    </div>
    <div class="posts">

        <div>

            <form action="/create-post" method="POST">
                @csrf
                <div class="new-post">

                    <h2>Create a New post</h2>
                    <input type="text" name="title" placeholder="post title">
                    <textarea name="body" placeholder="Type in..."></textarea>
                    <button>Post</button>
                </div>
            </form>
        </div>

        {{--        <iframe width="110" height="200" src="https://www.myinstants.com/instant/damn/embed/" frameborder="0" scrolling="no"></iframe>--}}
        <div class="gen-posts">

            @foreach($posts as $post)
                <div class="gen-post">
                    <h2 class="author">{{$post->user->name}}</h2>
                    <div class="content">
                        <h3 class="title">{{$post['title']}}</h3>
                        <h4 class="post-text">{{$post['body']}}</h4>
                    </div>
                    <div class="post-btns">
                        <a href="/edit-post/{{$post->id}}">Edit</a>
                        <form action="/del-post/{{$post->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="log">
        <div class="register">
            <h2 style="color: #008ac5; font-size: 2em">Register</h2><br>
            <form action="/register" method="POST">
                @csrf
                <input name="name" type="text" placeholder="username">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button class="start-button">Register</button>
                <br>
            </form>
        </div>
        <h2 style="color: #008ac5; margin: 20px 0;">Already have account?</h2>
        <div class="login">
            <h2 style="color: #008ac5; font-size: 2em">Login</h2><br>
            <form action="/login" method="POST">
                @csrf
                <input name="loginname" type="text" placeholder="username">
                <input name="loginpassword" type="password" placeholder="password">
                <button class="start-button">Log in</button>
                <br>
            </form>
        </div>
    </div>
@endauth


</body>
</html>
