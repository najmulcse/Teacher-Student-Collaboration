
@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   <a href="{{ route('id',['id' => $group->id]) }}">{{ $group->group_name }}</a>
                   <small></small>
             </h2>
@endsection
@section('group_body')


<section>



    <div class="row">
        <div class="col-sm-9">
              <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                     Edit Post
                    </div>
                    
                    <div class="panel-body">
                    <div class="col-sm-1"></div>
                     <div class="col-sm-10">
                   
                      <form action="{{ route('updatePost',['gid' => $group->id,'pid' =>$post->id, 'type'=>'P'])}}" class="form-horizontal" method="post" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           {{method_field('PATCH')}}
                          
                          <div class="form-group">
                          <label class="control-label">Body</label>
                              <textarea class="form-control" name="body" rows="5" required>{{$post->body}}</textarea>
                             
                          </div>
                          <div class="form-group multiple-form-group" data-max=5>
                                    <label class="control-label">File(optional)</label>
                                    <div class="form-group input-group">
                                           <input type="file" name="file[]" class="form-control" accept=".doc,.ppt,.pdf,.jpeg,.JPEG,.png,.jpg," value="{{ old('file') }}">
                                              <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+
                                                </button></span>     
                                    </div>
                                                      
                          </div>
                          <div class="form-group">

                          	 <button type="submit" class="btn btn-md btn-success pull-right">Update Post</button>	
                             
                          </div>
                          </form>
                      </div>
                     </div>
                   <div class="col-sm-1"></div>
                
                  </div>
                 </div>
       

        </div>
        <div class="col-sm-3">
              @include('layouts.rightsidebar') <!--this page is extended from layouts -->
        </div>
</div>


</section>

<script>
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}
</script>
@endsection
