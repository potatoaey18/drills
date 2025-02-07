<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: linear-gradient(rgba(51, 50, 50, 0.5), rgba(51, 50, 50, 0.5)), url(./image/pup-bg-landing.jpg);
            height: 100vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: flex-end;    
        }
        
        h2 {
            font-size: 38px;
            font-weight: 200;
            margin-bottom: 0;
            margin-top: 21px;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height: 1.1;
            color: #000;
            display: block;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            text-align: center;
        }

        h3 {
            font-size: 26px;
            padding-bottom: 12px;
            margin: 0 auto;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight: 300;
            line-height: 1.1;
            color: #000;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            text-align: center;            
        }


        .buttons-container {
            margin-top: 2rem;
        }

        button {
            display: inline-block;
            width: 500px;
            border: none;
            border-radius: 10px;
            color: #fff;
            padding: 18px 20px;
            font-size: 1.2rem;
            cursor: pointer;
            font-style: normal;
            font-weight: 200;
            margin: 15px 0;
            opacity: 0.9;
            background-color: #800000; /* Maroon */
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button:hover {
            opacity: 0.8;   
        }

        .container {
            height: 100%;
            width: 35%;
            background-color:rgb(218, 218, 218, 0.9);            
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            margin-right: -10px;
            overflow: hidden;
        }

        .logo {
            height: 100px;
        }
    </style>
</head>
<body>
        <div class="container">
            <img src="image/pupLogo.png" alt="logo" class="logo">
            <h2>Hi Teknolohista!</h2>
            <h3>OJT Portal</h3>
            <div class="buttons-container">
                <button onclick="window.open('./student', '_self')">Student</button>
                <button onclick="window.open('./supervisor', '_self')">OJT Supervisor</button>
                <button onclick="window.open('./coordinator', '_self')">HTE Coordinator</button>
                <button onclick="window.open('./adminportal', '_self')">SIP Coordinator</button>
            </div>
        </div>
</body>
</html>