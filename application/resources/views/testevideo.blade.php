<!DOCTYPE html>
 <html> 
   <head>
      <title> Video Background </title>
	  
	  <style type="text/css">
	  * {
	  margin: 0;
	  padding: 0;
	  }
	  body{
		  font-family: Calibri, sans-serif;
	  }

	  .background-wrap{
		  position: fixed;
		  z-index: -1000;
		  width: 100%;
		  height: 100%;
		  overflow: hidden;
		  top: 0;
		  left: 0;

	  }

	  #video-bg-elem{

		  position: absolute;
		  top: -40%;
		  left: 0%;
		  transform translate(-50%,-50%);
		  min-width: 100%;
		  min-height: 100%;
		  width: auto;
		  height: auto;

	  }

	  .content{
		  position: absolute;
		  width: 100%;
		  min-height: 100%;
		  z-index: 1000;
		  background-color: rgba(0,0,0,0.7);
	  }

	  .content h1{
		  text-align: center;
		  font-size: 65px;
		  text-transform: uppercase;
		  font-weight: 300;
		  color: #fff;
		  padding-top: 15%;
		  margin-bottom: 10px;
	  }

	  .content p{
		  text-align: center;
		  font-size: 20px;
		  letter-spacing: 3px;
		  color: #aaa;
	  }


	  
	  
	  
	  </style>
	  </head>
	  
<body>
<div class="background-wrap">
     
	 <video id="video-bg-elem" preload="auto" autoplay="true" loop="loop" muted="muted"> 
	 <source src="/css/soya.mp4" type="video/mp4">
	 Video not supported
	 </video>
</div>

<div class="content">
    <h1>Rent&Play</h1>
	<p>Maior Portal de Aluguer de espacos desportivos!</p>
	</div>

  </body> 
 </html>


