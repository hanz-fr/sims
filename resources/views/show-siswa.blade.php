@extends('layouts.main')

@section('content')
  <table>
    <tr>
      <td>NIS</td>
      <td>{{ $res->nis }}</td>
    </tr>
    <tr>
      <td>NISN</td>
      <td>{{ $res->nisn }}</td>
    </tr>
  </table>
@endsection