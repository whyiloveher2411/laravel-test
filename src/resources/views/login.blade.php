<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        *{
            box-sizing:border-box;
        }
        body{
            display: flex;
            min-height:100vh;
            justify-content: center;
            align-items: center;
        }
        .input-field{
            width: 100%;
            border: 1px solid #b8a9a9;
            padding: 10px;
            border-radius: 4px;
        }
        .input-field:focus-visible{
            outline: 1px solid #7474ee;
        }
    </style>
</head>
<body>

    <form style="width:100%;max-width:300px;" action="{!!route('login')!!}" method="POST">
        @csrf
        <input value="{!!request()->old('username')!!}" class="input-field" type="text" name="username">
        @if($errors->any())
        <h4 style="color:red;">{{$errors->first()}}</h4>
        @endif
        <button type="submit" style="width:100%;margin-top:16px;padding:10px;">Submit</button>
    </form>

    <script>
        @if ($alertNotification = session('alertNotification'))
            window.addEventListener("load", () => {
                setTimeout(() => {
                    alert('{!!$alertNotification!!}');
                }, 500);
            });
        @endif
    </script>
</body>
</html>