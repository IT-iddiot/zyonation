<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ES6 Arrow Function</title>
    <style>

        body {
            margin: 0;
        }
    
    </style>
    <script>
    
    function helloworld(name) {
        return `Helloworld ${name}`;
    }

    /**
     * * 1. remove 'function' keyword 
     * * 2. put => between (argument) & {
     * * 3. remove bracket 
     * * 4. remove 'return' keyword
     * * 5. remove () between arguments 
     */
    const helloworld2 = name => `Helloworld ${name}`;

    console.log(helloworld('Darren'));
    console.log(helloworld2('Darren'));

    //* Example: 
    const example1 = (a = 400, b = 100) => a + b; //* default parameter are supported
    console.log(example1());

    const example2 = (num, str) => ({ number : num * 10, string : "hello " + str}); 
    console.log(example2(12, "Darren")) //* return object 

    const arr = [1,2,34,54,23,122];
    const example3 = arr.filter( num => num > 50);
    console.log(example3)

    const example4 = arr.map( num => num * 2);
    console.log(example4)

    </script>

</head>
<body style="margin: 40px;">

</body>
</html>