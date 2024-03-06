<<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here" />
        <link rel="stylesheet" href="css/style.css">
        <title>delete multiple data using checkbox</title>
        <script src="https://code.jquery.com/jquery-3.7.0.js"
            integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="main">
            <div id="header">
                <h1> Delete Multiple Data Using Checkbox </h1>
            </div>

            <div id="button-tb">
                <button type="button" id="dlt-btn"> Delete </button>
            </div>

            <div id="table-data">
            </div>

        </div>

        <div id="success-message"> </div>
        <div id="error-message"> </div>
        
        <script>
        $(document).ready(function() {

            function loaddata() {
                $.ajax({
                    url: 'load-data.php',
                    type: 'POST',
                    success: function(data) {
                        $("#table-data").html(data);
                    }
                });
            }
            loaddata();

            $("#dlt-btn").on("click", function() {
                var arr = [];

                $(":checkbox:checked").each(function(key) {
                    arr[key] = $(this).val();
                   // console.log(arr[key]);
                });

                if (arr.lengh === 0) {
                    alert("please select value");
                } else {
                    if (confirm("Do you relly want to delete this")) {
                        $.ajax({
                            url: 'delete.php',
                            type: 'POST',
                            data: {
                                id: arr
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $("#success-message").html("record delete successfully")
                                        .slideDown();
                                    $("error-message").slideUp();
                                    setTimeout(function() {
                                        $("#success-message").slideUp();
                                    }, 4000);
                                    loaddata();
                                } else {
                                    $("#error-message").html(
                                        "record cant delete successfully").slideDown();
                                    $("success-message").slideUp();
                                    setTimeout(function() {
                                        $("#error-message").slideUp();
                                    }, 4000);
                                    loaddata();
                                }

                            }

                        });
                    }
                }

            });


        });
        </script>
    </body>

    </html>