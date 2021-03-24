<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP With AJAX</title>
</head>
<body>
    <table id="main" border="0" cellspacing="0">
        <tr>
            <td id="header">
                <h1>PHP With AJAX</h1>
                <div id="search-bar">
                    <label>Search</label>
                    <input type="text" id="search" autocomplete="off">
                </div>
            </td>
        </tr>
        
        <tr>
            <td id="table-form">
                First Name: <input type="text" id="fname">
                Last Name: <input type="text" id="lname">
                <input type="submit" id="save-button" value="Save">
            </td>
        </tr>
        <tr>
            <td id="table_data">
            </td>
        </tr>
    </table>
    <script src="jquery-3.5.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadTable(){
                $.ajax({
                    url: "load.php",
                    type: "POST",
                    success: function(data){
                        $("#table_data").html(data);
                    }
                });
            }
            loadTable();
            $("#save-button").on("click", function(e){
                e.preventDefault();
                var fname = $("#fname").val();
                var lname = $("#lname").val();

                $.ajax({
                    url : "insert.php",
                    type : "POST",
                    data : {first_name : fname, last_name : lname},
                    success:function(data){
                       if(data == 1){
                        loadTable();
                       }
                       else{
                           alert("Cannot Save Data");
                       }
                    }
                });
            })
            $("#search").on("keyup", function(){
                var search_term = $(this).val();
                $.ajax({
                    url : "search.php",
                    type : "POST",
                    data : {search:search_term},
                    success: function(data){
                        $("#table_data").html(data);
                    }
                })
            })
    
        });
    </script>
    </body>
</html>
</body>
</html>