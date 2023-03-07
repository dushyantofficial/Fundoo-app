<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fundoo App | {{$about[1]['page_title']}}</title>
    <style>
        .wrap {
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-sizing: border-box;
            height: 100vh;
            background-color: #eee;
            font-family: sans-serif;
            line-height: 1.5;
            letter-spacing: 1px;
        }

        .container {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            padding: 1rem;
            background-color: #fff;
            width: 768px;
            height: 100%;
            border-radius: 0.25rem;
            box-shadow: 0rem 1rem 2rem -0.25rem rgba(0, 0, 0, 0.25);
        }

        .container__heading {
            padding: 1rem 0;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .container__heading > h2 {
            font-size: 1.75rem;
            line-height: 1.75rem;
            margin: 0;
        }

        .container__content {
            flex-grow: 1;
            overflow-y: scroll;
        }

        .container__nav {
            border-top: 1px solid #ccc;
            text-align: right;
            padding: 2rem 0 1rem;
        }

        .container__nav > .button {
            background-color: #444499;
            box-shadow: 0rem 0.5rem 1rem -0.125rem rgba(0, 0, 0, 0.25);
            padding: 0.8rem 2rem;
            border-radius: 0.5rem;
            color: #fff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .container__nav > .button:hover {
            box-shadow: 0rem 0rem 1rem -0.125rem rgba(0, 0, 0, 0.25);
            transform: translateY(-0.5rem);
        }

        .container__nav > small {
            color: #777;
            margin-right: 1rem;
        }
    </style>
</head>
<body>

<main class="wrap">
    <section class="container">
        <div class="container__heading">
            <h2 style="color: #FFC100">{!!$about[1]['page_title']!!}</h2>
        </div>
        <div class="container__content">
            <p>{!!$about[1]['description']!!}</p>
        </div>
    </section>
</main>

</body>
</html>
