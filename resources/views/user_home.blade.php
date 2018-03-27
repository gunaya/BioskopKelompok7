@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
            <div id="page-wrapper" >                   
             <div class="inner-content">                        
                <div class="page-left">                            
                    <div class="panel-heading span_header">                             
                    </div>            
                        <div class="panel-title"><h5>Now Playing in DENPASAR</h5></div>
                            <div class="movie_grid">  
                                <div class="div_space">                        
                                    <div class="col-md-3 content-grid" >                                       
                                        <div class="panel panel-default panel-card">                                  
                                            <a href=>     
                                                 <div class="panel-heading">
                                                    <img id="WINC" src="https://web3.21cineplex.com/movie-images/16WINR.jpg" width="175" height="185"/>                                                                                      
                                                </div>                                          
                                            </a>                                            
                                            <div class="panel-body">                                                
                                                <span>WINCHESTER</span>                                        
                                            </div>  
                                                <br/>   
                                                <br/>                                             
                                                <div class="panel-thumbnails center-block">                                                
                                                    <div class="btn-group-sm">                                                
                                                        <a class="btn btn-success" href=> BUY TICKET</a>
                                                    </div>    
                                                </div>                                               
                                            </div> 
                                        </div> 
                                    </div> 

                                    <div class="col-md-3 content-grid" >                                       
                                        <div class="panel panel-default panel-card1">                                  
                                            <a href=>     
                                                 <div class="panel-heading">
                                                    <img id="YOWI" src="https://web3.21cineplex.com/movie-images/08YBEN.jpg" width="175" height="185"/>                                                                                      
                                                </div>                                          
                                            </a>                                            
                                            <div class="panel-body1">                                                
                                                <span>YOWISBEN</span>                                        
                                            </div>  
                                                <br/>   
                                                <br/>                                             
                                                <div class="panel-thumbnails center-block">                                                
                                                    <div class="btn-group-sm">                                                
                                                        <a class="btn btn-success" href=> BUY TICKET</a>
                                                    </div>    
                                                </div>                                               
                                            </div> 
                                        </div> 
                                    </div> 
                                </div> 
                            </div> 

                            <div class="col-md-3 content-grid" >                                       
                                        <div class="panel panel-default panel-card2">                                  
                                            <a href=>     
                                                 <div class="panel-heading">
                                                    <img id="PAC2" src="https://web3.21cineplex.com/movie-images/18PRUG.jpg" width="175" height="185"/>                                                                                      
                                                </div>                                          
                                            </a>                                            
                                            <div class="panel-body2">                                                
                                                <span>PACIFIC RIM UPRISING</span>                                        
                                            </div>  
                                                <br/>   
                                                <br/>                                             
                                                <div class="panel-thumbnails center-block">                                                
                                                    <div class="btn-group-sm">                                                
                                                        <a class="btn btn-success" href=> BUY TICKET</a>
                                                    </div>    
                                                </div>                                               
                                            </div> 
                                        </div> 
                                    </div> 
                                    

                        </div>                                        
                    </div>                                       
                </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Styles -->
<style>
#page-wrapper {
    background-color : #ffffff;
    max-width: 800px;
}
.panel-title{
    background-color : #3CB371;
    height : 30px;
}
.panel-title h5{
    line-height: 30px;
    margin-left: 15px;
}
.div_space {
    margin-top : 20px;
}
.panel-body {
    margin-top: 5px;
    margin-left: 38px;
}
.panel-body1 {
    margin-top: 5px;
    margin-left: 42px;
}
.panel-body2 {
    margin-top: 5px;
    margin-left: 10px;
}
.btn-group-sm {
    margin-left: 38px;
}
.panel-card1{
    margin-left: 210px;
    margin-top: -285px;
}
.panel-card2{
    margin-top: 30px;
}
</Style>

@endsection