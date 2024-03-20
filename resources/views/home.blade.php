@extends('layouts.app')
@section('content')
<h1>Tabella Attività</h1>
<table border="1" class="ms-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>Alias</th>
            <th>Lavorata</th>
            <th>Padre</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Azione</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>{{ $activity->id }}</td>
            <td>{{ $activity->alias }}</td>
            <td>{{ $activity->lavorata ? 'Si' : 'No' }}</td>
            <td>{{ $activity->padre }}</td>
            <td>{{ $activity->created_at }}</td>
            <td>{{ $activity->updated_at }}</td>
            <td>
                @if ($activity->allPreviousPadriWorked())

                    <a href="">Puoi lavorare su questa attività</a>

                @else

                    Non puoi lavorare su questa attività perché ci sono attività precedenti non lavorate.

                @endif


            </td>
        </tr>
                @endforeach
            </tbody>
        </table>
@endsection

