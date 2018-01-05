<?php

    include '../../database/db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rachel - Edit</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <link rel="stylesheet" href="../../css/navbar.css">
    <link rel="stylesheet" href="../../css/social.css">
    <link rel="stylesheet" href="../../css/admin/dashboard.css">
    <link rel="stylesheet" href="../../css/admin/edit.css">
</head>
<body>
  
    <?php include '../repeats/navbar.php'; ?>
  
    <div class="container dash-section">
        <div class="col-md-12">
            <div class="page-header">
                <a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i></a>
                <h2>Hello, Rachel</h2>
            </div>
            <p class="lead"><a href="logout.php">Log out</a></p>
            <hr>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="catUpdate">Category</label>
                        <select id="catUpdate" class="custom-select" required name="catUpdate">
                            <option selected value="">Select...</option>
                            <option value="digital">Digital</option>
                            <option value="abstract">Abstract</option>
                            <option value="traditional">Traditional</option>
                            <option value="logos">Logos</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row gallery">
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <form id="updateForm" data-id="" class="hidden" method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" name="description" value="" class="form-control" id="desc">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="month">Month</label>
                                    <input type="number" name="month" class="form-control" id="month" required>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" name="year" class="form-control" id="year" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="catIndv">Category</label>
                                    <select id="catIndv" class="custom-select" required name="catIndv">
                                        <option selected value="">Select...</option>
                                        <option value="digital">Digital</option>
                                        <option value="abstract">Abstract</option>
                                        <option value="traditional">Traditional</option>
                                        <option value="logos">Logos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-check">
                                    <label class="form-check-label">
                                    <input id="slide" name="slide" class="form-check-input" type="checkbox" value="1">
                                    Slideshow?
                                    </label>
                                </div>
                            </div>
                        </div>
                        <center>
                            <button id="upd" class="btn btn-primary">Update</button>
                            <button id="can" type="button" class="btn btn-dark">Cancel</button>
                            <button id="del" type="button" class="btn btn-danger">Delete</button>
                        </center>
                    </form> 
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
        $('#catUpdate').on('change', function() {
            if ($(this).val() != '') {
                $.ajax({
                    type: "POST",
                    url: "select.php",
                    dataType: "json",
                    data: {
                        "category": $(this).val(),
                    },
                    success: function(data) {
                        // alert("ADDED!");
                        $('.indv_img').remove();
                        $.each(data, function(i, img) {
                            $('.gallery').append("<div class='col-md-3 indv_img'>" +
                                                    "<div class='resize'>" +
                                                        "<img data-id='" + data[i].id + "' class='editable' src='../../img/uploads/" + data[i].file_name + "' alt='" + data[i].name + "' />" +
                                                    "</div>" +
                                                "</div>");
                        }); 
                    },
                    complete: function(data) { //optional, used for debugging purposes
                        
                    }
                });//AJAX 
            }
        });
        
        $('.gallery').on('click', '.editable', function() {
            let id = $(this).attr('data-id');
            $('.indv_img').addClass('hidden');
            $(this).parent().parent().removeClass('hidden');
            $.ajax({
                type: "POST",
                url: "selected.php",
                dataType: "json",
                data: {
                    "id": $(this).attr('data-id'),
                },
                success: function(data) {
                    // alert("ADDED!");
                    // console.log(data);
                    // console.log(data.description);
                    $('#updateForm').attr('data-id', id);
                    $('#name').val(data.name);
                    $('#desc').val(data.description);
                    $('#catIndv').val(data.category);
                    if (data.slideshow == true) {
                        $('#slide').prop( "checked", true );
                    } else {
                        $('#slide').prop( "checked", false );
                    }
                    $('#month').val(data.month);
                    $('#year').val(data.year);
                    $('#year').val(data.year);
                    $('#updateForm').removeClass('hidden');
                },
                complete: function(data) { //optional, used for debugging purposes
                    
                }
            });//AJAX 
        });
        
        $('#upd').on('click', function(e) {
            e.preventDefault();
            let checked;
            if ($('#slide').is(':checked')) {
                checked = 1;
            } else {
                checked = 0;
            }
            $.ajax({
                type: "POST",
                url: "update.php",
                dataType: "json",
                data: {
                    "id": $('#updateForm').attr('data-id'),
                    "name": $("#name").val(),
                    "description": $("#desc").val(),
                    "month": $("#month").val(),
                    "year": $("#year").val(),
                    "slide": checked,
                    "category": $("#catIndv").val(),
                },
                success: function(data,status) {
                    // alert("ADDED!");
                    
                  },
                  complete: function(data,status) { //optional, used for debugging purposes
                      //alert(status);
                    $('#updateForm').attr('data-id', '');
                    $('#name').val('');
                    $('#desc').val('');
                    $('#catIndv').val('');
                    $('#slide').prop( "checked", false );
                    $('#month').val('');
                    $('#year').val('');
                    $('#year').val('');
                    $('#updateForm').addClass('hidden');
                    $('.indv_img').removeClass('hidden');
                  }
            });//AJAX 
        });
        
        $('#can').on('click', function(e) {
            e.preventDefault();
            $('#updateForm').attr('data-id', '');
            $('#name').val('');
            $('#desc').val('');
            $('#catIndv').val('');
            $('#slide').prop( "checked", false );
            $('#month').val('');
            $('#year').val('');
            $('#year').val('');
            $('#updateForm').addClass('hidden');
            $('.indv_img').removeClass('hidden');
        });
        
    </script>
</body>