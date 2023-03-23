<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script>

    document.onkeydown = function(e) {
    const keyCode = e.keyCode || e.which;
    const ctrlShift = e.ctrlKey && e.shiftKey;
    const charI = 'I'.charCodeAt(0);
    const charC = 'C'.charCodeAt(0);
    const charJ = 'J'.charCodeAt(0);
    const charU = 'U'.charCodeAt(0);
    const charS = 'S'.charCodeAt(0);

    switch (keyCode) {
        case 123: // F12
        return false;
        case ctrlShift && charI:
        case ctrlShift && charC:
        case ctrlShift && charJ:
        case e.ctrlKey && charU:
        case e.ctrlKey && charS:
        return false;
        default:
        return true;
    }
    };

    </script>

    <title>index.php title</title>
    
</head>