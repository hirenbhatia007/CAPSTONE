<html>

<head>
</head>

<body>
    <header>
        <?php
            include "nav.php";
            ?>
    </header>
    
    <main style="padding:2%;">
   
            <div class="container">
                     
                   
                    <div class="form-group row">
                        
                        <div class="col-5">
                            <input class="form-control" type="text" name="artname" plAceholder="FIRSTNAME">
                        </div>

                    </div>

                    <div class="form-group row">

                       
                        <div class="col-5 file">

                           <input class="form-control" type="text" name="artname" plAceholder="LASTNAME">
                        </div>
                      
                    </div>

                    <div class="form-group row">
                       

                        <div class="col-5">

                           <input class="form-control" type="text" name="artname" plAceholder="ART NAME">
                        </div>
                    </div>
                  
                    <div class="form-group row">
                       
                        <div class="col-5">
                            <div class="form-group">

                                <textarea class="form-control " name="description" rows="8" placeholder="FEEDBACK"></textarea>
                            </div>
                        </div>

                    </div>

                

                    <div class="col-8"><input type="submit" name="submit"  onClick="location.href='thankyou.php'" class="button" value="Submit">
                    </div>



                </div>
    </main>
    
    <footer>
        <?php
                include "footer.php";
        ?>


    </footer>



</body>

</html>
