<?php
// Require the facebook sdk for php;
require 'facebook-api/facebook.php';

// Require the configuration file that we created earlier;
require 'facebook_config.php';

// If the user has not installed the app, redirect them to the Login Dialog
if (!$user_id) {
    $loginUrl = $facebook->getLoginUrl(array(
        'scope' => $scope,
        'redirect_uri' => $app_url,
    ));
    // Do the redirection
    print('<script> top.location.href=\'' . $loginUrl . '\'</script>');
}
// If we are already authorized, get the users profile information
$user_profile = $facebook->api('/me','GET');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>OpenShift Quiz</title>
    <link media="all" rel="stylesheet" href="css/openshift.css" type="text/css" />
    <link media="all" rel="stylesheet" href="css/openshiftquiz.css" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=252707081572197";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="topper">
    <div id="welcome">
        Welcome to the OpenShift Quiz <?php echo $user_profile['name'];?>!
    </div>
    <div id="score">Score: <span class="points">0</span> </div>
    <div style="clear:both"></div>
    <div id="successMessage" style="display:none;height:35px;width:100%;background-color:#52c612;text-align:center;color:#fff;"></div>
</div>

<div class='container'>
    <span style="display:none;" id="user_name"><?php echo urlencode($user_profile['name']); ?></span>

    <p>
        This is a demo Facebook application running on OpenShift, but make no mistake, this is a tough quiz!  All answers can be found online in the forums, Knowledge Base articles, FAQs, or on the <a href="http://openshift.com" target="_blank">OpenShift</a> website.
    </p>
    <p>
        The questions start easy and get harder as you go.  As you reach certain scores, you will be asked if you want to post your score to Facebook, and at the end you will have the opportunity to share this quiz on your timeline.
    </p>

    <div id="quiz">
        <form>
            <ol class="questions">
                <li class="question"> What is OpenShift Online?
                    <div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>An Open Source car manufacturer
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="true" data-points="10"/>
                            <span class="answered"></span>A cloud computing platform as a service  (PaaS) product from Red Hat
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>An online strategy game
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>An online racing game
                        </div>
                    </div>
                </li>
                <li class="question">  How many free small gears do you get just for signing up for OpenShift?
                    <div>
                        <div>
                            <input type="radio" name="question2"  data-correct="false"/>
                            <span class="answered"></span>0 small gears
                        </div>
                        <div>
                            <input type="radio" name="question2"  data-correct="false" />
                            <span class="answered"></span>1 small gear
                        </div>
                        <div>
                            <input type="radio" name="question2"  data-correct="false" />
                            <span class="answered"></span>2 small gears
                        </div>
                        <div>
                            <input type="radio" name="question2"  data-correct="true" data-points="20"/>
                            <span class="answered"></span>3 small gears
                        </div>
                    </div>
                </li>
                <li class="question"> How much does it cost to bring your own domain name to OpenShift on any plan?
                    <div>
                        <div>
                            <input type="radio" name="question1"  data-correct="true" data-points="30"/>
                            <span class="answered"></span>Nothing. It's free
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>$25 a month
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>$30 a month
                        </div>
                        <div>
                            <input type="radio" name="question1"  data-correct="false"/>
                            <span class="answered"></span>$35 a month
                        </div>
                    </div>
                </li>
                <li class="question"> What is the hourly cost for a medium gear on OpenShift?
                    <div>
                        <div>
                            <input type="radio" name="question3"  data-correct="true" data-points="40"/>
                            <span class="answered"></span>$0.05/hour
                        </div>
                        <div>
                            <input type="radio" name="question3"  data-correct="false"/>
                            <span class="answered"></span>$0.06/hour
                        </div>
                        <div>
                            <input type="radio" name="question3"  data-correct="false"/>
                            <span class="answered"></span>$0.07/hour
                        </div>
                        <div>
                            <input type="radio" name="question3"  data-correct="false"/>
                            <span class="answered"></span>$0.08/hour
                        </div>
                    </div>
                </li>
                <li class="question"> What programming languages can you use on OpenShift?
                    <div>
                        <div>
                            <input type="radio" name="question4"  data-correct="false"/>
                            <span class="answered"></span>Just PHP
                        </div>
                        <div>
                            <input type="radio" name="question4"  data-correct="false" />
                            <span class="answered"></span>PHP and Python
                        </div>
                        <div>
                            <input type="radio" name="question4"  data-correct="false"/>
                            <span class="answered"></span>PHP, Python, Ruby, and Java
                        </div>
                        <div>
                            <input type="radio" name="question4"  data-correct="true" data-points="50"/>
                            <span class="answered"></span>Any language that you can compile and run on linux
                        </div>
                    </div>
                </li>
                <li class="question"> What is the correct rhc command to create a new php application on OpenShift?
                    <div>
                        <div>
                            <input type="radio" name="question5"  data-correct="false"/>
                            <span class="answered"></span>rhc app new myapp php-5.4
                        </div>
                        <div>
                            <input type="radio" name="question5"  data-correct="true" data-points="60"/>
                            <span class="answered"></span>rhc app create myapp php-5.4
                        </div>
                        <div>
                            <input type="radio" name="question5"  data-correct="false"/>
                            <span class="answered"></span>rhc new application myapp php-5.4
                        </div>
                        <div>
                            <input type="radio" name="question5"  data-correct="false"/>
                            <span class="answered"></span>rhc create me an application with php-5.4 please
                        </div>
                    </div>
                </li>
                <li class="question"> How do you deploy Java applications on OpenShift?
                    <div>
                        <div>
                            <input type="radio" name="question6"  data-correct="false"/>
                            <span class="answered"></span>Via SCP/SFTP only
                        </div>
                        <div>
                            <input type="radio" name="question6"  data-correct="false" />
                            <span class="answered"></span>Via git only
                        </div>
                        <div>
                            <input type="radio" name="question6"  data-correct="true" data-points="70"/>
                            <span class="answered"></span>Via SCP/SFTP or using git
                        </div>
                        <div>
                            <input type="radio" name="question6"  data-correct="false"/>
                            <span class="answered"></span>By chanting a magic incantation
                        </div>
                    </div>
                </li>
                <li class="question"> What is the easiest way to create a new Environment Variable on your gear?
                    <div>
                        <div>
                            <input type="radio" name="question7"  data-correct="false"/>
                            <span class="answered"></span>SSH into your gear and use the export command
                        </div>
                        <div>
                            <input type="radio" name="question7"  data-correct="true" data-points="80"/>
                            <span class="answered"></span>Use the rhc command with the set-env NAME=VALUE argument
                        </div>
                        <div>
                            <input type="radio" name="question7"  data-correct="false"/>
                            <span class="answered"></span>Add the environment variable to an action_hook
                        </div>
                        <div>
                            <input type="radio" name="question7"  data-correct="false"/>
                            <span class="answered"></span>You can't do it!
                        </div>
                    </div>
                </li>
                <li class="question"> What benefits do you get by upgrading to the Silver plan?
                    <div>
                        <div>
                            <input type="radio" name="question8"  data-correct="true" data-points="90"/>
                            <span class="answered"></span>Access to medium/large gears (2GB RAM), up to 6GB of storage, up to 16 gears, and world class support by Red Hat
                        </div>
                        <div>
                            <input type="radio" name="question8"  data-correct="false" />
                            <span class="answered"></span>Root access to the server
                        </div>
                        <div>
                            <input type="radio" name="question8"  data-correct="false"/>
                            <span class="answered"></span>Your own dedicated server
                        </div>
                        <div>
                            <input type="radio" name="question8"  data-correct="false"/>
                            <span class="answered"></span>A pony
                        </div>
                    </div>
                </li>
                <li class="question"> How much memory is available to each gear size?
                    <div>
                        <div>
                            <input type="radio" name="question9"  data-correct="false"/>
                            <span class="answered"></span>small 256MB, medium 512GB, large 1GB
                        </div>
                        <div>
                            <input type="radio" name="question9"  data-correct="false" />
                            <span class="answered"></span>small 128MB, medium 256GB, large 384GB
                        </div>
                        <div>
                            <input type="radio" name="question9"  data-correct="false"/>
                            <span class="answered"></span>small 500GB, medium 1GB, large 2GB
                        </div>
                        <div>
                            <input type="radio" name="question9"  data-correct="true" data-points="100"/>
                            <span class="answered"></span>small 512MB, medium 1GB, large 2GB
                        </div>
                    </div>
                </li>
                <li class="question"> Can you run a scaled application on the Free plan?
                    <div>
                        <div>
                            <input type="radio" name="question10"  data-correct="false"/>
                            <span class="answered"></span>No
                        </div>
                        <div>
                            <input type="radio" name="question10"  data-correct="true" data-points="110"/>
                            <span class="answered"></span>Yes
                        </div>
                        <div>
                            <input type="radio" name="question10"  data-correct="false"/>
                            <span class="answered"></span>Maybe
                        </div>
                        <div>
                            <input type="radio" name="question10"  data-correct="false"/>
                            <span class="answered"></span>What is scaling?
                        </div>
                    </div>
                </li>
            </ol>
        </form>
    </div>
    <div style="display:none;background-color:#31c421;width:500px;text-align:center;padding:5px;" class="show-congratulations">
        <strong>Congratulations <?php echo $user_profile['name']; ?>!!!</strong><br/>
        You scored <span class="points">0</span> points on the OpenShift Quiz!<br/>
    </div>
    <a href="#" id="share-quiz">Share the OpenShift Quiz with your friends and see who can score the highest!</a><br />

    <br/>
    <br/>

    Like OpenShift on Facebook!<br/>
    <div class="fb-like" data-href="http://facebook.com/openshift" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div><br />
    <br/><br/>
    Learn more about hosting Facebook Apps on OpenShift with these two blog posts:<br/>
    <a href="https://www.openshift.com/blogs/developing-facebook-applications-on-openshift-getting-set-up" target="_blank">Developing Facebook Applications on OpenShift: Getting Set Up</a><br/>
    <a href="https://www.openshift.com/blogs/developing-facebook-applications-on-openshift-launch-your-app" target="_blank">Developing Facebook Applications on OpenShift: Launch Your App</a>




    <footer>
        <div class="logo"><a href="https://www.openshift.com/"></a></div>
    </footer>
</div>
<script type="text/javascript" src="js/openshiftquiz.js"></script>
</body>
</html>
