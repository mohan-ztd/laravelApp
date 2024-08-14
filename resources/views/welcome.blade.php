<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

          

        <style>                  
        body {
            font-family: Arial, sans-serif;
           // background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: auto;
            overflow: hidden;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
</style>

        <!-- Styles -->
        
    </head>
    <body class="antialiased">
        <div class="container">
        <h1>PHP Simple to do List App</h1>
        <div > 
        <input type="text" name="task_name" id="task_name" >
       
        <button type="button" class="btn btn-primary" onclick = "postTask()">Add Task</button>

         <button type="button" class="btn btn-primary" onclick = "getPost('')">All Task</button>
        </div>
        <div id="postD"></div>
    </div>
    </body>
    <script type="text/javascript">
    function postTask(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
             var name = $("#task_name").val();
               //alert(name);
                // processing ajax request    
                $.ajax({
                    url: "{{ route('postSubmit') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        name: name
                        
                    },
                    success: function(data) {
                        // log response into console
                        console.log(data);
                        getPost('');
                    }
                });
       

    }
    function getPost(val){
       
          
               
                // processing ajax request    
                $.ajax({
                    url: "{{ route('getPost') }}",
                    type: 'GET',
                    data:{
                        type:val
                    },
                    success: function(data) {
                        // log response into console
                       // alert(data);
                       $("#postD").html(data);
                    }
                });
       

    }
    function changeStatus(val){
    //alert(val);
        // update Status
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           //  var name = $("#task_name").val();
               
                // processing ajax request    
                $.ajax({
                    url: "{{ route('updateStatus') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id: val
                        
                    },
                    success: function(data) {
                        // log response into console
                       getPost(1);
                    }
                });
    }
    function deleteItem(val){

    if (confirm('Are you sure you want to delete this thing from the database?')) {
  // Save it!
  //console.log('Thing was saved to the database.');
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
           //  var name = $("#task_name").val();
               
                // processing ajax request    
                $.ajax({
                    url: "{{ route('deleteTask') }}",
                    type: 'POST',
                    dataType: "json",
                    data: {
                        id: val
                        
                    },
                    success: function(data) {
                        // log response into console
                       getPost();
                    }
                });
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
  
}

        
    }
    getPost();
    </script>
</html>
