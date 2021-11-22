<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code quay về trang chủ bằng Jquery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script type="text/javascript">
        $(document).ready(function(){
            $('#cancel-button').click(function(){
                window.location='index.php'
            })
        });
    </script>
</head>
<body>
   <input type="button" value="cancel" name="cancel" id="cancel-button">
</body>
</html>