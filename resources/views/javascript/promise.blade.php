<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript Promise</title>
    <script>

    /**
     * * Function inside new promise will be executed immediately
     * * param : resolve & reject is provided by js by default
     * * only 1 resolve / reject will be accepted in executor
     * * any function and statement after resolve / reject will be ignored
     * * resolve & reject receive at most 1 parameter only (undefined by default)
     */
    var loading = false;
    console.log(loading);
    let example = new Promise((resolve, reject) => {
        loading = true;
        let a = 1 + 1;
        if(a === 2) {
            resolve("I am success man !"); // * one argument only
            console.log("I am second true"); // * will be ignored
        } else {
            reject("I am false man !"); // * PromiseResult : undefined (default)
        }
    })

    /**
     * * PromiseState : "fulfilled"
     * * PromiseResult : "I am success man !"
     */
    console.log(loading);
    console.log(example); 

    example
        .then(
            // * first param execute on resolve (naming can be whatever)
            // * put null if only interested in reject function
            success => console.log(`success from then with msg`),
            // * second param execute on reject (naming can be whatever)
            // error => console.log("fail from then")
        )
        .then((msg) => {
            console.log("Second then with message " + msg)
        })
        .catch((error) => { 
            // * handle reject only
            // * === .then(null, handleRejectFunction)
            console.log(error)
            console.log("I am message from catch")
        })
        .then(() => {
            console.log("Third then without message ")
        })
        .finally(() => {
            // * no argument 
            // * will be executed no matter the promise is resolved / rejected
            loading = false;
            console.log(loading);
        })
      ;

    const promise1 = new Promise((resolve, reject) => {
        resolve("First is fulfilled");
    });

    const promise2 = new Promise((resolve, reject) => {
        resolve("Second is fulfilled");
    });

    const promise3 = new Promise((resolve, reject) => {
        reject("Third is fulfilled");
    });

    Promise.all([
        promise1,
        promise2,
        promise3,
    ]).then((messages) => {
        // * only get executed when all the promise is resolved
        // * return an array of resolve messages
        console.log(messages);
    }).catch((errors) => {
        // * get executed whenever there is one promise rejected
        console.log(`The errors is ${errors}`)
    });

    // * wait until any of the promise is resolved / rejected
    Promise.race([
        promise1,
        promise2,
        promise3,
    ]).then((msg) => {
        console.log(`First resolve msg is ${msg}`);
    }).catch((msg) => {
        console.log(`First rejected msg is ${msg}`);
    })
    
    </script>
</head>
<body>

    
    
</body>
</html>