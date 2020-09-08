<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSS ::before ::after</title>
    <style>

        .tutorials {
            margin-top: 20vh;
        }

        fieldset {
            width: 20%;
            margin: 10px auto;        
        }

        fieldset:first-child {
            text-align: center;
        }
    
        [data-tooltip] {
            position : relative;
        }

        [data-tooltip]:hover::after {
            content : "helloworld";
            position : absolute;
            left: 0;
            right: 0;
            top: 100%;
            margin-top: 8px;
            padding: 5px;
            border-radius: 4px;
            background-color: lightgrey;
        }

        ul {
            counter-reset: li; 
        }

        ul > li::before {
            content : "Item - " counter(li) " ";
            counter-increment: li;
        }

    </style>
</head>
<body>

    <div class="tutorials">

        <fieldset>
            <button data-tooltip="btn_hover">
                Hover me
            </button>
        </fieldset>

        <fieldset>
            <ul>
                <li>item 1</li>
                <li>item 2</li>
                <li>item 3</li>
            </ul>
        </fieldset>

    </div>

</body>
</html>