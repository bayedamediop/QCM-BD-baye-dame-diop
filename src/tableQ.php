
<input type="hidden" id="date" value="<?= $_POST['date'] ?>">
<div id="scrollZone" class="co">
    <table class="table table-striped">
        <thead>
        <tr class="text-center">


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
            url: "../src/functions/getQuestion.php",
            data: {limit:3,offset:offset,date:date},
            dataType: "JSON",
            success: function (data) {
                tbody.html('')
                printData(data,tbody);
                offset +=3
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
                    url: "../src/functions/getQuestion.php",
                    data: {limit:3,offset:offset,date:date},
                    dataType: "JSON",
                    success: function (data) {

                        printData(data,tbody);
                        offset +=3;
                    }
                });
            }

        })
    });
    function printData(data,tbody){
        $.each(data, function(indice,jeux){
            tbody.append(`
            <tr class="text-center">
                <td>${jeux.question}</td>


            </tr>
        `);
        });
    }
</script>