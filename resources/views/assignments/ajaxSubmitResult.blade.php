
       @if(count($assignments)>0)
        
           <table class="table ">
             <thead>
               <tr>
                 <th>Roll</th>
                 <th>Name</th>
                 <th>File</th>
                 <th>Status</th>
               </tr>
             </thead>
             <tbody>
              @foreach ( $group->members as $member)
                  <tr>
                       <td>{{$member->student->roll}}</td>
                       <td>{{$member->user->name}}</td>
                    @if($m=$member->upload()->where('post_id',$id)->first())
                       <td><a href="{{url('downloadA')}}/{{$m->id}}">{{$m->link}}</a></td>
                       <td><a type="button" class="btn btn-sm btn-success">Submitted</a></td>
                    @else
                       <td></td>
                       <td></td>
                    @endif
                  </tr>
              @endforeach
             </tbody>
           </table>
         
       @else
           <h2>Currently empty!!!</h2>
       @endif 
        