@extends('layouts.employee')

@section('title','Employee dashboard')

@section('Employee-content')

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script>
      $(document).ready(function(){

        $("#startworking").click(function(){

          var startworking = confirm("Start Working time ?");
          if(startworking == true)
          {

            var intime = new Date().toLocaleTimeString();
            var date = new Date().toLocaleDateString();

            $.ajax({
              type: "post",
              url: '{{route('intime')}}',
              data:{
                 intime:intime,
                 date:date,
                _token:"{{ csrf_token() }}"
              },

              success: function(data){
                if((data.data)!=null)
                {
                 
                    alert(data.data); 
                }
              }   

            });

          }


        });


        $("#stopworkingtime").click(function(){

          var stopworking = confirm("Stop Working time ?");
          if(stopworking == true)
          {

            var outtime = new Date().toLocaleTimeString();
           
           
            var date = new Date().toLocaleDateString();
            

            $.ajax({
              type: "PUT",
              url: '{{route('outtime')}}',
              data:{
                 outime:outtime,
                 date:date,
                _token:"{{ csrf_token() }}"
              },

              success: function(data){
                if((data.data)!=null)
                {
                 
                    alert(data.data); 
                }
              }   

            });

          }


        });

      });
    </script>    



  <section class="content">
    
    <div class="container-fluid ">
    <h3>Dashboard</h3>
    <hr class="bg-warning">
    <div class="row mt-2">
      <div class="col-md-5 col-sm-12 mr-2">



        <div class="row">

        
          <div class="col-sm-12 border border-warning p-2">
            <div class="p-2">
              <h4>Daily Attendance</h4>
              <hr class="bg-warning">

              <div class="col-md-6 col-sm-12 col-xs-12">
                  
                  <canvas id="canvas" width="200" height="200" style="background-color:#fff">
                  </canvas>

                
              </div>
              
              <br><br>

              <div class="col-sm-12">
                <button class="btn btn-success col-sm-5 " id="startworking"  >Start working Today</button>
               
                <button class="btn btn-danger col-sm-5 " style="margin-left: 20px;" id="stopworkingtime">Stop working Today</button> 
              </div>

             
            </div>
          </div>

          
          <!----quote area--->

          <div class="col-sm-12 border border-warning mt-3 p-3">
            <div class="p-2">
              <h4>Quote of the day</h4>
              <hr class="bg-warning">
              @if(isset($quote) && count($quote)>0)
                <blockquote>
                  <p>{{ $quote[0]->quote}}</p>

                  <footer style="float: right;"><strong>- {{ucfirst($quote[0]->author)}}</strong></footer>
                </blockquote>
              @else
                <blockquote>
                  <p>Their No quotes Added For today</p>
                  
                </blockquote>
              @endif
            </div>
          </div>
          
        </div>
        
      </div>

      <div class="col-md-6 col-sm-12 border border-warning">
        <div class="row">
        <h4 style="margin-left: 100px; padding-top: 20px;">Notice Board</h4>
          
        </div>
        <hr>
        <div class="timeline p-3">

          <ul>
             @if(isset($notice) && count($notice)>0)
                @foreach($notice as $key => $value) 
                    <li>
                      <div class="content">
                        <h4>{{ucfirst(@$value->title)}}</h4>
                        <p>{{ucfirst(@$value->description)}}</p>
                        
                        <strong>
                        <p>
                          {{date('d M Y', strtotime($value->created_at))}}, Posted by Admin
                        </p>
                        </strong>
                      </div>


                    </li>
                    <br>

                @endforeach
            @endif
          </ul>
        </div>  
      </div>

    </div>
  </div>

<script>
  
  var canvas = document.getElementById("canvas");
  var ctx = canvas.getContext("2d");
  var radius = canvas.height / 2;
  ctx.translate(radius, radius);
  radius = radius * 0.90
  setInterval(drawClock, 1000);

  function drawClock() {
    drawFace(ctx, radius);
    drawNumbers(ctx, radius);
    drawTime(ctx, radius);
  }

  function drawFace(ctx, radius) {
    var grad;
    ctx.beginPath();
    ctx.arc(0, 0, radius, 0, 2*Math.PI);
    ctx.fillStyle = 'white';
    ctx.fill();
    grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
    grad.addColorStop(0, '#333');
    grad.addColorStop(0.5, 'white');
    grad.addColorStop(1, '#333');
    ctx.strokeStyle = grad;
    ctx.lineWidth = radius*0.1;
    ctx.stroke();
    ctx.beginPath();
    ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
    ctx.fillStyle = '#333';
    ctx.fill();
  }

  function drawNumbers(ctx, radius) {
    var ang;
    var num;
    ctx.font = radius*0.15 + "px arial";
    ctx.textBaseline="middle";
    ctx.textAlign="center";
    for(num = 1; num < 13; num++){
      ang = num * Math.PI / 6;
      ctx.rotate(ang);
      ctx.translate(0, -radius*0.85);
      ctx.rotate(-ang);
      ctx.fillText(num.toString(), 0, 0);
      ctx.rotate(ang);
      ctx.translate(0, radius*0.85);
      ctx.rotate(-ang);
    }
  }

  function drawTime(ctx, radius){
      var now = new Date();
      var hour = now.getHours();
      var minute = now.getMinutes();
      var second = now.getSeconds();
      //hour
      hour=hour%12;
      hour=(hour*Math.PI/6)+
      (minute*Math.PI/(6*60))+
      (second*Math.PI/(360*60));
      drawHand(ctx, hour, radius*0.5, radius*0.07);
      //minute
      minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
      drawHand(ctx, minute, radius*0.8, radius*0.07);
      // second
      second=(second*Math.PI/30);
      drawHand(ctx, second, radius*0.9, radius*0.02);
  }

  function drawHand(ctx, pos, length, width) {
      ctx.beginPath();
      ctx.lineWidth = width;
      ctx.lineCap = "round";
      ctx.moveTo(0,0);
      ctx.rotate(pos);
      ctx.lineTo(0, -length);
      ctx.stroke();
      ctx.rotate(-pos);
  }
               
</script>




</section>




@endsection  



  