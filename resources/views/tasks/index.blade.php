@extends('layouts.app')
@section('content')
<h1 class="text-center">To Do List</h1>
<br>

<table border="2px" class="table table-hover table-bordered ">
<tr>

<th>Task name</th>
<th>Actions</th>

</tr>

@foreach ($tasks as $task)

<tr>

<td>
{{ $task->name }} 
</td>

<td>

<button   value="{{$task->id}}" class="delete btn btn-danger"  onclick="return confirm('You are sure delete this task??')"> delete </button>

</td>
</tr>

@endforeach
</table>
<div >
 Task name :
      <input name="name" id ="name" ></input>
      <button id='add' name="view" class="btn btn-info"> Add New</button>
<div>

@endsection

     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>

         $(document).on('click','#add',function(){
            $.ajax({
                url:`/api/tasks`,
                type: 'post',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {"name":$('#name').val()},
                success: function(res){
                	console.log(res);

                    if(res){
                      console.log("Task has been added");
                      $('#name').val("");
                      var row = $("<tr>");
                      var dButton = $("<button>").html("Delete")
                      dButton.attr("class","delete btn btn-danger");
                      dButton.attr( "onclick","return confirm('You are sure delete this task??')");
                      dButton.attr("value",res.task._id);
                      row.append($("<td>").html(res.task.name));
                      row.append($("<td>").append(dButton));
                      $("table").append(row)
               

                    }
                }

                });
         
        });

</script>

<script>

    $(document).on('click','.delete',function(){
    	     let id = $(this).attr('value');


            $.ajax({
                url:`/api/tasks/delete/`+id,
                type: 'post',
                data:{ '_method':'DELETE' },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
               
                success: function(){
                   
                      console.log("Done");
                }
                });
            
          $(this).parent().parent().remove();


        });

</script>