<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body{
    background-image : url('https://image.freepik.com/free-photo/blue-sky-with-cloud-clean-energy-power-clear-weather-background_43284-844.jpg');
    background-size: cover;
    
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
    max-width: 640px;
    padding: 10px 15px;
    border: none;
    outline: none;
    background-color: whitesmoke;
    border-bottom: 3px solid purple;
}

#form{
  display: flex;
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
    width: 400px;
    position: relative;
     left: 520px;
     top: 50px;
}

.location .city{
    color: white;
    font-size: 36px;
    font-weight : bolder;
}

header .fas{
    background-color: whitesmoke;
    padding: 9.5px;
    border-bottom: 3px solid purple;
    cursor:pointer;
}
h1{
     font-size: 35px;
     display: block;
     position: relative;
     top: 200px;
     margin-left: 100px;
     opacity : 0.8;
     width: 1300px;
     height: 240px;
     padding: 90px;
     border : 1px solid white;

}

</style>
<script src="https://kit.fontawesome.com/ba724881a4.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/ba724881a4.js" crossorigin="anonymous"></script>
<script src="pubic/js/index.js"></script>

<body>
<div class="main">
<header>
<form method="post" action="{{url('/show-weather')}}" id="form">
@csrf
<input type="text" placeholder="Search here" id="body" name="name"><i class="fas fa-search"></i>
</form>
</header>
<h1>Hi Welcome To Weather App | Search Weather anywhere in the World</h1>
<body>