
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../asset/css/question.CSS">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>

</head>
<body>


<!-- <div class="container"> -->

  <form action="" method="POST" id="forme" >
  <div class="row">
      <div class="col-75">
        <label for="question">Questions</label>
      </div>
      <div class="form-group">
        <textarea class="form-control" id="question" name="question" style="height:60px"></textarea>
      </div>
      </div>
      <br>
    <br>
      <div class="row">
      <div >
        <label  for="point">Score</label>
      </div>
      <div class="form-group">
        <input class="form-control" type="number" id="point" name="point" style="height:20px">
      </div>
      </div>

   <div id="inputs" >
    <div class="row">
      <div class="col-25">
        <label for="type">Type</label>
      </div>
      <div  id="ty">
        <select  style="width: 280px; height: 30px;"class="form-group  " id="type" name="type">
        <option value="">Choix la Type de Question</option>

          <option value="choixmultiple">choix multiple </option>
         <option value="choixsimple">choix simple </option>
        <option value="choixtext">choix text</option>

     </select>
      </div>
    </div>
    </div>

          <input type="submit" name="submit" id="submit" value="Submit">
  </form >

                  <script src="../asset/jquery/dist/jquery.min.js"></script>
           <script type="text/javascript">
           $(document).ready(function(){

            $("#submit").click(function(){

              var question = $("#question").val();
              var point = $("#point").val();
              var type = $("#type").val();

                    var donnes ='question='+question+'&point='+point+'&type='+type;
              $.ajax({
                        method : "POST",
                        url : "functions/question.php",
                        data : donnes,
                  success : function (){
                      alert("Send");
                      console.log(donnes);
                  }
                    });
           });
           });
           </script>
</body>
</html>