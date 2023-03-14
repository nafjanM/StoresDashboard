@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form method="post" action="{{route("updateProfile" , [$employee[0]->id])}}">
                    @csrf
                    @method('PATCH')
                            <h6 class="mb-4">Update {{$employee[0]->name}} Profile</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="name" value="{{$employee[0]->name}}">
                                <label for="floatingInput">Employee Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="integer" class="form-control" id="floatingAge" name="age" value="{{$employee[0]->age}}">
                                <label for="floatingAge">Age</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="storeId"
                                    aria-label="Floating label select example">
                                    <option selected value="{{$employee[0]->store_id}}">{{$employee[0]->store_name}}</option>
                                    @foreach($stores as $eachStore)
                                        <option value="{{$eachStore->id}}">{{$eachStore->name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Store</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="skillId"
                                    aria-label="Floating label select example">
                                    <option selected value="{{$employee[0]->skill_id}}">{{$employee[0]->skill_name}}</option>
                                    @foreach($skills as $skillname)
                                        <option value="{{$skillname->id}}">{{$skillname->skill_name}}</option>
                                    @endforeach
                                    <!-- <option value="2">Two</option> -->
                                </select>
                                <label for="floatingSelect">Skill</label>
                            </div>
                            <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Employee Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                        @if($employee[0]->status)
                                            <input class="form-check-input" type="radio" name="EmployeeStatus"
                                                id="gridRadios1" value="1" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="EmployeeStatus"
                                                id="gridRadios1" value="1">
                                        @endif
                                            <label class="form-check-label" for="gridRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            @if(!$employee[0]->status)
                                            <input class="form-check-input" type="radio" name="EmployeeStatus"
                                                id="gridRadios2" value="0" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="EmployeeStatus"
                                                id="gridRadios2" value="0">
                                            @endif
                                            <label class="form-check-label" for="gridRadios2">
                                                Unactive
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary" onclick="window.location='{{route("updateProfile" , [$employee[0]->id])}}'">Update</button>
                </form>
                           
            </div>
         </div>
    </div>
                    

@endsection