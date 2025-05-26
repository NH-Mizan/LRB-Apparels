@extends('backEnd.layouts.master') 
@section('title','Gallery Edit') 
@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{route('galleries.index')}}" class="btn btn-primary waves-effect waves-light btn-sm rounded-pill">Manage</a>
                </div>
                <h4 class="page-title">Gallery Edit</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('galleries.update')}}" method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data" name="editForm">
                        @csrf
                        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id" />
                        <div class="col-sm-12 mb-3">
                        <div class="form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$edit_data->name}}" placeholder="Ex. Name">

                              @if ($errors->has('name'))
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                              </span>
                              @endif
                          </div>
                          </div>
                        <!-- form group -->
                        @php $photogalleries =  App\Models\Galleryimage::where('gallery_id',$edit_data->id)->get();
                        @endphp

                        @foreach($photogalleries as $photogallery)
                        <div class="col-sm-12 mb-3">
                         <div class="form-group fieldGroup">
                            <div class="input-group">
                                <input type="text" name="title[]" disabled="" class="form-control" value="{{$photogallery->title}}" placeholder="Enter name"/>
                                <input type="file" name="image[]" disabled="" class="form-control" placeholder="Enter email"/>
                                <img src="{{asset($photogallery->image)}}" style="width:60px;" alt="">

                            <a href="{{url('admin/photogallery/image/delete/'.$photogallery->id)}}" class="btn btn-danger btn-small"> Delete </a>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        <div class="col-sm-12 mb-3">
                        <div class="form-group fieldGroup">
                            <div class="input-group">
                                <input type="text" name="title[]" class="form-control"  placeholder="Enter name"/>
                                <input type="file" name="image[]" class="form-control" placeholder="Enter email"/>
                                <div class="input-group-addon"> 
                                    <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="status" class="d-block">Status</label>
                                <label class="switch">
                                    <input type="checkbox" value="1" name="status" @if($edit_data->status==1)checked @endif>
                                    <span class="slider round"></span>
                                </label>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- col end -->
                        <div>
                            <input type="submit" class="btn btn-success" value="Submit" />
                        </div>
                    </form>
                     <!-- copy of input fields group -->
                    <div class="form-group fieldGroupCopy" style="display: none;">
                        <div class="input-group">
                            <input type="text" name="title[]" class="form-control" placeholder="Enter name"/>
                            <input type="file" name="image[]" class="form-control" placeholder="Enter email"/>
                            <div class="input-group-addon"> 
                                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end card-->
        </div>
        <!-- end col-->
    </div>
</div>
@endsection 
@section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>


 <script>
    $(document).ready(function(){
    //group add limit
    var maxGroup = 10;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
  </script>


<script type="text/javascript">
     document.forms['editForm'].elements['type'].value="{{$edit_data->type}}"
  </script>
@endsection
