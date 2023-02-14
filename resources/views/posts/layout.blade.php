<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 CRUD with Image Upload Application - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        .container{
            margin-top:50px;
        }
        .create{
            width: 60%;
            margin:auto;
        }
    </style>
</head>

<body>
  
<div class="container">
    @yield('content')
</div>

<script type="text/javascript">
    $('#image').change(function(){
           
    let reader = new FileReader();
    reader.onload = (e) => { 
      $('#preview-image').attr('src', e.target.result); 
    }
    reader.readAsDataURL(this.files[0]); 
  
   });
  </script>
</body>
</html>