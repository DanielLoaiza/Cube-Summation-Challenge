@extends('main')
@section('content')

@if (isset($output))
<ul>
    @foreach ($output as $queryResult)
      <li>{{ $queryResult }}</li>
    @endforeach
</ul>
@endif
@if (isset($error))
{{ $error }}
@endif
@endsection

