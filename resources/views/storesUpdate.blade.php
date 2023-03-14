@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form method="post" action="{{route("updateStore" , [$store[0]->id])}}">
                    @csrf
                    @method('PATCH')
                            <h6 class="mb-4">Update {{$store[0]->name}} Profile</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="name" value="{{$store[0]->name}}">
                                <label for="floatingInput">Store Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="integer" class="form-control" id="floatingAge" name="address" value="{{$store[0]->address}}">
                                <label for="floatingAge">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="storeType"
                                    aria-label="Floating label select example">
                                    <option selected value="{{$store[0]->store_type_id}}">{{$store[0]->type_name}}</option>
                                    @foreach($storeType as $eachStoreType)
                                        <option value="{{$eachStoreType->id}}">{{$eachStoreType->type_name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Store</label>
                            </div>
                            <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Store Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                        @if($store[0]->status)
                                            <input class="form-check-input" type="radio" name="storeStatus"
                                                id="gridRadios1" value="1" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="storeStatus"
                                                id="gridRadios1" value="1">
                                        @endif
                                            <label class="form-check-label" for="gridRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            @if(!$store[0]->status)
                                            <input class="form-check-input" type="radio" name="storeStatus"
                                                id="gridRadios2" value="0" checked>
                                            @else
                                                <input class="form-check-input" type="radio" name="storeStatus"
                                                id="gridRadios2" value="0">
                                            @endif
                                            <label class="form-check-label" for="gridRadios2">
                                                Unactive
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary" onclick="window.location='{{route("updateStore" , [$store[0]->id])}}'">Update</button>
                </form>
                           
            </div>
         </div>
    </div>
                    

@endsection