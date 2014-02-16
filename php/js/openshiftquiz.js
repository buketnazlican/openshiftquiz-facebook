var score = 0;
var correct = 0;
$(function(){
    $("input:radio").change(function(){
        if($(this).data("correct")) {
            correct = correct + 1;
            $(this).parent().children(".answered").text("[Correct! +" + $(this).data("points")+"] ").removeClass("incorrect").addClass("correct");
            score = score + $(this).data("points");
            $(".points").text(score);
            $(".show-congratulations").show();
            $(this).closest("li").find("input").each(function(index){
                $(this).attr('disabled',true);
            });
            if (correct == 1) {
                askPostToFacebook();
            }
            if (correct == 5) {
                askPostToFacebook();
            }
            if (correct == 11) {
                askPostToFacebook();
            }
        } else {
            $(this).parent().children(".answered").text("[Incorrect! Try Again!] ").removeClass("correct").addClass("incorrect");
        }
    })

    $('#share-quiz').click(function(e){
        e.preventDefault();
        postToFacebookTimeline("try", "Come see how much you know about OpenShift Online with this quiz!");
    });
});
function askPostToFacebook(link) {
    var r=confirm("Congratulations!  You have scored " + score + " points on the OpenShift Quiz! Would you like to post your score to your Facebook timeline?");
    if (r==true) {
        postToFacebookTimeline(score, "I scored "+ score + " points on the OpenShift Quiz!");
    } else {

    }
}
function postToFacebookTimeline(link,message) {
    $.ajax({
        type: "POST",
        url: "facebook_timeline.php",
        data: { link: "http://apps.facebook.com/openshiftquiz?"+link, message: message }
    })
        .done(function( msg ) {
            showMessage("You have successfully shared to your Facebook timeline!");
        });
}

function showMessage(message) {
    $('#successMessage').text(message).fadeIn(function() {
        setTimeout(function() {
            $('#successMessage').fadeOut();
        }, 5000);
    });
}