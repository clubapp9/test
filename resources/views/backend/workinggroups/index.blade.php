@extends ('backend.layouts.master')

@section ('title', trans('menus.pages_management'))

@section('page-header')
    <h1>
        {{ trans('menus.pages_management') }}
        <small>{{ trans('menus.all_pages') }}</small>
    </h1>
@endsection

@section('content')

    <h1>Workinggroups <a href="{{ route('admin.workinggroups.create') }}" class="btn btn-primary pull-right btn-sm">Add New Workinggroups</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th><th>Moderator Id</th><th>About</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($workinggroups as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('/workinggroups', $item->working_group_id) }}">{{ $item->name }}</a></td><td>{{ $item->moderator_id }}</td><td>{{ $item->about }}</td>
                    <td>
                        <a href="{{ route('admin.workinggroups.edit', $item->working_group_id) }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /

                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['admin.workinggroups.destroy', $item->working_group_id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $workinggroups->render() !!} </div>
    </div>

@endsection
