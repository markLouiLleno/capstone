<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        @import url("http://fonts.cdnfonts.com/css/sf-pro-display");
        @import url('https://fonts.cdnfonts.com/css/sf-ui-text-2');
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        @import url("https://use.typekit.net/ngj5fjz.css");
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sf Pro display', 'Public sans', sans-serif;
        }

        body {
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            overflow: hidden;
            position: relative;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            z-index: 1;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .intro-title {
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            color: #333;
        }

        .field {
            display: flex;
            flex-direction: column;
        }

        .name-field {
            display: flex;
            gap: 0.8rem;
        }

        .form-label {
            font-size: 16px;
            margin-bottom: 0.3rem;
        }

        .form-input {
            padding: 10px 12px;
            font-size: 0.95rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #fafafa;
            transition: border-color 0.2s ease;
            width: 100%;
            font-size: 14px;
        }

        .form-input:focus {
            border-color: #007BFF;
            outline: none;
        }

        .submit-btn {
            padding: 16px;
            font-size: 16px;
            color: #fff;
            background-color: #333;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s ease;
            height: 50px;
            font-weight: 500;
        }
        .submit-btn:hover {
            background-color: #3e3e3e;
        }
        
        .google-btn {
            font-size: 16px;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s ease;
            font-weight: 400;
            background: #f9f9f9;
            border: 1px solid rgba(0, 0,0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            color: #555;
            gap: 6px;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .google-btn:hover {
            background-color: #f0f2f5;
        }

        .or-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .or-line {
            width: 100%;
            height: 1px;
            background-color: #ddd;
        }

        .or-text {
            font-size: 14px;
            color: #aaa;
            background-color: white;
            position: absolute;
            padding-inline: 10px;
            text-transform: lowercase;
            font-weight: medium;
        }

        .redirect-text {
            font-size: 16px;
            color: gray;
            text-align: center;
        }
        .redirect-text a:hover {
            text-decoration: underline !important;
            color: #3e3e3e;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="form-container">
        <form action="#" class="form">
            <h1 class="intro-title">Sign In</h1>

            <div class="field">
                <label for="email" class="form-label">Email</label>
                <input 
                    id="email"
                    name="email" 
                    placeholder="juandelacruz@example.com"
                    class="form-input"
                >
            </div>
            <div class="field">
                <label for="password" class="form-label">Password</label>
                <input 
                    id="password"
                    name="password" 
                    placeholder="******"
                    type="password"
                    class="form-input"
                >
            </div>
            <button class="submit-btn" type="submit">
                Sign in with credentials
            </button>

            <div class="or-container">
                <span class="or-text">or</span>
                <div class="or-line"></div>
            </div>

            <button class="google-btn" type="button">
                <img width="25" height="25" src="https://th.bing.com/th/id/R.0fa3fe04edf6c0202970f2088edea9e7?rik=joOK76LOMJlBPw&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fgoogle-logo-png-open-2000.png&ehk=0PJJlqaIxYmJ9eOIp9mYVPA4KwkGo5Zob552JPltDMw%3d&risl=&pid=ImgRaw&r=0" alt="Google logo">
                Sign in with google
            </button>
            <div class="redirect-text">
                Don't have an account?
                <a href="signup.php" style="font-weight: 500; color: #333; text-decoration: none; ">Sign up</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#000"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#333"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 5,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#000",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": false,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 1
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
