<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS Position</title>
    <style>

    body {
        margin: 5rem;
        height: 300vh;
    }

    .parent {
        margin: 20px auto;
        width: 600px;
        height: 300px;
    }

    .parent-1 {
        width: 600px;
        height: 300px;
    }

    .child-1 {
        position: relative;
        width: 600px;
        height: 300px;
        top: -12px;
        right: -12px;
        background: white;
        border: thin solid lightgrey;
    }

    h4 {
        font-size: 1.5rem;
        text-align:center;
    }

    .parent-2 {
        position: relative;
        background-color: #85FFBD;
        background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);

    }

    .child-2 {
        position: absolute;
        width: 80px;
        height: 80px;
        border: 1px solid red;
        border-radius: 5px;
    }

    .first {
        top: 0;
        left: 0;
    }

    .second {
        top: 0;
        right: 0;
    }

    .third {
        bottom: 0;
        left: 0;
    }

    .forth {
        bottom: 0;
        right: 0;
    }

    .center {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .decoration {
        background-color: #00DBDE;
        background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);
        margin: 0 auto;
    }

    .child {
        width: 50px;
        height: 50px;
        background: cyan;
    }

    pre {
        white-space : pre;
    }

    .parent-3 {
        position: fixed;
        top: 0;
        right: 0;
    }

    .decoration-3 {
        width: 120px;
        height: 50px;
        margin: 10px;
        border-radius: 10px;
        background-color: #4158D0;
        background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }

    .span-3 {
        color: white;
        font-size: 1rem;
        padding: 6px 10px;
        margin: 0;
    }

    .span-3 a {
        color: white;
    }

    .parent-4 {
        position: sticky;
        position: -webkit-sticky;
        top: 0; /* required */
        background-color: #D9AFD9;
        background-image: linear-gradient(0deg, #D9AFD9 0%, #97D9E1 100%);

    }
    
    </style>
</head>
<body>
 
    <!-- Position relative demo -->
    <div class="parent parent-1 decoration">
        <div class="child-1">
            <h4>
                Position relative demostration
            </h4>
            <pre style="width: 100px;">
                    {
                        position: relative; 
                        top: -12px;
                        right: -12px;
                    }
            </pre>
        </div>
    </div>

    <!-- Position absolute demo -->
    <h4>Position absolute with relative parent</h4>
    <div class="parent parent-2">
        <div class="child-2 first">
<pre>
 top: 0;
 left: 0;
</pre>
        </div>
        <div class="child-2 second">
<pre>
 top: 0;
 right: 0;
</pre>
        </div>
        <div class="child-2 third">
<pre>
 bottom: 0;
 left: 0;
</pre>
        </div>
        <div class="child-2 forth">
<pre>
 bottom: 0;
 right: 0;
</pre>
        </div>
        <div class="child-2 center" style="width: 180px;">
<pre>
 top: 50%;
 left: 50%;
 transform: 
  translate(-50%, -50%);
</pre>
        </div>
    </div>

    <!-- Position fixed -->
    <div class="parent-3 decoration-3">
        <p class="span-3">
            Position: fixed
            top: 0;
            right: 0;
        </p>
    </div>

    <!-- 
    |    Position sticky 
    |    position relative initially 
    |    changed to position sticky when user scroll to certain point 
    -->
    <div>
        <h4 style="margin-bottom: 1rem;">Position sticky</h4>
        <h5 style="text-align: center;">Loss functionality for now, will be added in future</h5>
        <div class="parent parent-4">
            
        </div>
    </div>
    
</body>
</html>