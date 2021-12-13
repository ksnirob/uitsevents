<!DOCTYPE html>
<html>
    <head>
        <title>UITS Events</title>
        <?php require 'utils/styles.php';?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class="bgImage">
                <div class = "col-md-12">
                    <div class = "container">
                        <div class = "jumbotron">
                            <h1><strong>Explore<br></strong> Your Favorite Event</h1>
                            <p style="font-style: bold">"Limitation-It's just your imagination,so just stop thinking about limitation and think about your goal and run towards it to acheive the peak of your goal:)"</p>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
            <div class = "container">
                <div class = "col-md-12">
                    <h1 class="text-center "><strong>  Register your Favourite Events</strong></h1>

            </div>
            
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
            
            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-4">
                            <img src="images/technical.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-5">
                        
                            <h1>Technical Events</h1>
                            <p>
                                EMBRACE YOUR TECHNICAL SKILLS BY PARTICIPATING IN OUR DIFFERENT TECHNICAL EVENTS!
                            </p>
                            
                            <br><br>
                        <?php $id=1;
                        echo
                             '<a class="btn btn-info"  href="viewEvent.php?id='.$id.'">View Technical Events</a>'
                        ?>
                             </div>
                    </div>
                </section>
            </div>
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-4">
                            <img src="images/gaming2.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-5">
                            <h1>Gaming Events</h1>
                            <p>
                                EMBRACE YOUR GAMING SKILLS BY PARTICIPATING IN OUR DIFFERENT GAMING EVENTS!
                            </p>
                            
                            <br><br>
                            <?php 
                            $id=2;
                            echo
                             '<a class="btn btn-info" href="viewEvent.php?id='.$id .'"> View Gaming Events</a>'
                        ?>
                        </div>
                    </div>
                </section>
            </div>
            
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-4">
                            <img src="images/9.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-5">
                            <h1>Cultural Events</h1>
                            <p>
                                EMBRACE YOUR CONFIDENCE BY PARTICIPATING IN OUR DIFFERENT ON-STAGE EVENTS!
                            </p>
                            
                            <br><br>
                            <?php 
                            $id=3;
                            echo
                             '<a class="btn btn-info" href="viewEvent.php?id='.$id .'">View On-Stage Events</a>'
                        ?>
                        </div>
                    </div>
                </section>
            </div>
            
            <div class="container">
            <div class="col-md-12">
                <hr>
            </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-4">
                            <img src="images/7.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-5">
                            <h1>Sports Events</h1>
                            <p>
                                 EMBRACE YOUR TALENT BY PARTICIPATING IN OUR DIFFERENT OFF-STAGE EVENTS!
                            </p>
                            
                            
                            <br><br><br>
                            <?php 
                            $id=4;
                            echo
                             '<a class="btn btn-info" href="viewEvent.php?id='.$id .'">View Off-Stage Events</a>'
                        ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        

        <?php require 'utils/footer.php'; ?>
    </body>
</html>