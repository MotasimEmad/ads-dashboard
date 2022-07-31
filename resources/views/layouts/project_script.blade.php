<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
    function whatsapp($id) 
    {
        var id = $id;
        var dataString = {id: id}; 

        $.ajax({
            url: '/whatsapp_total',
            type: 'GET',
            dataType:'json',
            data: dataString,
            contentType: 'application/json; charset=utf-8',
                    success: function(data){
                        console.log('ok');
                        console.log(data);
                    },
        });
    }
</script>

<script>
    function phone($id) 
    {
        var id = $id;
        var dataString = {id: id}; 

        $.ajax({
            url: '/phone_total',
            type: 'GET',
            dataType:'json',
            data: dataString,
            contentType: 'application/json; charset=utf-8',
                    success: function(data){
                        console.log('ok');
                        console.log(data);
                },
        });
    }
</script>
