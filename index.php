<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap');

        body {
            font-family: Serif 4, sans-serif;
            text-align: center;
            background: url(./image/landing.jpg);
            height: 100vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            overflow:hidden;
            display: flex;
            align-items: center;
            justify-content: flex-end;    
        }
        
        h2 {
            font-size: 38px;
            font-weight: 200;
            margin-bottom: 0;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height: 1.1;
            color: #000;
            display: block;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            margin-top: 3rem;
            text-align: center;
        }

        h3 {
            font-size: 26px;
            padding-bottom: 12px;
            font-weight: 550;
            color: #000;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            margin-top: 3rem;
            text-align: center;         
            color: #D11010;  
        }

        h4 {
            font-size: 18px;
            padding-bottom: 12px;
            margin: 0 auto;
            font-weight: 400;
            color: #000;
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            text-align: center;    
        }

        h6 {
            font-size: 16px;
            font-family: Arial, sans-serif;
            font-weight: 200;
            margin-bottom: 10px;
        }

        button {
            display: inline-block;
            width: 500px;
            border: none;
            border-radius: 10px;
            color: #fff;
            padding: 15px 20px;
            font-size: 1.2rem;
            cursor: pointer;
            font-style: normal;
            font-weight: 500;
            margin: 13px 0;
            opacity: 0.9;
            background-color: #800000;
        }

        button:nth-child(2) {
            background-color: #700000;
        }

        button:nth-child(3) {
                background-color: #FABC3F;
        }

        button:nth-child(4) {
                background-color: #E85C0E;
        }

        button:nth-child(5) {
                background-color: #444444;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 3rem;
        }

        button:hover {
            opacity: 0.8;   
        }

        .container {
            height: 100%;
            width: 40%;
            background-color:rgb(218, 218, 218, 0.8);            
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            margin-right: -10px;
            line-height: 0;
        }

        .logo {
            height: 100px;
        }
    </style>
</head>
<body>
        <div class="container">
            <img src="image/pupLogo.png" alt="logo" class="logo">
            <h3>Polytechnic University of the Philippines-ITECH</h3>
            <h4>On the Job Training Portal</h4>
            <h2>Kamusta Teknolohista!</h2>
            <div class="buttons-container">
                <h6>Identify Yourself</h6>
                <button onclick="window.open('./student', '_self')"><b>Student</b></button>
                <button onclick="window.open('./supervisor', '_self')"><b>Faculty</b></button>
                <button onclick="window.open('./coordinator', '_self')"><b>H.T.E</b></button>
                <button onclick="window.open('./adminportal', '_self')"><b>Coordinator</b></button>
            </div>
        </div>
</body>
</html>