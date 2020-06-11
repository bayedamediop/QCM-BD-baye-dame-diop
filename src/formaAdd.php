<form action="" method="POST" >

    <div class="row">
        <div class="col-75">
            <label class="form-group for="question">Questions</label>
        </div>
        <div class="form-group">
            <textarea class="form-control" id="question" name="question" style="height:60px"></textarea>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div >
            <label class="form-group for="point">Score</label>
        </div>
        <div class="form-group">
            <input class="form-control" type="number" id="point" name="point" style="height:20px">
        </div>
    </div>

    <div id="inputs" >
        <div class="row">
            <div class="col-25">
                <label class="form-group for="type">Type</label>
            </div>
            <div  id="ty">
                <select  style="width: 280px; height: 30px;"class="form-group  " id="type" name="type">
                    <option value="">Choix la Type de Question</option>

                    <option value="choixmultiple">choix multiple </option>
                    <option value="choixsimple">choix simple </option>
                    <option value="choixtext">choix text</option>

                </select>

                <button type="button" class="button" id="btn_add" onclick="genere()">
                    <img src="../asset/Images/ajout.png"alt="" class="add" style="margin-left: 0px;">
                </button>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
    <div class="col-25">

        <div id="choix" class="form-group">
        </div>
    </div>
    <input type="submit" name="submit" id="submit" value="Submit">
</form >

<script src="../asset/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

    $(document).ready(function(){
        var i=0;
        $("#btn_add").click(function(){
            var type = $("#type").val();
            // alert("type");
            if(type =="choixmultiple"){
                // alert($("#typ"));
                i=i+1;
                $("#choix").append('<input type="text" id="row'+i+'" name="rep[]" class="rep" placeholder="Réponse'+i+'" style=width:230px; float:left; height: 30px;">',
                    '<input type="checkbox" id="row'+i+'" name="repc[]">',
                    '</button id="btn-remove">',
                    '<img  src="../asset/images/ic-supprimer.png\">',
                    '</button >');
            }
            if(type =="choixsimple"){
                // alert($("#typ"));
                i=i+1;
                $("#choix").append('<input type="text" id="row'+i+'"  name="rep[]" class="rep" placeholder="Réponse'+i+'" style=width:230px; float:left; height: 30px;">',
                    '<input type="radio" id="row'+i+'" name="repr[]">',
                    '</button  id="btn-remove">',
                    '<img src="../asset/images/ic-supprimer.png\">',
                    '</button >' );
            }
            if(type =="choixtext"){
                // alert($("#typ"));

                $("#choix").append('<textarea name="rep" placeholder="Réponse" style=width:230px; float:left; height: 30px;" name="name[]"></textarea>' );
            }
        });
        $(document).on('click','#btn-remove',function(){
            var btn_id = $('this').attr("id");
            $("#row"+btn_id+"").remove();
        });
        $("#submit").click(function(){
            var question = $("#question").val();
            var point = $("#point").val();
            var rep = $(".rep").val();

            var donnes ='question='+question+'&point='+point+'&rep='+rep;

            $.ajax({
                method : "POST",
                url : "functions/question.php",
                data : donnes,
                success : function (){
                    alert("Send");
                    console.log(donnes);
                    alert(donnes);
                }
            });
        });
    });

alert('foaa');


</script>