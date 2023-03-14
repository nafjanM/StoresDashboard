@if($errors->any())
<div class="container-fluid pt-4 px-4">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li> <i class="fa fa-exclamation-circle me-2"></i>{{$error}}
                
                </li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul> 
        
    </div>
</div>
@endif
@if(session('success'))
    <div class="container-fluid pt-4 px-4">
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>       
    </div>
@endif