<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .flex-container {
        display: flex;
    }

    .flex-child {
        flex: 1;
        border: 2px solid yellow;
    }

    .flex-child:first-child {
        margin-right: 20px;
    }
    </style>
</head>


<body>
    <div class="flex-container">

        <div class="flex-child magenta">
            Flex Column 1
        </div>

        <div class="flex-child green">
            Flex Column 2
        </div>

    </div>
</body>

</html>