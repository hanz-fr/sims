@extends('layouts.main')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="search">
        <input type="search" name="search" id="search" placeholder="Search here...">
    </div>
</div>

<table class="mt-10 text-center mb-5">
    <thead class="font-bold border border-black">
        <tr>
            <td class="px-10 py-5">NIS</td>
            <td class="px-10 py-5">NAMA</td>
            <td class="px-10 py-5">KELAS</td>
        </tr>
    </thead>
    <tbody class="border border-black alldata">
        @foreach ($siswa as $s)
            <tr>
                <td class="py-3">{{ $s->nis_siswa }}</td>
                <td class="py-3">{{ $s->nama_siswa }}</td>
                <td class="py-3">{{ $s->KelasId }}</td>
            </tr>
        @endforeach
    </tbody>
    <tbody id="Content" class="searchdata"></tbody>
</table>

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
@endsection