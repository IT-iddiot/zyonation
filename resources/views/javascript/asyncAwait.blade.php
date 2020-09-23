<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Async Await</title>
    <script>
    
    // * async function will always return a promise
    async function helloworld() {
        return Promise.resolve(1);
    }

    //* Or with arrow function
    let hello = async () => { return 1 };

    /**
     * PromiseState : "fulfilled"
     * PromiseResult : 1
     */
    // console.log(helloworld());
    // console.log(hello());

    async function example() {
        try {
            let result = await new Promise((resolve, reject) => {
                setTimeout(() => {
                    reject("I am success man !"); 
                }, 2000);
            })
            /**
             * * the following code will only be run if the promise is resolved
             * * without await, the console will show pending promise with data undefind
             * * without await, the console "bye" will be displayed directly without waiting promise is resolved
             * * with await, the result will always show state "fulfilled"
             * * with await, console "bye" will only be displayed after the promise is resolved
             */
            console.log(result)
            console.log("bye")
        } catch(error) {
            // * will run whenever the promise is rejected 
            console.error(error);
        }
    }

    example();

    async function fetchData() {
        try {
            let result = await fetch(`https://api.github.com/users/IT-iddiot`);
            const content = await result.json();
            console.log(content)
        } catch(error) {
            throw new Error(error)
        }
    }

    fetchData();
   
    
    </script>
</head>
<body>
    
</body>
</html>