<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
    <link href="./styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div class="content container mt-5">
       <?php include "displayRating.php"; ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js"></script>
<!-- Invoke star rating -->
<script type='text/javascript'>
    $(document).ready(function(){
        $('#starRating<?php echo $teacher_id; ?>').barrating('set',<?php echo $rating; ?>);
    });
    $(function () {
        $('.rating').barrating({
            theme: 'fontawesome-stars',
            onSelect: function (value, text, event) {
                
                var el = this;
                var el_id = el.$elem.data('id');
                
                if (typeof (event) !== 'undefined') {
                    var split_id = el_id.split("_");
                    var teacher_id = split_id[1];
                    $.ajax({
                        url: 'starRating.php',
                        type: 'post',
                        data: {
                            teacher_id: teacher_id,
                            rating: value
                        },
                        dataType: 'json',
                        success: function (data) {
                            var average = data['numRating'];
                            $('#numeric_rating_' + teacher_id).text(average);
                        }
                    });
                }
            }
        });
    });
</script>
</html>