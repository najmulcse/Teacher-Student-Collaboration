
@extends('layouts.homeLayout')

@section('group_heading')
              <h2 class="page-header">
                   
                   <small></small>
             </h2>
                                
@endsection
  
@section('group_body')

   <h3>Pick A Make/Model</h3>

     <form ic-post-to="/form">
       <div class="form-group">
         <label class="control-label">Make</label>
         <select class="form-control" name="make" ic-post-to="/models" ic-target="#models" ic-indicator="#model-ind">
           <option value="audi">Audi</option>
           <option value="toyota">Toyota</option>
           <option value="bmw">BMW</option>
         </select>
       </div>
       <div class="form-group">
         <label class="control-label">Model <i id="model-ind" class="fa fa-spinner fa-spin" style="display: none"></i></label>
         <select id="models" class="form-control" name="model">
           <option value="a1">A1</option>
           <option value="a3">A3</option>
           <option value="a6">A6</option>
         </select>
       </div>

       <button class="btn btn-default">Submit</button>
     </form>

   <script type="text/javascript" >

     //========================================================================
    // Mock Server-Side HTTP End Point 
    //========================================================================
    // $.ajax({
    //   url: "/form",
    //   response: function (settings) {
    //     this.responseText = formTemplate();
    //   }
    // });

    $.mockjax({
      url: "/models",
      responseTime: 450 ,
      response: function (settings) {
        var params = parseParams(settings.data);
        var make = dataStore.findMake(params['make']);
        this.responseText = modelOptions(make['models']);
      }
    });

    //========================================================================
    // Mock Server-Side Templates
    //========================================================================

    var originalForm = $('form').html();
    function formTemplate() {
      return originalForm;
    }

    function modelOptions(make) {
      return $.map(make, function(val) {
        return "<option value='" + val + "'>" + val +"</option>";
      });
    }

    //========================================================================
    // Mock Data Store
    //========================================================================
    var dataStore = function(){
      var data = {
        audi : { models : ["A1", "A4", "A6"] },
        toyota : { models : ["Landcruiser", "Landcruiser", "Landcruiser"] },
        bmw : { models : ["325i", "325ix", "X5"] }
      };
      return {
        findMake : function(make) {
          return data[make];
        }
      }
    }()
    
     
   </script>

@endsection

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.


Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.