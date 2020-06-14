
<html>
<head>
    <title>QUIZZ</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>

    </style>
</head>


    <h1 align="center">LISTE DE JOUEURS</h1>

    <div id="result" class="table-responsive">


<div id="customerModal" class="modal fade">
    <div class="modal-dialog" id="scrollZone">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Records</h4>
            </div>
            <div class="modal-body">
                <label></label>
                <input type="text" name="nom" id="nom" class="form-control" />
                <br />
                <label>Enter Last Name</label>
                <input type="text" name="prenom" id="prenom" class="form-control" />
                <br />
            </div>
            <div class="modal-footer">
                <input type="hidden" name="customer_id" id="customer_id" />
                <input type="submit" name="action" id="action" class="btn btn-success" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    </div>
        <div id="load_data"></div>
        <div id="load_data_message"></div>
<script src="../asset/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        fetchUser(); //This function will load all data on web page when page load
        function fetchUser() // This function will fetch data from table and display under <div id="result">
        {
            var action = "Load";
            $.ajax({
                url : "functions/action.php", //Request send to "action.php page"
                method:"POST", //Using of Post method for send data
                data:{action:action}, //action variable data has been send to server
                success:function(data){
                    $('#result').html(data); //It will display data under div tag with id result
                }
            });
        }

        //  Scroll
        var limit = 4;
        var start = 0;
        var action = 'inactive';
        function load_country_data(limit, start)
        {
            $.ajax({
                url : "functions/action.php",
                method:"POST",
                data:{limit:limit, start:start},
                cache:false,
                success:function(data)
                {
                    $('#load_data').append(data);
                    if(data == '')
                    {
                        $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                        action = 'active';
                    }
                    else
                    {
                        $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
                        action = "inactive";
                    }
                }
            });
        }

        if(action == 'inactive')
        {
            action = 'active';
            load_country_data(limit, start);
        }
        $(window).scroll(function(){
            if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
            {
                action = 'active';
                start = start + limit;
                setTimeout(function(){
                    load_country_data(limit, start);
                }, 1000);
            }
        });


                $(document).on('click', '.update', function(){
            var id = $(this).attr("id"); //This code will fetch any customer id from attribute id with help of attr() JQuery method
            var action = "Select";   //We have define action variable value is equal to select
            $.ajax({
                url : "functions/action.php",   //Request send to "action.php page"
                method:"POST",    //Using of Post method for send data
                data:{id:id, action:action},//Send data to server
                dataType:"json",   //Here we have define json data type, so server will send data in json format.
                success:function(data){

                    $('#customerModal').modal('show');
                    $('.modal-title').text("Update Records");
                    $('#action').val("Update");
                    $('#customer_id').val(id);
                    $('#nom').val(data.nom);
                    $('#prenom').val(data.prenom);
                }
            });
        });

        $(document).on('click', '.delete', function(){
            var id = $(this).attr("id");
            if(confirm("Are you sure you want to remove this data?"))
            {
                var action = "Delete";
                $.ajax({
                    uurl : "functions/action.php",   //Request send to "action.php page"
                    method:"POST",     //Using of Post method for send data
                    data:{id:id, action:action}, //Data send to server from ajax method
                    success:function(data)
                    {
                        fetchUser();    // fetchUser() function has been called and it will load data under divison tag with id result
                        alert(data);    //It will pop up which data it was received from server side
                    }
                })
            }
            else  //Confim Box if cancel then
            {
                return false; //No action will perform
            }
        });
    });
</script>