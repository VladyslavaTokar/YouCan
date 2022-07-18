<!doctype html>
    
        @include('layouts.app')
        @include('layouts.sidebar')


        <div id="pomodoro-app">
          <div id="container">
            <div id="timer">
              <div id="time">
                <span id="minutes">25</span>
                <span id="colon">:</span>
                <span id="seconds">00</span>
              </div>
            </div>
         
            <div class="button-group mode-buttons">
              <button id="work" class="clockbutton mode-button">Work</button>
              <button id="shortBreak"class="clockbutton mode-button">Short Break</button>
              <button id="longBreak"class="clockbutton mode-button">Long Break</button>
            </div>

            <button id="stop"class="main-button">
              Stop
            </button>

          </div>
        </div>

    @push('head')
    <script src="{{url('js/main.js')}}"></script>
    @endpush
  </body>

</div>
@include('layouts.footer')
</html>

