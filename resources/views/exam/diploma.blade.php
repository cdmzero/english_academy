
<head>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
ˆ
    <style>
@import url("https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.2.3/paper.css");
/* google font for cert name print */

@page { size: A2 landscape }

body {background:rgb(255, 255, 255);}

.sheet {
    margin:0;
    box-shadow:none;
    
}

#cert {
    background-image:url(/img/diploma.jpg);
    height:95%;
    margin-left:3.5%;
    background-repeat:no-repeat;
    border: 0px; 
}

#tittle {
    margin-top:76mm;
    text-align:center;
    font-size:35mm;
    font-weight:lighter;
    font-family: "Times New Roman", Times, serif;

}
#subtitle {
    margin-top:10mm;
    text-align:center;
    font-size:10mm;
    font: oblique bold cursive

}
#par {
    margin-top:38mm;
    text-align:center;
    font-size:10mm;
    font-weight:lighter;
    font: oblique  cursive

}
#impar {
    margin-top:10mm;
    text-align:center;
    font-size:10mm;
    font-weight:lighter;
    font: oblique  cursive

}
#sign {
    margin-top:60mm;
    margin-left:100mm;
    text-align:left;
    font-size:7mm;
    font: oblique  cursive

}
#logo {
    margin-top:30mm;
    margin-left:110mm;


}
#footer {
    margin-top:5mm;
    margin-left:100mm;
    text-align:left;
    font-size:5mm;
    font: oblique  cursive

}
.box {
}


.left {
    float: left;
    width: 50%;
}


.right {
    float: right;
    width: 50%;
}



    </style>
</head>
<body class="A4 landscape">

    <div id="cert" class="container-fluid">
	    <div class="row">
	        <div class="col-md-6">
                <h1 id="tittle">English Value School</h1>
                <h2 id="subtitle"> CERTIFICATION OF APPRECIATION</h2>         
                <p id="par">This diploma certificates that <strong>{{ $result->user->user_name }} {{ $result->user->surname }}</strong></p>
                <p id="impar">has completed the test <strong>{{$result->test->test_name}}</strong> of <strong>{{ $result->test->test_level }}</strong> level</p>
                <p id="impar">& has obtained the mark <strong>{{$result->total_mark}}%</strong></p>
                    <div class="box">
                        <div class="left">
                         
                            <p id="sign"><img src="img/name.jpg" height="50px" width="150px"></p>
                            <p id="footer"><strong>CEO of EVS</strong></p>
                        </div>
                        
                        <div class="right">
                            <p id="logo"><img src="img/logo.jpg" height="250px" width="300px"></p>
                
                             
                        </div>
                    
      
                    </div>
                </div>
                
                

               
                
                 

	       </div>
    	</div>
    </div>
  </section>

</body>
