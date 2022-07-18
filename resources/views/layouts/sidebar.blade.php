<div class="container_dashboard">
    <aside>


        <div class="sidebar">

           <ul>
            @if (!auth()->user()->is_admin)
               <li class="{{ (request()->is('dashboard_show')) ? 'active' : '' }}">
                <a href={{route('dashboard_show')}} >
                    <span class="material-icons-round">dashboard</span>
                    <h3 class="sidebar_links first_child">Dashboard</h3>
                </a>
               </li> 
               @endif

               @if (auth()->user()->is_admin)
 
               <li class="{{ (request()->is('posts')) ? 'active' : '' }}">
                <a href="/posts">
                    <span class="material-icons-round">post_add</span>
                    <h3 class="sidebar_links first_child">Posts</h3>
                </a>
               </li> 
               @endif

               @if (!auth()->user()->is_admin)
               <li class="{{ (request()->is('checklist')) ? 'active' : '' }}">
                    <a href="/checklist" >
                    <span class="material-icons-round">done</span>
                    <h3 class="sidebar_links">To-Do</h3>
                    </a>
               </li>
               
               <li class="{{ (request()->is('tasks'))  ? 'active' : '' }}">
                <a href="/tasks" >
                    <span class="material-icons-round">sticky_note_2</span>
                    <h3 class="sidebar_links">Tasks</h3>
                </a>
               </li>

               <li class="{{ (request()->is('pomodoro')) ? 'active' : '' }}">
                <a href="/pomodoro">
                    <span class="material-icons-round">timer</span>
                    <h3 class="sidebar_links">Pomodoro</h3>
                </a>
               </li>

               <li class="{{ (request()->is('habits')) ? 'active' : '' }}">
                <a href="/habits">
                    <span class="material-icons-round">favorite</span>
                    <h3 class="sidebar_links">Habits</h3>
                </a>
               </li>

               <li class="{{ (request()->is('posts')) ? 'active' : '' }}">
                <a href="/posts">
                    <span class="material-icons-round">emoji_events</span>
                    <h3 class="sidebar_links">Motivation</h3>
                </a>
               </li>

               <li class="{{ (request()->is('friends')) ? 'active' : '' }}">
                <a href="/friends">
                    <span class="material-symbols-rounded">group</span>
                    <h3 class="sidebar_links">Friends</h3>
                </a>
               </li>
               @endif

               <li class="{{ (request()->is('settings')) ? 'active' : '' }}">
                <a href="/settings">
                    <span class="material-icons-round">settings</span>
                    <h3 class="sidebar_links">Settings</h3>
                </a>
                <li>
            </ul> 
        </div>
    </aside>


<script src="{{mix('js/app.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>


