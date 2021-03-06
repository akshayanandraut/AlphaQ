<!DOCTYPE html>
<html>
    <head>
        <title>Alpha Q</title>
        <link rel="icon" href="images/logo2.png">
        <meta charset="utf-8">
        <meta name="author" content="Siddhant Rai">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.1/angular-cookies.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!--      <link rel="stylesheet" href="libraries/bootstrap.min.css">
        <script src="libraries/jquery.min.js"></script>
        <script src="libraries/bootstrap.min.js"></script>
        <script src="libraries/angular.min.js"></script> 
        <script src="libraries/angular-cookies.js"></script>
-->           
        <link rel="stylesheet" href="css_files/font-awesome-4.6.3/css/font-awesome.css">
        <link rel="stylesheet" href="css_files/bootstrap-social-gh-pages/bootstrap-social.css">
        <style>
            body{
                /*background: #FF4500;*/
                background: #eee;
                padding-top: 50px;
                padding-bottom: 50px;
            }
            #my_nav{
                box-shadow: 2px 2px 10px 1px #f90;
                opacity: 0.95;
            }
            .navbar-nav li a:hover, .navbar-nav li.active a {
                /*color: #f4511e !important;*/
                color: #2ec866 !important;
                /*background-color: #fff !important;*/
            }
            .fun{
                background-image: url('images/heart.png');
            }
            .educational{
                background-image: url('images/educational.png');
            }
            .engaging{
                background-image: url('images/engaging.png');
            }
            .e-learning{
                background-image: url('images/e-learning.png');
            }
            .publisher{
                background-image: url('images/publishers.png');
            }
            .fun,.educational,.engaging,.e-learning,.publisher{
                background-repeat: no-repeat;
                background-position: center;
            }
            #menu2{
                padding-top: 50px;
                padding-bottom: 50px;
            }
            #menu3{
                background-image: url('images/contact.png');
                background-repeat: no-repeat;
                background-size: 100% 100%;
                padding-top: 50px;
                padding-bottom: 50px;
            }
            .myerror{
                color: red;
                font-size: x-small;
            }
            hr{
                border-top-color: red !important;
            }
            .disabled {
                pointer-events: none;
             }
             th{
                 text-align: center;
                 background-color: #5cb85c;
                 color: white;
             }
        </style>
    </head>
    
    <body ng-app="alpha" ng-controller="cont_alpha">
        
    <!--Angular Script-->
    <script src="js_files/my_angular.js"></script>
    
    <!--NAVIGATION BAR-->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="my_nav">
        <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" id="my_nav_btn" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" style="color:white;cursor: default;" data-toggle="tab" href="#" onclick="">AlphaQ</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            <li><a href="#" data-toggle="modal" data-target="#myModal_log" ng-hide="check_login()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#myModal_sign" ng-hide="check_login()"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li ng-class="quiz_is_active"><a href="./reloader.php" ng-show="check_login()" ng-click="log_out()"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>            
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a data-toggle="tab" href="#menu2" ng-show="check_login()" ng-click="profile_loader()"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li><!-- ng-if="log_uname !== ''" class="animate-if"-->
            <li class="active" ng-class="quiz_is_active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li ng-class="quiz_is_active"><a data-toggle="tab" href="#menu3"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a></li>
            </ul>
        </div>
        </div>
    </nav>
    
    <!-- Tab Content -->
    <div class="tab-content">
    <!-- Home -->
    <div id="home" class="tab-pane fade in active">
      <!-- Background -->
      <img class="img-responsive" src="images/intro1.png" id="intro_img" style="width: 100%;">
        <div class="container-fluid">
            <div class="jumbotron" style="margin: 0;border: 0;">
            <div class="row">
                <h2 class="text-center"><kbd>WHY AlphaQ??</kbd></h2>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3 fun">
                    <h2 class="text-center"><kbd>FUN</kbd></h2>
                    <blockquote>Playing a Quiz is a boatload of fun. That's why people love to do it and keep coming back to improve their highscore.</blockquote>
                </div>                
                <div class="col-md-4 educational">
                    <h2 class="text-center"><kbd>Educational</kbd></h2>
                    <blockquote>Playing a quiz is an informal and fun way of learning about new subjects, or fine tuning existing knowledge about a subject.</blockquote>
                </div>
                <div class="col-md-3 engaging">
                    <h2 class="text-center"><kbd>Engaging</kbd></h2>
                    <blockquote>Our quizzes keep challenging players with different experience levels and new questions are added each day.</blockquote>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="row">
                <h2 class="text-center"><kbd>What can AlphaQ do for your organization?</kbd></h2>
            </div> 
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4 e-learning">
                    <h2 class="text-center"><kbd>Publishers</kbd></h2>
                    <blockquote>Do you have great content? Are you looking for new ways to publish your content? Are you willing to conduct quizzes online?
                        AlphaQ could have a solution for you.</blockquote>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 publisher">
                    <h2 class="text-center"><kbd>E-Learning</kbd></h2>
                    <blockquote>Are you looking for a fun and effective way to let your students, patients learn something?
                        Combine the power of fun with studies and It’ll be fun, addictive and meaningful.</blockquote>
                </div>
                <div class="col-md-2"></div>               
            </div>
            </div>
        </div>
    </div>
    
    <!-- Menu 2 -->
    <!--    <div id="menu2" class="tab-pane fade">
        <div class="jumbotron">
            <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal_add_quiz">New Question</button>
        </div>
        </div>-->
    <div id="menu2" class="tab-pane fade">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked">
                    <li class="active" ng-class="quiz_is_active"><a data-toggle="tab" href="#menu_profile" ng-click="profile_loader()">Profile</a></li>
                    <li ng-class="quiz_is_active"><a data-toggle="tab" href="#menu_add_quiz">Add Quiz</a></li>
                    <li ng-class="quiz_is_active"><a data-toggle="tab" href="#menu_attempt_contest" ng-click="call_attempted_quiz()">Attempted Quiz</a></li>
                    <li ng-class="quiz_is_active"><a data-toggle="tab" href="#menu_attempt_quiz" ng-click="all_quiz()">Take a Quiz</a></li>
            <!--        <li><a data-toggle="tab" href="#menu_create_contest">Add Test</a></li> -->
                    
                    
                </ul>
            </div>
            <div class="col-sm-9">
                <!-- Create quiz Tab Content -->
                <div class="tab-content">
                <!-- Profile Menu -->
                <div id="menu_profile" class="tab-pane fade in active">
                    <img class="img-responsive img-circle" src="images/male_user.jpg" style="padding-top: 10px;height: 80px;">
                    <h3>Username : <kbd>{{profile_uname}}</kbd></h3>
                    <h3>Name : {{profile_name}}</h3>
                    <h3>Email : {{profile_email}}</h3>
                    <h3>City : {{profile_city}}</h3>
                    <h3>Score : {{profile_score}}</h3>
                    <button class="btn btn-google" ng-click="board_toogle()">Check Leaderboard!</button><br><br>
                    <div ng-hide="board_hide" class="table-responsive text-center"> 
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>UserName</th>
                                    <th>City</th>
                                    <th>Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="i in table_leaderboard">
                                    <td>{{$index+1}}</td>
                                    <td>{{i.uname}}</td>
                                    <td>{{i.city}}</td>
                                    <td>{{i.score}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <!-- Add_quiz Menu -->
                <div id="menu_add_quiz" class="tab-pane fade">
                    <form>
                        <div clas="row">
                            <div class="col-lg-4">
                            <div class="form-group">
                            <label for="add_quiz_name">Quiz Name</label><span class="myerror">  {{quiz_name_err}}</span>
                            <input id="add_quiz_name" class="form-control" type="text" placeholder="add a meaningful name" required ng-model="quiz_name" ng-keyup="quiz_form_validate()" ng-disabled="latch_name">
                            </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="form-group">
                            <label for="add_quiz_marks">Marks</label><span class="myerror">  {{quiz_marks_err}}</span>
                            <input id="add_quiz_marks" class="form-control" placeholder="per Question" type="number" required ng-model="quiz_marks" ng-keyup="quiz_form_validate()" ng-disabled="latch_marks">
                            </div>
                            </div>
                            <div class="col-lg-4">
                            <div class="form-group">
                            <label for="add_quiz_time">Time Limit</label><span class="myerror">  {{quiz_time_err}}</span>
                            <input id="add_quiz_time" class="form-control" type="number" placeholder="In minutes" required ng-model="quiz_time" ng-keyup="quiz_form_validate()" ng-disabled="latch_time">
                            </div>
                            </div>   
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-warning btn-md" id="adding_new_quiz" ng-disabled="control_addquiz" ng-click="quiz_add_db()">Add Quiz</button>
                        <button type="button" class="btn btn-md btn-info" data-toggle="modal" data-target="#myModal_add_quiz" ng-disabled="control_newQues">New Question</button>
                        
                        <h3>&nbsp;&nbsp;&nbsp;Questions Added: {{num_of_questions}}</h3>
                        &nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-md" id="done_adding_new_quiz" ng-disabled="control_done" ng-click="done_quiz_ques()">Done Adding Questions</button>
                        
                    </form>
                </div>
    
                <!-- Add Contest Menu -->
                <div id="menu_create_contest" class="tab-pane fade">  
                    <div class="jumbotron" style="background-color: white !important;">
                        <h3 class="text-center">Quiz: {{selected_quiz_name}}</h3>
                        <h5 class="pull-right">Time Left: <span id="show_min"></span>:<span id="show_sec"></span></h5><br>
                        <hr> 
                        <form>
                            <div class="form-group">
                                <label for="question">{{position+1}}. {{disp_ques}}</label>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="radio-inline"><input id="opt1" name="ansradio" value="1" type="radio" ng-model="my_quiz_ans" >A. {{disp_op1}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="radio-inline"><input id="opt2" name="ansradio" value="2" type="radio" ng-model="my_quiz_ans">B. {{disp_op2}}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="radio-inline"><input id="opt3" name="ansradio" value="3" type="radio" ng-model="my_quiz_ans">C. {{disp_op3}}</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="radio-inline"><input id="opt4" name="ansradio" value="4" type="radio" ng-model="my_quiz_ans">D. {{disp_op4}}</label>
                                    </div>
                                </div>    
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-warning btn-md" id="save_answer" name="save_answer" ng-click="save_my_ans()">Save Answer</button>
                            </div>
<!--                            <div class="form-group">
                                <ul class="pager">
                                    <li><a href="#" ng-disabled="latch_previous">Previous</a></li>
                                    <li><a href="#" ng-disabled="latch_next">Next</a></li>
                                </ul>
                            </div>
-->
                            <div class="form-group text-center img-rounded">
                                <button class="btn btn-github" ng-disabled="latch_previous" ng-click="previous_question()">Previous</button>
                                <button class="btn btn-github" ng-disabled="latch_next" ng-click="next_question()">Next</button>
                            </div>
                            <button type="button" data-toggle="tab" href="#congrats_quiz" class="btn btn-danger btn-md pull-right" id="submit_quiz" name="submit_quiz" ng-click="submit_my_quiz()">Submit Quiz!!</button>
                        </form>
                    </div>
                </div>
                
                <!-- Post Submit score menu -->
                <div id="congrats_quiz" class="tab-pane fade">       
                    <div class="jumbotron text-center">
                        <h3><kbd>Congratulations!!!</kbd></h3>
                        <h3><kbd>You Scored {{this_quiz_score}}.Keep it Up!</kbd></h3>
                        <button class="btn btn-google pull-right" data-toggle="tab" href="#menu_attempt_quiz" ng-click="all_quiz()">Take Another Quiz</button>
                    </div>
                </div>
                
                <!-- Attempt quiz Menu -->
                <div id="menu_attempt_quiz" class="tab-pane fade" style="padding-top: 20px;">  
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Search a Quiz Name" ng-keyup="search_quiz()" ng-model="search_quiz_name">
                        <i class="glyphicon glyphicon-search form-control-feedback"></i>
                    </div>
                    <div class="panel panel-primary" ng-repeat="i in all_quiz_resp">
                        <div class="panel-heading">
                            {{i.qname}} <span class="label label-danger pull-right">Quiz Creator: {{i.uname}}</span>
                        </div>
                        <div class="panel-body">
                            <h4><span class="label label-primary">Questions: {{i.num_of_ques}}</span> <span class="label label-info">Score: {{i.marks}}(per question)</span> <span class="label label-warning">Time Limit: {{i.time}} minutes</span>
                                <button id="quiz_select" name="quiz_select" class="btn btn-success pull-right" ng-click="open_quiz(i.qid,i.qname,i.marks,i.time)" data-toggle="tab" href="#menu_create_contest">Take this Quiz!!</button></h4>
                        </div>
                    </div>
                </div>
                
                <!-- Attempt Contest Menu -->
                <div id="menu_attempt_contest" class="tab-pane fade">       
                    <div class="alert alert-danger fade in" ng-repeat="i in all_attempted_quiz" style="background-color: #5cb85c !important;color: white !important;">
                        <h3><strong>Quiz Name:</strong> {{i.qname}}</h3>
                        <strong>Your Score:</strong> {{i.qscore}} 
                    </div>
                </div>
                
                </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Menu 3 -->
    <div id="menu3" class="tab-pane fade">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">   
                <img class="img-responsive img-rounded" src="images/sid.jpg" style="height: 150px;"> 
            </div>
            <div class="col-sm-4">   
                <h4>Siddhant Rai</h4>
                <h5>B.E. in Information Technology (3<sup>rd</sup>year)</h5>
                <h5>Sardar Patel Institute of Technology, Andheri(W), Mumbai</h5>
                <a class="btn btn-social-icon btn-google" href="https://plus.google.com/111625491858812290481" target="_blank">
                    <span class="fa fa-google-plus"></span>
                </a>
                <a class="btn btn-social-icon btn-linkedin" href="https://in.linkedin.com/in/siddhant-rai-223b80109" target="_blank">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a class="btn btn-social-icon btn-github" href="https://github.com/sidrai97" target="_blank">
                    <span class="fa fa-github"></span>
                </a>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row" style="margin-top: 25px;">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">   
                <img class="img-responsive img-rounded" src="images/akki.JPG" style="height: 150px;"> 
            </div>
            <div class="col-sm-4">   
                <h4>Akshayanand Raut</h4>
                <h5>B.E. in Information Technology (3<sup>rd</sup>year)</h5>
                <h5>Sardar Patel Institute of Technology, Andheri(W), Mumbai</h5>
                <a class="btn btn-social-icon btn-google" href="https://plus.google.com/111625491858812290481" target="_blank">
                    <span class="fa fa-google-plus"></span>
                </a>
                <a class="btn btn-social-icon btn-linkedin" href="https://in.linkedin.com/in/siddhant-rai-223b80109" target="_blank">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a class="btn btn-social-icon btn-github" href="https://github.com/sidrai97" target="_blank">
                    <span class="fa fa-github"></span>
                </a>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <div class="row" style="margin-top: 25px;">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">   
                <img class="img-responsive img-rounded" src="images/female_user.png" style="height: 150px;"> 
            </div>
            <div class="col-sm-4">   
                <h4>Neeti Prabhupatkar</h4>
                <h5>B.E. in Information Technology (3<sup>rd</sup>year)</h5>
                <h5>Sardar Patel Institute of Technology, Andheri(W), Mumbai</h5>
                <a class="btn btn-social-icon btn-google" href="https://plus.google.com/111625491858812290481" target="_blank">
                    <span class="fa fa-google-plus"></span>
                </a>
                <a class="btn btn-social-icon btn-linkedin" href="https://in.linkedin.com/in/siddhant-rai-223b80109" target="_blank">
                    <span class="fa fa-linkedin"></span>
                </a>
                <a class="btn btn-social-icon btn-github" href="https://github.com/sidrai97" target="_blank">
                    <span class="fa fa-github"></span>
                </a>
            </div>
            <div class="col-sm-3"></div>
        </div>
            
    </div>
    </div>
    </div>
    
    
    
    <!-- Login MODAL -->
    <div class="modal fade" id="myModal_log" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">LOG IN</h4>
        </div>
        <div class="modal-body">
            <form name="login_form" autocomplete="off">
            <div class="form-group">
                <label for="l_uname">Username:</label><span class='myerror' ng-bind="login_uname_err"></span>
                <input type="text" class="form-control" id="l_uname" name="l_uname" required ng-model="login_uname" ng-blur="validate_uname_login()" ng-keyup="validate_uname_login()">
            </div>
            <div class="form-group">
                <label for="l_pwd">Password:</label><span class='myerror' ng-bind="login_pass_err"></span>
                <input type="password" class="form-control" id="l_pwd" name="l_pwd" required ng-model="login_pass" ng-blur="validate_pass_login()" ng-keyup="validate_pass_login()">
            </div>
                <button type="submit" class="btn btn-primary btn-md" id="l_submit" ng-click="login_func()" data-toggle="{{login_modal_enabled}}" data-target="#myModal_log">Submit</button>
            </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
    </div>    
    
    <!-- Sign up MODAL -->
    <div class="modal fade" id="myModal_sign" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">SIGN UP</h4>
        </div>
        <div class="modal-body">
            <form name="signup_form" autocomplete="off">
            <div class="form-group">
                <label for="s_uname">Choose Username:</label><span class="myerror" ng-bind="uname_err"></span>
                <input type="text" class="form-control" id="s_uname" name="s_uname" placeholder="eg: sidrai97" required ng-model="sign_uname" ng-blur="check_uname_err()" ng-keyup="check_uname_err()">
            </div>
            <div class="form-group">
                <label for="s_name">Name:</label><span class="myerror" ng-bind="name_err"></span>
                <input type="text" class="form-control" id="s_name" name="s_name" placeholder="your name" required ng-model="sign_name" ng-blur="check_name_err()" ng-keyup="check_name_err()">
            </div>
            <div class="form-group">
                <label for="s_email">Email:</label><span class="myerror" ng-bind="email_err"></span>
                <input type="text" class="form-control" id="s_email" name="s_email" placeholder="eg: sid@gmail.com" required ng-model="sign_email" ng-blur="check_email_err()" ng-keyup="check_email_err()">
            </div>
            <div class="form-group">
                <label for="s_city">City:</label><span class="myerror" ng-bind="city_err"></span>
                    <input type="text" class="form-control" id="s_city" name="s_city" placeholder="your city" required ng-model="sign_city" ng-blur="check_city_err()" ng-keyup="check_city_err()">
            </div>
            <div class="form-group">
                <label for="s_pwd">Password:</label><span class="myerror" ng-bind="pass_err"></span>
                <input type="password" class="form-control" id="s_pwd" name="s_pwd" placeholder="Choose strong Password" required ng-model="sign_pass" ng-blur="check_pass_err()" ng-keyup="check_pass_err()">
            </div>
            <div class="form-group">
                <label for="s_cpwd">Confirm Password:</label><span class="myerror" ng-bind="cpass_err"></span>
                <input type="password" class="form-control" id="s_cpwd" name="s_cpwd" placeholder="Retype Password" required ng-model="sign_cpass" ng-blur="check_cpass_err()" ng-keyup="check_cpass_err()">
            </div>
           <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="s_dob">Date Of Birth:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="s_dob" required>
                </div>
            </div>-->
            
           <button type="submit" class="btn btn-success btn-md" id="s_submit" name="s_submit" ng-click="signup_func()" data-toggle="{{modal_enabled}}" data-target="#myModal_sign">Submit</button>
            </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
    </div>
  
    <!-- Add Quiz MODAL -->
    <div class="modal fade" id="myModal_add_quiz" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Question</h4>
        </div>
        <div class="modal-body">
            <form>
            <div class="form-group">
                <label for="l_uname">Question</label>
                <input type="text" class="form-control" id="add_ques" required ng-model="quiz_question">
            </div>
            <div class="form-group">
                <label for="l_uname">Option 1</label>
                <input type="text" class="form-control" id="add_op1" required ng-model="quiz_opt1">
            </div>
            <div class="form-group">
                <label for="l_uname">Option 2</label>
                <input type="text" class="form-control" id="add_op2" required ng-model="quiz_opt2">
            </div>
            <div class="form-group">
                <label for="l_uname">Option 3</label>
                <input type="text" class="form-control" id="add_op3" required ng-model="quiz_opt3">
            </div>
            <div class="form-group">
                <label for="l_uname">Option 4</label>
                <input type="text" class="form-control" id="add_op4" required ng-model="quiz_opt4">
            </div>
            <div class="form-group">
                <label>Correct Answer : </label>
                <label class="radio-inline"><input type="radio" name="optradio" value="1" ng-model="quiz_correct_ans" checked>Option 1</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="2" ng-model="quiz_correct_ans">Option 2</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="3" ng-model="quiz_correct_ans">Option 3</label>
                <label class="radio-inline"><input type="radio" name="optradio" value="4" ng-model="quiz_correct_ans">Option 4</label>
            </div>
                <button type="button" class="btn btn-warning btn-md" id="add_submit" ng-click="add_quiz_question()">Save</button>
            </form>
        </div>
        <div class="modal-footer"></div>
      </div>
    </div>
    </div>
     
    <!-- COPYRIGHT
    <div class="row" style="background: #222;margin: 0;border: 0;padding: 5px;" id="copyright_block">
        <h5 style="color:#2ec866"><span class="glyphicon glyphicon-copyright-mark"></span>AlphaQ 2016</h5>
    </div>-->
    <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
        <h5 style="color:#2ec866"><span class="glyphicon glyphicon-copyright-mark"></span>AlphaQ 2016</h5> 
    </div>
    </nav>
    
    
    
    </body>
</html>