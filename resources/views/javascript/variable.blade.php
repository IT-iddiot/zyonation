<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES6 Variable</title>
    <script type="module">

    //* Var 
    for(var i = 0; i < 3; i++) {
        console.log(i);
    }
    /**
     * * var variable is accessible outside scope {}
     */
    console.log(`I am outside scope ${i}`);

    //* let 
    for(let j = 0; j < 3; j++) {
        console.log(i)
    }
    /**
     * * access let variable outside of scope will trigger error 
     * ! variable:22 Uncaught ReferenceError: j is not defined
     */
    // console.log(`I am outside scope ${j}`);

    //* cont 
    // for(cont x = 0; x < 3; x++) {
    //     console.log(x)
    // }
    /**
     * * cannot use cont in for loop 
     * ! Uncaught SyntaxError: Unexpected identifier
     */
    // console.log(`I am outside scope ${x}`);

    //* use case 

    function isGymMyHobby(hobby) {
        const isGym = hobby.toLowerCase() === 'gym';
        if(isGym) {
            const message = "Yeh. You will get fit soon";
            console.log(message);
        } else {
            const message = "Oh No. You should gym man !";
            console.log(message);
        }
    }

    isGymMyHobby('Gym');



    </script>
</head>
<body>
    
</body>
</html>