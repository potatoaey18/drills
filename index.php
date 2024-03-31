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
            padding: 2rem;
            background: linear-gradient(rgba(51, 50, 50, 0.5), rgba(51, 50, 50, 0.5)), url(./image/bulsu-main-gate.jpg);
            height: 94vh;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;

        }

        h2 {
            font-size: 38px;
            font-weight: 600;
            margin-bottom: 0;
            margin-top: 21px;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
            line-height: 1.1;
            color: white;
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
            color: white;
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
            border: 2px solid #d09b00;
            border-radius: 5px;
            background: linear-gradient(rgba(51, 50, 50, 0.5), rgba(51, 50, 50, 0.5));
            color: #fff;
            padding: 10px 18px;
            font-size: 1.2rem;
            cursor: pointer;
            font-style: normal;
            font-weight: 600;
            text-transform: uppercase;
            margin: 10px 0;
        }

        button:hover {
            border: 2px solid #d09b00;
            background: #d09b00
        }
    </style>
</head>
<body>
	
    <h2>Bulacan State University</h2>
	<h3>OJT Management System</h3>
    <div class="buttons-container">
        <button onclick="window.open('./student', '_self')">STUDENT OJT</button>
        <button onclick="window.open('./supervisor', '_self')">HTE COORDINATOR</button>
        <button onclick="window.open('./adminportal', '_self')">SIP COORDINATOR</button>
        <button onclick="window.open('./coordinator', '_self')">OJT COORDINATOR</button>
    </div>
</body>
</html>