<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TypeSkip</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="{{asset('assets')}}/frontend/landing-images/icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets')}}/frontend/css/landing-style.css">
    
</head>
<body>

    <div class="comingsoon">
        <img class="top-icon" src="{{asset('assets')}}/frontend/landing-images/typeskip.png" alt="icon">
        <div class="comingsoon-wrap">
                       
            <h2>Supercharge your content workflow<br class="phonenone"> using AI</h2>
            <p>Turn keywords and one-liners into persuasive, high converting ads, product descriptions, and blogs etc.</p>

            <form class="newsletter">
                <input type="email" placeholder="We're launching soon!" id="email" required>
                <button id="notify-me">Notify Me</button>
                <br>
                <span id="message"><p class="email-message"></p> <img src="{{asset('assets')}}/frontend/landing-images/check.jpeg"></span>
            </form>
        </div>


        <div class="card-box">
            <div class="bg-img">
                <img src="{{asset('assets')}}/frontend/landing-images/circle.svg" alt="circle">
                <img src="{{asset('assets')}}/frontend/landing-images/circle1.svg" alt="circle">
            </div>
            <!-- card header -->
            <div class="card-header">
                <div class="three-dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                
                <button id="reset"><img src="{{asset('assets')}}/frontend/landing-images/reset.svg" alt="reset">Reset</button>
            </div>
            <!-- card header end -->
            
            <!-- card top -->
            <div class="card-top">
                <a href="#"><img src="{{asset('assets')}}/frontend/landing-images/typeskip.png" alt="logo"></a>
                
            </div>
            <!-- card top end -->
            
            <!-- card main -->
            <div class="main-wrap">
                <!-- form -->
                <form class="rightform">
                    <input id="name" placeholder="Company Name" readonly dataValue="SwolePatrol" width="500" type="text"> 
                    <input id="title" placeholder="Tone of Voice" readonly dataValue="Witty" type="text">
                    <textarea id="textarea" placeholder="Description" readonly dataValue="High quality honey cinnamon peanut butter whey protein" rows="3"></textarea> 
                    <div class="keywords">
                        <span class="placeholder">Keywords</span>
                        <span class="keyword-item">26G Protein<button class="tag-remove"></button></span>
                        <span class="keyword-item">Get Results<button class="tag-remove"></button></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="outputs">
                            <input id="nValue" value="5" type="number" name="nValue" min="1" max="15" aria-describedby="ideas" autocomplete="off" class="pr-20 form-input">
                            <span>Outputs</span>
                        </div>
                        <button class="generate" type="button">
                            <span class="btn-load" ></span>
                            <span class="btn-txt">Generate</span>
                        </button> 
                    </div>
                    <button class="playDemo">Step 1: Play Demo</button>
                    <button type="button" class="hit-generate">Step 2: Hit Generate!</button>
                </form>
                <!-- form end -->
    
                <!-- content box -->
                <div class="content-box">
                    <div class="box-empty">
                        <img src="{{asset('assets')}}/frontend/landing-images/demo.png" alt="" class="plane">
                        <p>Answer the prompts and click generate to watch the AI magic happen ✨.</p>
                    </div>
                    <ul>
                        <li>
                            <div class="card-item">
                                <p><b>Ad</b> • www.swolepatrol.com/ ▾</p>
                                <h3>Get Buff Fast | Build Muscle Fast | Boost Your Workout</h3>
                                <p>Finally, protein made the way it should be. With 26g of protein per serving and a mouth watering honey cinnamon peanut butter flavor, gains have never tasted this good.</p>
                            </div>
                        </li>
                        <li>
                            <div class="card-item">
                                <p><b>Ad</b> • www.swolepatrol.com/ ▾</p>
                                <h3>Best Whey Protein | Whey Protein Powder | Whey Protein</h3>
                                <p>Swole Patrol – The Professional's Choice in Gaining Mass, Building Strength, and Wanting to Look Good Naked. And it just so happens to be packed with 26g of protein per serving, and only 2g of sugar.<br>
                                We know what you’re thinking: “How can this possibly taste good?” Well, we have a secret ingredient that makes all the difference…
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="card-item">
                                <p><b>Ad</b> • www.swolepatrol.com/ ▾</p>
                                <h3>Get the gains you deserve</h3>
                                <p>You’ve been working hard in the gym, but your protein is holding you back from getting the results you want. SwolePatrol has 26G of protein per serving and tastes delicious so that you can get the gains you deserve without sacrificing taste or quality. Click here to try it for free: www.swolepatrol.com/freetrial</p>
                            </div>
                        </li>
                        <li>
                            <div class="card-item">
                                <p><b>Ad</b> • www.swolepatrol.com/ ▾</p>
                                <h3>Tired of protein powders that taste like chalk?</h3>
                                <p>Swole Patrol is a new type of protein powder made for the hard-gaining athlete. It’s loaded with 26G of muscle building protein and has a delicious Honey Cinnamon Peanut Butter flavor. But what really sets Swole Patrol apart from other proteins is how it’s made. We use an advanced process to make our whey isolate, which means you get more pure protein per serving than any other brand on the market!</p>
                            </div>
                        </li>
                        <li>
                            <div class="card-item">
                                <p><b>Ad</b> • www.swolepatrol.com/ ▾</p>
                                <h3>Looking for a healthy protein shake?</h3>
                                <p>Swole Patrol is the first and only brand to deliver 26g of protein per serving in a delicious honey cinnamon peanut butter flavor. It’s perfect for pre-workout, post-workout, or just as a snack. And it’s made without any artificial sweeteners or flavors.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- content box end -->
            </div>
            <!-- card main end -->
        </div>

    </div>
    <!-- Footer Part -->
    <div class="footer-parent">
        <div class="container">
            <div class="footer-top-container">
                <div class="footer-brand-container">
                    <img src="{{asset('assets')}}/frontend/landing-images/typeskip.png" alt="Proof Icon SVG" class="proof-icon-footer-2">
                    <h4>Your AI assistant that writes better copy</h4>
                </div>
                <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-12 MuiGrid-grid-sm-6 MuiGrid-grid-md-4">
                    <h1 class="MuiTypography-root MuiTypography-body2">
                        <h1 style="font-size: 1.2em;"><strong><span class="gradient">Type</span> Skip</strong></h1>
                    </h1>
                    <div style="margin-bottom:32px">© Copyright <!-- -->2021<!-- -->. All rights reserved. <br><br>Made with <span class="gradient">♥</span> by<!-- --> <strong><a style="color:inherit;text-decoration:none" href="https://twitter.com/peer_rich" target="_blank">@Peer_Rich</a>.</strong><br>Be kind to each other.
                    </div>
                    
                </div>
                <div class="sc-fbNXWD iFMyOV">
                    <h3 size="16" class="sc-dlfnbm sc-pFZIQ sc-bXDlPE jGAXBf hqJbeD yCugf">Get in Touch</h3>
                    <div class="d-flex mt-3">
                        <a href="https://www.facebook.com/" target="_blank" class="sc-GTWni depgLh">
                            <img src="{{asset('assets')}}/frontend/landing-images/facebook.png">
                        </a>
                        <a href="https://www.linkedin.com/company/" target="_blank" class="sc-GTWni depgLh">
                            <img src="{{asset('assets')}}/frontend/landing-images/linkedin.png">
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="sc-GTWni depgLh">
                            <img src="{{asset('assets')}}/frontend/landing-images/twitter.png">
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="sc-GTWni depgLh">
                            <img src="{{asset('assets')}}/frontend/landing-images/instagram.png">
                        </a>
                    </div>
                    <a class="sc-GTWni depgLh mt-3" href="mailto:support@typeskip.ai">support@typeskip.ai</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Part -->
    <script src="{{asset('assets')}}/frontend/js/jquery-1.12.4.min.js"></script>
    <script src="{{asset('assets')}}/frontend/js/custom-google-animation.js"></script>
     <script type="text/javascript">
        function ValidateEmail(mail){
            if (/^[a-zA-Z0-9.!#$%&'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)$/.test(mail)) {
                return (true);
            } 
            return (false);
        }
        $('#notify-me').click(function(e){
            e.preventDefault();
            var email=$("#email").val();  
            if(email=='' || !(ValidateEmail(email))){ 
                $("#message").text('Please Enter email Id');
            } else {
                $.ajax({
                    url: "{{ url('submit-newsletter') }}",
                    type: 'POST', 
                    data: {"email": email, "_token": "{{ csrf_token() }}"}, 
                    success: function(data) { 
                        data=JSON.parse(data)
                        if(data.status==1){
                            $(".email-message").text("Thanks! We'll be in touch.");
                            $("#message").css("display", "block");
                            $(".newsletter input, .newsletter button").attr("display", "none");
                        } else{ 
                            $(".email-message").text("Thanks! We'll be in touch.");
                            $("#message").css("display", "block");
                            $(".newsletter input, .newsletter button").css("display", "none");
                        }
                    }
                });
             }
        });
    </script>
</body>
</html>