@extends('layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Employees Table</h6>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Store</th>
                    <th scope="col">Skill</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
            @foreach($employeesList as $employee)
                <tr>
                    
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->age}}</td>
                    <td>{{$employee->store_name}}</td>
                    <td>{{$employee->skill_name}}</td>
                    <td>{{$employee->status}}</td>
                    <td> <button type="button" class="btn btn-square btn-success m-2" onclick="window.location='{{route("showEditEmployee", [$employee->id])}}'"><i class="fa fa-cog"></i></button></td>


                </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
        <span>
            {{$employeesList->links()}}
        </span>
    </div>
</div>
</div>
</div>

@endsection