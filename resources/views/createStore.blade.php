@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <form method="post" action="{{route("postStore")}}">
                    @csrf
                            <h6 class="mb-4">Add New Store</h6>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="name">
                                <label for="floatingInput">Store Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingAge" name="address">
                                <label for="floatingAge">Address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="floatingSelect" name="storeType"
                                    aria-label="Floating label select example">
                                    <option selected disabled hidden>Choose Store Type</option>
                                    @foreach($store_types as $storeT)
                                        <option value="{{$storeT->id}}">{{$storeT->type_name}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Store</label>
                            </div>
                            <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Store Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="storeStatus"
                                                id="gridRadios1" value="1" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="EmployeeStatus"
                                                id="gridRadios2" value="0">
                                            <label class="form-check-label" for="gridRadios2">
                                                Unactive
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <button type="submit" class="btn btn-primary">Add</button>
                </form>
                           
            </div>
         </div>
    </div>
                    

@endsection