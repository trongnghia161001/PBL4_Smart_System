<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .element {
        display: inline-block;
        width: 100%;
        height: 100vh;
        border: none;
    }


    .flexLayout {
        display: flex;
    }
    </style>
</head>

<Frameset border="1" cols="500,*">
    <Frame name="t1" src="">
    </Frame>
    <Frameset rows="*,*">
        <Frame name="t2" src="check.php">

        </Frame>
        <Frame name="t3" src="bill.php">

        </Frame>
    </Frameset>

</Frameset>

<body>

</body>

</html>