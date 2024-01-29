<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/index.css" rel="stylesheet" type="text/css">
</head>
  <body>
  <div class="d-flex justify-content-center align-items-center mt-5">


        <div class="card">

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item text-center">
                  <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
                </li>
                <li class="nav-item text-center">
                  <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</a>
                </li>
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                  
                  <div class="form px-4 pt-5">

                    <input type="text" name="" class="form-control" placeholder="Email or Phone">

                    <input type="text" name="" class="form-control" placeholder="Password">
                    <button class="btn btn-dark btn-block">Login</button>

                  </div>



                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                  

                  <div class="form px-4">

                    <input type="text" name="" class="form-control" placeholder="Name">

                    <input type="text" name="" class="form-control" placeholder="Email">

                    <input type="text" name="" class="form-control" placeholder="Phone">

                    <input type="text" name="" class="form-control" placeholder="Password">

                    <button class="btn btn-dark btn-block">Signup</button>
                    

                  </div>



                </div>
                
              </div>
            
          
          

        </div>
        

      </div>
      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>