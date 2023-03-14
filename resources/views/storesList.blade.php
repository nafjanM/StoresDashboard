@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Stores Table</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Store Type</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
            @foreach($storesList as $store)
                <tr>
                    
                    <td>{{$store->name}}</td>
                    <td>{{$store->address}}</td>
                    <td>{{$store->type_name}}</td>
                    <td>{{$store->status}}</td>
                    <td> <button type="button" class="btn btn-square btn-success m-2" onclick="window.location='{{route("showEditStores", [$store->id])}}'"><i class="fa fa-cog"></i></button></td>


                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
        <span>
            {{$storesList->links()}}
        </span>
    </div>
</div>
</div>
</div>

@endsection