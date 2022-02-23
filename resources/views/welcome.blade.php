<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>

    <div class="p-5">
        <div class="float-end">
            <button id='btnExport' class='btn btn-primary mb-3'>Export Records</button>
        </div>
        <div class="clearfix"></div>
        <table class='table table-bordered table-hover'>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->middlename }}</td>
                <td>{{ $user->lastname }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
    <script>
       $('#btnExport').click(function () {
           $.ajax({
               url : 'export',
               method : 'POST',
               success : function (response) {
                   if(response.success) {
                        alert('success');
                   }
               },
           });
       });
    </script>
</body>
</html>