<html>
<head>
    <title>Defuse the BOM</title>
<style type="text/css"></style>
</head>

<body>
    <h2 id="message">This BOM will self destruct in <span id="timer">5</span> seconds...</h2>

    <button id="defuser">Defuse the BOM</button>

    <script>
        var detonationTimer = 5;
        var secInterval = 1000;

        // TODO: This function needs to be called once every second
        var intervalID = setInterval(function updateTimer()
        {
            if (detonationTimer == 0) {
                alert('EXTERMINATE!');
                document.body.innerHTML = '';
            } else if (detonationTimer > 0) {
                document.getElementById('timer').innerHTML = detonationTimer;
            }

            detonationTimer--;
        }, secInterval);
        // TODO: When this function runs, it needs to

        // cancel the interval/timeout for updateTimer()
        function defuseTheBOM()
        {
            clearInterval(intervalID);
            alert("BOM defused!");
        }

        // Don't modify anything below this line!
        //
        // This causes the defuseTheBOM() function to be called
        // when the "defuser" button is clicked.
        // We will learn about events in the DOM lessons
        var defuser = document.getElementById('defuser');
        defuser.addEventListener('click', defuseTheBOM, false);
    </script>


</body>
</html>