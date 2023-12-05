@extends('layouts.admin')

@section('content')

<h3 class="d-inline-block">Lista Progetti</h3>
<div class="float-end">
    <h3 class="d-inline-block">Aggiungi</h3>
    <a href="{{route('admin.projects.create')}}" class="btn bg-black text-lime"><i class="fa-solid fa-plus"></i></a>
</div>


<table class="custom-table my-5">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Data</th>
        <th scope="col">Azioni</th>
        <th scope="col">Tipo</th>
        <th scope="col">Tecnologia</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->creation}}</td>
                <td>
                    <a href="{{route('admin.projects.show', $project)}}" class="btn bg-black text-lime"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.projects.edit', $project)}}" class="btn bg-black text-lime"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form
                        class="d-inline-block"
                        action="{{route('admin.projects.destroy', $project->id)}}"
                        method="POST"
                        onsubmit="return confirm('Sei sicuro di voler eliminare?')"
                                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn bg-black text-lime"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
                <td>{{$project->type?->name ?? '-'}}</td>
                <td>@forelse ($project->technology as $technology)
                    <span class="badge underline bg-lime text-black"><a href="{{route ('admin.technology.projectlist', $technology)}}" class="text-decoration-none text-black">{{$technology->name}}</a></span>
                @empty
                    -
                @endforelse
                </td>
            </tr>

        @endforeach
    </tbody>
  </table>

  {{ $projects->links() }}
@endsection
