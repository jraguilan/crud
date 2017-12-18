@extends('layouts.default')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transactions CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('itemCRUD.create') }}"> Create New Item</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Purchase</th>
            <th>Amount</th>
            <th>Operator</th>
            <th>User</th>
            <th>Date Purchase</th>
            <th>Date Updated</th>
            <th>Remarks</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($transactions as $key => $item)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $item->id }}</td>
        <td>{{ $item->purchase }}</td>
        <td>{{ $item->amount }}</td>
        <td>{{ $item->operator }}</td>
        <td>{{ $item->actor }}</td>
        <td>{{ $item->created_at }}</td>
        <td>{{ $item->updated_at }}</td>
        <td>{{ $item->remarks }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('itemCRUD.show',$item->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('itemCRUD.edit',$item->id) }}">Edit</a>
            
            Form::open(['method' => 'DELETE','route' => ['itemCRUD.destroy', $item->id],'style'=>'display:inline']); 
             Form::submit('Delete', ['class' => 'btn btn-danger']);
             Form::close();
            
        </td>
    </tr>
    @endforeach
    </table>

 
  echo $items->render(); 
  

@endsection