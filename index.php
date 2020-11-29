<?php




require("./reusable/header.php");
require("./reusable/menu.php");

if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "Error: $error <br><br>";
    }
    unset($_SESSION['errors']);
}

?>

Home page



<script>
    function News(param) {
        this.id = param.id;
        this.title = param.title;
        this.content = param.content;
        this.created_at = param.created_at;

        this.printTo = function($elem) {
            var $card = $('<div>').addClass('card').css("width", "18rem");
            var $cardBody = $('<div>').addClass('card-body');
            var $h5 = $('h5').addClass('card-title');
            var $p = $('p').addClass('card-text');

            $h5.text(this.title + " - at " + this.created_a);
            $p.text(this.content);

            $card.append($cardBody);
            $cardBody.append($h5, $p);

            $elem.append($card);

            //     var text =           
            // "<div class='card' style='width: 18rem;'>" +            
            //     "<div class='card-body'>" +
            //         "<h5 class='card-title'>"+ this.title +" - at "+this.created_at+"</h5>" +
            //         "<p class='card-text'>"+this.content+"</p>"+   
            //     "</div>" + 
            // "</div>";       









        }
    }

    function addNews(newsArray) {
        for (var i = 0; i < newsArray.length; i++) {
            console.log(newsArray[i]);
        }
    }

    $(document).ready(
        function() {
            $.ajax({
                url: "./rest/latest_news.php",
                success: function(response) {

                    addNews(JSON.parse(response).data);
                }
            });
        }
    );
</script>
<?php
require("./reusable/footer.php");
?>