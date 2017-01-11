var app = angular.module("alpha", ['ngCookies']);
app.controller("cont_alpha", function($scope,$http,$cookies) {
    //$cookies.put('alphaq_uname','');
    //$scope.log_uname = $cookies.get('alphaq_uname');//logged username
    //$scope.log_uname = '';
    
    if($cookies.get('alphaq_uname') === null || $cookies.get('alphaq_uname') === undefined){$scope.log_uname = '';}
    else{$scope.log_uname = $cookies.get('alphaq_uname');}
    console.log($scope.log_uname);
    
    //login modal
    $scope.login_uname='';
    $scope.login_pass='';
    //signup modal
    $scope.sign_uname='';
    $scope.sign_name='';
    $scope.sign_email='';
    $scope.sign_pass='';
    $scope.sign_cpass='';
    $scope.sign_city='';
    
    $scope.login_uname_err='';
    $scope.login_pass_err='';
    $scope.login_submit_latch=false;
    $scope.login_modal_enabled='';
    $scope.validate_uname_login = function(){
        $scope.login_uname_err='';
        $scope.reg = /^\w+$/;
        console.log('----------------');
        console.log($scope.reg.test($scope.login_uname));
        if($scope.login_uname.length < 1)
        {
            $scope.login_uname_err=' *Required';
        }
        else if($scope.reg.test($scope.login_uname) == false)
        {
            $scope.login_uname_err=' *Invalid Username';
        }
    };
    $scope.validate_pass_login = function(){
        $scope.login_pass_err='';
        $scope.reg = /^\w+$/;
        console.log($scope.reg.test($scope.login_pass));
        if($scope.login_pass.length < 1)
        {
            $scope.login_pass_err=' *Required';
        }
        else if($scope.reg.test($scope.login_pass) == false)
        {
            $scope.login_pass_err=' *Invalid Password';
        }
    };
    //allows login for authenticate user 
    $scope.login_func = function(){
        $scope.validate_uname_login();
        $scope.validate_pass_login();
        if($scope.login_uname_err != '' || $scope.login_pass_err != '')
        {
            $scope.login_submit_latch=true;
        }
        else
        {
            $scope.login_submit_latch=false;
        }
        
        if($scope.login_submit_latch == false)
        {
            $scope.login_modal_enabled='modal';
            $http({
                method: "post",
                url: "./php_scripts/login_handler.php",
                data: {
                    uname: $scope.login_uname,
                    pass: $scope.login_pass
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                $scope.login_uname='';
                $scope.login_pass='';
                //response data
                $scope.login_Data = response.data.records;
                if($scope.login_Data.length < 1)
                {
                    $scope.login_modal_enabled='';
                    $scope.login_uname_err=' *Invalid Username';
                    $scope.login_pass_err=' *Invalid password';
                }
                else
                {
                //setting cookie
                $cookies.put('alphaq_uname',$scope.login_Data[0].uname);
                $scope.log_uname = $cookies.get('alphaq_uname');//logged username
                //$scope.log_uname = $scope.login_Data[0].uname;//set username
                
                }
            });
        }
    };
    //making new user by validating all inputs
    $scope.sign_submit_latch=false;
    $scope.uname_err='';
    $scope.name_err='';
    $scope.email_err='';
    $scope.city_err='';
    $scope.pass_err='';
    $scope.cpass_err='';
    $scope.uname_checked_resp='';
    $scope.email_checked_resp='';
    $scope.modal_enabled='';
    $scope.check_uname_err = function(){
        if($scope.sign_uname.length < 1)
        {
            $scope.uname_err=' *Required';
        }
        else
        {
            $http({
                method: "post",
                url: "./php_scripts/existing_uname.php",
                data: {
                    uname: $scope.sign_uname
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                $scope.uname_checked_resp=response.data.records;
                if($scope.uname_checked_resp.length > 0)
                {
                    $scope.uname_err=' *uname already taken';
                }
                else
                {
                    $scope.uname_err='';
                }
            });
        }
    };
    $scope.check_name_err = function(){
        if($scope.sign_name.length < 1)
        {
            $scope.name_err=' *Required';
        }
        else
        {
            $scope.name_err='';
        }
    };
    $scope.check_email_err = function(){
        if($scope.sign_email.length < 1)
        {
            $scope.email_err=' *Required';
        }
        else
        {
            $http({
                method: "post",
                url: "./php_scripts/existing_email.php",
                data: {
                    email: $scope.sign_email
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                $scope.email_checked_resp=response.data.records;
                if($scope.email_checked_resp.length > 0)
                {
                    $scope.email_err=' *email already in use';
                }
                else
                {
                    $scope.email_err='';
                }
            });
        }
    };
    $scope.check_city_err = function(){
        if($scope.sign_city.length < 1)
        {
            $scope.city_err=' *Required';
        }
        else
        {
            $scope.city_err='';
        }
    };
    $scope.check_pass_err = function(){
        if($scope.sign_pass.length < 1)
        {
            $scope.pass_err=' *Required';
        }
        else if($scope.sign_pass.length < 6)
        {
            $scope.pass_err=' *Weak Password';
        }
        else
        {
            $scope.pass_err='';
        }
    };
    $scope.check_cpass_err = function(){
        if($scope.sign_cpass.length < 1)
        {
            $scope.cpass_err=' *Required';
        }
        else if($scope.sign_cpass != $scope.sign_pass)
        {
            $scope.cpass_err=' *Incorrect Password';
        }
        else
        {
            $scope.cpass_err='';
        }
    };
    
    $scope.signup_func = function(){
        
        $scope.check_uname_err();
        $scope.check_name_err();
        $scope.check_email_err();
        $scope.check_city_err();
        $scope.check_pass_err();
        $scope.check_cpass_err();
        if($scope.uname_err != '' || $scope.email_err != '' || $scope.name_err != '' || $scope.city_err != '' || $scope.pass_err != '' || $scope.cpass_err != '')
        {
            $scope.sign_submit_latch=true;
        }
        else
        {
            $scope.sign_submit_latch=false;
        }
        
        if($scope.sign_submit_latch == false)
        {
        $http({
                method: "post",
                url: "./php_scripts/signup_handler.php",
                data: {
                    uname: $scope.sign_uname,
                    name: $scope.sign_name,
                    email: $scope.sign_email,
                    city: $scope.sign_city,
                    pass: $scope.sign_pass
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                //response data
                //$scope.login_Data = response.data.records;
                //$scope.log_uname = $scope.login_Data[0].uname;//set username
                //console.log($scope.log_uname);
                //$scope.log_uname = $scope.sign_uname;
                
                //seeting cookie
                $cookies.put('alphaq_uname',$scope.sign_uname);
                $scope.log_uname = $cookies.get('alphaq_uname');
                
                $scope.sign_uname='';
                $scope.sign_name='';
                $scope.sign_email='';
                $scope.sign_pass='';
                $scope.sign_cpass='';
                $scope.sign_city='';  
            });
            $scope.modal_enabled='modal';
        }
    };
    
    $scope.log_out = function(){
        //$cookies.put('alphaq_uname','');
        $cookies.remove('alphaq_uname');
        console.log($cookies.get('alphaq_uname'));
        if($cookies.get('alphaq_uname') === null || $cookies.get('alphaq_uname') === undefined){$scope.log_uname = '';}
        //$scope.log_uname = "";
    };
    $scope.check_login = function(){
        if($scope.log_uname === "")
        {
            return false;
        }
        else
        {
            return true;
        }
    };
    
    $scope.validate_cpass = function(){
        if($scope.sign_pass !== $scope.sign_cpass)
        {
            return true;
        }
        return false;
    };
    $scope.validate_pass = function(){
        $scope.reg = /^\w+$/;
        return !($scope.reg.test($scope.sign_pass));
    };
    $scope.validate_uname = function(){
        $scope.reg = /^\w+$/;
        return !($scope.reg.test($scope.sign_uname));
    };
    
    //dashboard initial & updated on clicking dashboard and profile
    $scope.profile_loader = function(){
        $http({
                method: "post",
                url: "./php_scripts/profile_loader.php",
                data: {
                    uname: $scope.log_uname
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                //response data
                $scope.profile_Data = response.data.records;
                $scope.profile_uname = $scope.profile_Data[0].uname;//set username
                $scope.profile_name = $scope.profile_Data[0].name;
                $scope.profile_email = $scope.profile_Data[0].email;
                $scope.profile_city = $scope.profile_Data[0].city;
                $scope.profile_score = $scope.profile_Data[0].score;
            });
    };
    
    //adding quiz name to db with creator name and retrieving quiz id
    $scope.quiz_name = '';
    $scope.quiz_marks = '';
    $scope.quiz_time = '';
    $scope.quiz_id = 0;
    $scope.num_of_questions=0;
    $scope.control_addquiz = true;
    $scope.control_newQues = true;
    $scope.control_done = true;
    $scope.latch_name = false;
    $scope.latch_marks = false;
    $scope.latch_time = false;
    
    //quiz form validation
    $scope.quiz_form_validate = function(){
        if($scope.quiz_name === '' || $scope.quiz_marks === '' || $scope.quiz_time === '')
        {
            $scope.control_addquiz=true;
        }
        else
        {
            $scope.control_addquiz=false;
        }
    };
    
    $scope.quiz_add_db = function(){
        $http({
                method: "post",
                url: "./php_scripts/quiz_name_adder.php",
                data: {
                    ques_name: $scope.quiz_name,
                    uname: $scope.log_uname,
                    marks: $scope.quiz_marks,
                    time: $scope.quiz_time
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                console.log("response recieved");
                //response data
                $scope.response_data = response.data.records;
                $scope.quiz_id = $scope.response_data[0].qid;//set quiz id
                console.log("quiz id"+$scope.quiz_id);
                //disable or enable buttons
                $scope.control_addquiz = true;
                $scope.control_newQues = false;
                $scope.control_done = false;
                $scope.latch_name = true;
                $scope.latch_marks = true;
                $scope.latch_time = true;
            });
    };
    //add quiz question to db
    $scope.quiz_question='';
    $scope.quiz_opt1='';
    $scope.quiz_opt2='';
    $scope.quiz_opt3='';
    $scope.quiz_opt4='';
    //err displayers
    $scope.quiz_ques_err='';
    $scope.quiz_op1_err='';
    $scope.quiz_op2_err='';
    $scope.quiz_op3_err='';
    $scope.quiz_op4_err='';
    $scope.add_quiz_question = function(){
        console.log($scope.quiz_question+" "+$scope.quiz_opt1+" "+$scope.quiz_opt2+" "+$scope.quiz_opt3+" "+$scope.quiz_opt4+" "+$scope.quiz_correct_ans);
        if($scope.quiz_question.length < 1 || $scope.quiz_opt1.length < 1 || $scope.quiz_opt2.length < 1 || $scope.quiz_opt3.length < 1 || $scope.quiz_opt4.length < 1)
        {
            
        }
        else 
        {
            $http({
                    method: "post",
                    url: "./php_scripts/add_quiz_ques.php",
                    data: {
                        quiz_id: $scope.quiz_id,
                        ques_name: $scope.quiz_question,
                        op1: $scope.quiz_opt1,
                        op2: $scope.quiz_opt2,
                        op3: $scope.quiz_opt3,
                        op4: $scope.quiz_opt4,
                        correct_op: $scope.quiz_correct_ans
                    }
                //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
                }).then(function(response) {
                    console.log("quiz added");
                    //empting data of add question modal
                    $scope.quiz_question='';
                    $scope.quiz_opt1='';
                    $scope.quiz_opt2='';
                    $scope.quiz_opt3='';
                    $scope.quiz_opt4='';
                    $scope.quiz_correct_ans='';
                    $scope.num_of_questions+=1;
                });
        }
    };
    
    //setting latches after adding question
    $scope.done_quiz_ques = function(){
        $scope.quiz_id=null;
        $scope.num_of_questions=0;
        $scope.quiz_name='';
        $scope.quiz_marks='';
        $scope.quiz_time='';
        
        $scope.control_newQues = true;
        $scope.control_done = true;
        $scope.latch_name = false;
        $scope.latch_marks = false;
        $scope.latch_time = false;
    };
    
    //getting all quiz from db
    $scope.all_quiz_resp = null;
    
    $scope.all_quiz = function(){
        console.log('called');
        $http({
                method: "post",
                url: "./php_scripts/all_quiz_list.php",
                data: {
                    username: $scope.log_uname
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                
                $scope.all_quiz_resp = response.data.records;
                console.log($scope.all_quiz_resp);
                $scope.this_quiz_score=0;
            });
    };
    $scope.search_quiz_name='';
    $scope.search_quiz = function(){
        $http({
                method: "post",
                url: "./php_scripts/search_quiz.php",
                data: {
                    username: $scope.log_uname,
                    quiz_name: $scope.search_quiz_name
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                
                $scope.all_quiz_resp = response.data.records;
                console.log($scope.all_quiz_resp);
                $scope.this_quiz_score=0;
            });
    };
    
    $scope.board_hide=true;
    $scope.table_leaderboard='';
    $scope.rank=1;
    $scope.board_toogle = function(){
        if($scope.board_hide === true)
        {
            $scope.board_hide = false;
        }
        else
        {
            $scope.board_hide=true;
        }
        $scope.rank=1;
        $http({
                method: "post",
                url: "./php_scripts/leaderboard.php"
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {                
                $scope.table_leaderboard = response.data.records;
            });
    };
    
    //opening a quiz
    $scope.selected_quiz = '';
    $scope.time_remaining='';
    $scope.selected_quiz_marks='';
    $scope.selected_quiz_name='';
    $scope.selected_quiz_questions='';
    $scope.position=0;
    $scope.disp_ques_id = '';
    $scope.disp_ques = '';
    $scope.disp_op1 = '';
    $scope.disp_op2 = '';
    $scope.disp_op3 = '';
    $scope.disp_op4 = '';
    $scope.latch_previous=true;
    $scope.latch_next=false;
    
    $scope.open_quiz = function(num,name,marks,time){
        $scope.quiz_is_active='disabled';
        $scope.selected_quiz = num;
        $scope.time_remaining = time;
        $scope.selected_quiz_marks=marks;
        $scope.selected_quiz_name=name;
        console.log("selected: "+$scope.selected_quiz);
        $scope.my_time_min=$scope.time_remaining;
        
        $http({
                method: "post",
                url: "./php_scripts/get_quiz_questions.php",
                data: {
                    quiz_id: $scope.selected_quiz
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                
                $scope.selected_quiz_questions = response.data.records;
                console.log($scope.selected_quiz_questions);
                
                for(var i=0;i<$scope.selected_quiz_questions.length;i++)
                {
                    var quesid=$scope.selected_quiz_questions[i].ques_id;
                    var ans=$scope.selected_quiz_questions[i].correct_op;
                    
                    $scope.fetched_answers.push({
                        quesid:quesid,
                        myans:ans
                    });
                }
                console.log('----------');
                console.log($scope.fetched_answers);
                
                $scope.position=0;
                $scope.disp_ques_id = $scope.selected_quiz_questions[$scope.position].ques_id;
                $scope.disp_ques = $scope.selected_quiz_questions[$scope.position].ques_name;
                $scope.disp_op1 = $scope.selected_quiz_questions[$scope.position].op1;
                $scope.disp_op2 = $scope.selected_quiz_questions[$scope.position].op2;
                $scope.disp_op3 = $scope.selected_quiz_questions[$scope.position].op3;
                $scope.disp_op4 = $scope.selected_quiz_questions[$scope.position].op4;
            });
            
            $scope.init_timer();
    };
    
    $scope.fetched_answers=[];
    //displaying next and previous questions
    $scope.previous_question = function(){
        if($scope.position > 0)
        {
            //$scope.my_quiz_ans=null;
            $scope.latch_next=false;
            $scope.position-=1;
            $scope.disp_ques_id = $scope.selected_quiz_questions[$scope.position].ques_id;
            $scope.disp_ques = $scope.selected_quiz_questions[$scope.position].ques_name;
            $scope.disp_op1 = $scope.selected_quiz_questions[$scope.position].op1;
            $scope.disp_op2 = $scope.selected_quiz_questions[$scope.position].op2;
            $scope.disp_op3 = $scope.selected_quiz_questions[$scope.position].op3;
            $scope.disp_op4 = $scope.selected_quiz_questions[$scope.position].op4;
            
            for(var i=0;i<$scope.saved_answers.length;i++)
            {
                if($scope.disp_ques_id == $scope.saved_answers[i].quesid)
                {
                    $scope.my_quiz_ans=$scope.saved_answers[i].myans;
                    console.log('matched');break;
                }
                else
                {
                    $scope.my_quiz_ans=null;
                    console.log('not matched');
                }
            }
            
        }
        if($scope.position === 0)
        {
            $scope.latch_previous=true;
        }
    };
    $scope.next_question = function(){
        if($scope.position < $scope.selected_quiz_questions.length-1)
        {
            //$scope.my_quiz_ans=null;
            $scope.latch_previous=false;
            $scope.position+=1;
            $scope.disp_ques_id = $scope.selected_quiz_questions[$scope.position].ques_id;
            $scope.disp_ques = $scope.selected_quiz_questions[$scope.position].ques_name;
            $scope.disp_op1 = $scope.selected_quiz_questions[$scope.position].op1;
            $scope.disp_op2 = $scope.selected_quiz_questions[$scope.position].op2;
            $scope.disp_op3 = $scope.selected_quiz_questions[$scope.position].op3;
            $scope.disp_op4 = $scope.selected_quiz_questions[$scope.position].op4;
            
            for(var i=0;i<$scope.saved_answers.length;i++)
            {
                if($scope.disp_ques_id == $scope.saved_answers[i].quesid)
                {
                    $scope.my_quiz_ans=$scope.saved_answers[i].myans;
                    console.log('matched');break;
                }
                else
                {
                    $scope.my_quiz_ans=null;
                     console.log('not matched');
                }
            }
            
        }
        if($scope.position === $scope.selected_quiz_questions.length-1)
        {
            $scope.latch_next=true;
        }
    };
    
    //storing answers
    $scope.my_quiz_ans=null;
    $scope.saved_answers=[];
    console.log('----'+$scope.saved_answers.length+'------');
    $scope.save_my_ans = function(){
        console.log("Question Id"+$scope.disp_ques_id+" Answer selected: "+$scope.my_quiz_ans);
        //$scope.my_quiz_ans=null;
        var ques_id=$scope.disp_ques_id;
        var myanswer=$scope.my_quiz_ans;
        
        if($scope.saved_answers.length == 0)
        {
            $scope.saved_answers.push({
                quesid:ques_id,
                myans:myanswer
            });
        }
        
        for(var i=0;i<$scope.saved_answers.length;i++)
        {
            if($scope.disp_ques_id == $scope.saved_answers[i].quesid)
            {
                $scope.saved_answers[i].myans=myanswer;
                break;
            }
            if(i == $scope.saved_answers.length-1 )
            {
                $scope.saved_answers.push({
                    quesid:ques_id,
                    myans:myanswer
                });
            }
        }
        
        console.log($scope.saved_answers);
        
    };
   
    //quiz submission to server
    $scope.this_quiz_score=0;
    $scope.submit_my_quiz = function(){
        console.log('submitted');
        clear_timer();
        $scope.quiz_is_active='';
        $scope.selected_quiz_marks=parseInt($scope.selected_quiz_marks);
        
        for(var i=0;i<$scope.fetched_answers.length;i++)
        {
            for(var j=0;j<$scope.saved_answers.length;j++)
            {
                if($scope.fetched_answers[i].quesid == $scope.saved_answers[j].quesid)
                {
                    if($scope.fetched_answers[i].myans == $scope.saved_answers[j].myans)
                    {
                        $scope.this_quiz_score+=$scope.selected_quiz_marks;
                    }
                }
            }
        }
        $scope.fetched_answers=[];
        $scope.saved_answers=[];
        $scope.my_quiz_ans=null;
        console.log('score'+$scope.this_quiz_score);
        $http({
                method: "post",
                url: "./php_scripts/submit_quiz.php",
                data: {
                    quiz_id: $scope.selected_quiz,
                    user_name: $scope.log_uname,
                    quiz_score: $scope.this_quiz_score
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                console.log('score updated');
                $scope.latch_next=false;
                $scope.latch_previous=false;
            });
        
    };
    
    $scope.quiz_is_active='';
    
    $scope.my_time_min=0;
    $scope.my_time_sec=60;
    var min,sec,t;
    
    function clear_timer()
    {
        clearTimeout(t);
    }
    
    function disp_timer(){
        if(min == 0 && sec == 2)
        {
            console.log('tried');
            clear_timer();
            //closing quiz
            $('#submit_quiz').trigger('click');
        }
        else{
            t=setTimeout(disp_timer,1000);
        }
        sec-=1;
        if(sec==0)
        {
            sec=60;
            min-=1;
        }
        
        $scope.my_time_min=min;
        $scope.my_time_sec=sec;
        document.getElementById("show_min").innerHTML=""+min;
        document.getElementById("show_sec").innerHTML=""+sec;
        console.log('before timeout'+$scope.my_time_min+':'+$scope.my_time_sec);
	
        console.log('after timeout'+$scope.my_time_min+':'+$scope.my_time_sec);
    }
    
    $scope.init_timer = function(){
        min=$scope.my_time_min-1;
        sec=$scope.my_time_sec;
        console.log('started');
        disp_timer();
        console.log('called');
    };
    
    $scope.attempted_quiz_name='';
    $scope.attempted_quiz_score='';
    $scope.all_attempted_quiz='';
    
    $scope.call_attempted_quiz = function(){
        $http({
                method: "post",
                url: "./php_scripts/get_attempted_quiz.php",
                data: {
                    user_name: $scope.log_uname
                }
            //    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }//this is default no issues if not written
            }).then(function(response) {
                $scope.all_attempted_quiz=response.data.records;
                console.log($scope.all_attempted_quiz);
            });
    };
    
});