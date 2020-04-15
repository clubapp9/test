@extends ('backend.layouts.master')

@section ('title', trans('menus.csvimport_imported'))

@section('page-header')
    <h1>
        {{ trans('menus.csvimport_imported') }}
        <small>{{ trans('menus.all_imports') }}</small>
    </h1>
@endsection

@section('content')

    <h1>Manage </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>CSV Filename</th><th>CSV Created</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($csv_data as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{$item->csv_filename}}</td> <td>{{$item->created_at}}</td>
                    <td>
                        <a href="{{ url('admin/csvimport/'. $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['admin.csvimport.destroy', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $csv_data->render() !!} </div>
    </div>

@endsection
