<!DOCTYPE html>
    <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>            
            <link rel='stylesheet' href='/resources/bootstrap/css/bootstrap.min.css'>
            <link rel='icon' href='http://www.dsatulsa.org/images/links/8eac4a736e4a094688c3b54b43588308'>
            <style>
                html, body {
                    height: 100%;
                }
                hr {
                    background-color: white;
                }
            </style>
        </head>
        <body>
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-8 mx-auto">
                        <div class="jumbotron text-light" style="background-color: rgb(20, 145, 255)">
                            <h1 class="display-4">Sign In</h1>
                            <form action="/resources/php/title_verify.php" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Team Password</label>
                                    <input required type="password" name="password" class="form-control" id="teamPassword" placeholder="Enter password">
                                    <small id="emailHelp" class="form-text">You can probably guess it. If not, ask Matthew (the super smart designer of this system.)</small>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select">
                                      <option disabled selected value="">Competition</option>
                                      <option value="1">Please</option>
                                      <option value="2">Ignore</option>
                                      <option value="3">Me</option>
                                    </select>
                                </div>
                                <button class="btn btn-outline-light" type="submit">Submit</button>
                            </form>
                              <hr class="my-4">
                              <p class="lead">New and Improved!</p>
                        </div>
                    </div>
                </div>
            </div>
            <script src="/resources/bootstrap/js/jquery-3.2.1.slim.min.js"></script>
            <script src="/resources/bootstrap/js/popper.min.js"></script>
            <script src="/resources/bootstrap/js/bootstrap.min.js"></script>
            <script src="/resources/jQuery/jquery-1.12.4.js"></script>
        </body>
    </html>