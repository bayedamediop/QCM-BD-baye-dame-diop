
<input type="hidden" id="date" value="<?= $_POST['date'] ?>">
    <div id="scrollZone" class="col">
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Photo</th>
                <th>update</th>

            </tr>
        </thead>
        <tbody id="tbody">
            <tr class="text-center">
            </tr>
        </tbody>
    </table></div>

<script>
    $(document).ready(function(){

        const date = $('#date').val();
        let offset = 0;
        const tbody = $('#tbody');
        $.ajax({
                type: "POST",
                url : "functions/getJoueur.php",
                data: {limit:6,offset:offset,date:date},
                dataType: "JSON",
                success: function (data) {
                    tbody.html('')
                    printData(data,tbody);
                    offset +=6
                }
            });

            //  Scroll
        const scrollZone = $('#scrollZone')
        scrollZone.scroll(function(){
        //console.log(scrollZone[0].clientHeight)
        const st = scrollZone[0].scrollTop;
        const sh = scrollZone[0].scrollHeight;
        const ch = scrollZone[0].clientHeight;

        console.log(st,sh, ch);
        
        if(sh-st <= ch){
            $.ajax({
                type: "POST",
                url : "functions/getJoueur.php",
                data: {limit:6,offset:offset,date:date},
                dataType: "JSON",
                success: function (data) {
                    
                    printData(data,tbody);
                    offset +=6;
                }
            });
        }
           
        });
        function printData(data,tbody){
            $.each(data, function(indice,jeux){
                tbody.append(`
            <tr class="text-center">
                <td>${jeux.nom}</td>
                <td>${jeux.prenom}</td>
                <td>${jeux.photo}</td>
                <td><a id="button" href="functions/edite.php?id=${jeux.id}" >edite</a></td>
                <td><a id="button" onclick="ConfirmDelete()" href="functions/delete.php?id=${jeux.id}" >delete</a></td>
            </tr>
        `);
            });
        }

    });


</script> 