<!doctype html>

        @include('layouts.app')
        @include('layouts.sidebar')


        <article class="l-design-widht">
                
               
                <form action="{{ url('savesubitem/' .$task->id) }}" class='todoinput' method="POST">

                @csrf

                <div class="card-form"> 
                <h2 class="todo-h2">Create your sub task of {{$task -> name}}</h2>
        
                   <label class="post-input">    
                   <label for="title"><h4>{{__('Name')}}</h4></label>
                   <input type="text" class="post-input-field" name="title">    
                   </label> 


                   <label class="post-input">     
                        <label for="description"><h4>{{__('Description')}}</h4></label>
                        <textarea class="post-input-field post-input-description" name="description" rows="5"></textarea>
                   </label>   

                <div class="post-input">     
                        <label for="priority"><h4>Priority level:</h4></label>
                        <div class="custom-select">
                        <select name="priority" id="priority" class="post-input-field" required>
                          <option class="select-items" value="4"style="background: white; color: black;">Low</option>
                          <option class="select-items" value="3">Medium</option>
                          <option class="select-items" value="2">High</option>
                          <option class="select-items" value="1">Highest</option>
                        </select>  
                        </div> 
                </div>   


                <div class="post-input">     
                        <label for="date"><h4>{{__('Due to')}}</h4></label>
                        <input type="date" class="post-input-field" name="date">    
                </div>   
                

                
                <div class="button-group">
                <button class="btn-form"  type="submit"> Submit </button> 
                <button class="btn-todo" type="submit"><a href="/tasks"> Back</a></button>
                </div>
                </form>

        
        </div> 

