<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $('#search').on('keyup',function()
    {
        $value=$(this).val();

        if($value)
        {
            $('.alldata').hide();
            $('.searchdata').show();
        } else {
            $('.alldata').show();
            $('.searchdata').hide();
        }

        $.ajax({
            type:'get',
            url:'{{URL::to('search')}}',
            data:{'search':$value},

            success:function(data)
            {
                console.log(data);
                $('#Content').html(data);
            }
        });
    })
</script>