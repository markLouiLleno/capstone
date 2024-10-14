<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include necessary plugins -->
    <!-- Facebox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3.1/facebox.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/facebox/1.3.1/facebox.js"></script>

    <!-- jqFancyTransitions -->
    <script src="https://cdn.rawgit.com/benalman/jqFancyTransitions/master/jquery.jqFancyTransitions.min.js"></script>

    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/js/jquery.prettyPhoto.min.js"></script>

    <!-- Include any other necessary scripts here -->
    <script src="path/to/WOW.js"></script>

    <!-- Main JS file -->
    <script src="path/to/main.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize WOW.js
            new WOW().init();

            // Initialize Facebox
            $('a[rel*=facebox]').facebox();

            // Initialize jqFancyTransitions
            $('#fancy-transitions-container').jqFancyTransitions();

            // Initialize PrettyPhoto
            $("a[rel='prettyPhoto']").prettyPhoto();

            // Initialize DateTimePicker and DatePicker
            $('.datetimepicker').datetimepicker(); // Make sure this library is included
            $('.datepicker').datepicker(); // Make sure this library is included
        });
    </script>
</head>

<body>
    <!-- Your HTML content here -->

    <!-- Example usage of Facebox -->
    <a href="#inline" rel="facebox">Open Facebox</a>

    <!-- Example usage of jqFancyTransitions -->
    <div id="fancy-transitions-container"> ... </div>

    <!-- Example usage of PrettyPhoto -->
    <a href="your-image.jpg" rel="prettyPhoto">Open PrettyPhoto</a>
</body>

</html>