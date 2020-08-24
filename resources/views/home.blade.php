<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.main{
    display:flex;
    flex-direction: column;
}

header{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px 15px 15px;
}
header input{
    width: 400px;
    max-width: 340px;
    padding: 10px 15px;
    border: none;
    outline: none;
    background-color: whitesmoke;
    border-bottom: 3px solid purple;
    border-radius : 6px 0px 0px 0px;
}

.wrap{
    flex: 1 1 100%;
    padding: 25px 25px 50px;
    display: flex;
    flex-direction: column;
    align-items : center;
    text-align: center;
    border: 1px solid white;
    opacity : 0.8;
    height: 600px;
    width: 700px;
    position: relative;
     left: 360px;
     top: 50px;
}

.location .city{
    color: white;
    font-size: 36px;
    font-weight : bolder;
    width: 800px;
}

.location .date{
    color: white;
    font-size: 20px;
}

.current .temp{
    color: white;
    font-size: 102px;
    font-weight: 900;
    margin: 30px 0px;
    text-shadow: 2px 10px rgba(0,0,0,0.6);
}

.current span{
    font-weight: 500;
}

.current .weather{
    color: white;
    font-size:38px;
    font-weight: 700;
    font-style : italic;
    margin-bottom: 15px;
    text-shadow: 0 3px rgba(0,0,0,0.4);

}

.current .max-min{
    color: white;
    font-size: 24px;
    font-weight: 500;
    text-shadow : 0 4px rgba(0,0,0,0.4);
}

header .fas{
    background-color: whitesmoke;
    padding: 9.5px;
    border-bottom: 3px solid purple;
    cursor:pointer;
    border-radius : 0px 6px 0px 0px;
}

.next{
    display: flex;

}
.next li{
    list-style-type:none;
    margin: 20px 23px;
    position: relative;
    top: 100px;
    left: 18px;
    color: white;
    font-size: 20px;
    font-weight: 800;
}

.temperature{
    display: flex;
}

.temperature li{
    list-style-type:none;
    margin: 30px 32px;
    position: relative;
    top: 60px;
    color: white;
    font-size: 25px;
    font-weight: 800;
}
.forecast{
    display: flex;
}
.forecast li{
    list-style-type:none;
    margin: 20px 40px;
    position: relative;
    top: 10px;
    left: 0px;
    padding: 8px;
    color: white;
    font-size: 30px;
    font-weight: 800;

}
#form{
  display: flex;
}

</style>
<script src="https://kit.fontawesome.com/ba724881a4.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ba724881a4.js" crossorigin="anonymous"></script>
<script src="pubic/js/index.js"></script>

<body>
@if($forecast->timezone >= -5 && $forecast->timezone <=2)
<style>
body{
    background-image : url('https://image.freepik.com/free-photo/blue-sky-with-cloud-clean-energy-power-clear-weather-background_43284-844.jpg');
    background-size: cover;
}
</style>
@endif
@if($forecast->timezone >= 3 && $forecast->timezone <= 6)
<style>
body{
    background-image : url('https://elements-video-cover-images-0.imgix.net/files/154453789/sunset_590.jpg?auto=compress&crop=edges&fit=crop&fm=jpeg&h=800&w=1200&s=58aefd85ce906da50825c36d131690e0');
    background-size: cover;
}
</style>
@endif
@if($forecast->timezone >= 7 && $forecast->timezone <= 12)
<style>
body{
    background-image : url('https://images.unsplash.com/photo-1558985039-0810bf498163?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80');
    background-size: cover;
}
</style>
@endif
@if($forecast->timezone >= -8 && $forecast->timezone <= -6)
<style>
body{
    background-image : url('https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQHNA1-iFJfByoGnQQ69kVerOc6VY4JPPCjHQ&usqp=CAU');
    background-size: cover;
}
</style>
@endif
<div class="main">
<header>
<form method="post" action="{{url('/show-weather')}}" id="form">
@csrf
<input type="text" placeholder="Search here" id="body" name="name"><i class="fas fa-search"></i>
</form>
</header>
<div class="wrap">
<section class="location">
<div class="city">{{ $forecast->city }} | {{ $forecast->country }}</div>
<div class="date">{{ $day }}</div>
</section>
@foreach (array_slice($forecast->forecast,5,1) as $f)
<div class="current">
<div class="temp">{{$f->temperature}}<span>°C</span></div>
<div class="weather">{{$f->description}}</div>
<?php
    $today = strtotime($day); 

?>
<div class="max-min">{{date("M d", $today)}}</div>
@endforeach
</div>
</div>
</div>
</div>
<div class="extra">
<ul class="next">
      @foreach (array_slice($forecast->forecast,0,10) as $f)
<li>{{ Carbon\Carbon::createFromFormat("HmdY", $f->localTime) }}</li>
@endforeach
</ul>

<ul class="temperature">
@foreach (array_slice($forecast->forecast,0,10) as $f)
<li>{{ $f->temperature }}°C</li>
@endforeach
</ul>
<ul class="forecast">
@foreach (array_slice($forecast->forecast,0,10) as $f)
<li><img  src="{{ $f->iconLink }}"></li>
@endforeach
</ul>
</div>
<body>