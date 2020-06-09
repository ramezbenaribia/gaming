
$(".name").on("change keyup paste", function () {
    if ($(this).val()) {
        $(".icon1").addClass("next");
    } else {
        $(".icon1").removeClass("next");
    }
});

$(".next-button").hover(function () {
    $(this).css("cursor", "pointer");
});

$(".next-button.name").click(function () {
    $(".name-section").addClass("fold-up");
    $(".category-section").removeClass("folded");
});



$(".category").on("change keyup paste", function () {
    if ($(this).val()) {
        $(".icon2").addClass("next");
    } else {
        $(".icon2").removeClass("next");
    }
});

$(".next-button").hover(function () {
    $(this).css("cursor", "pointer");
});

$(".next-button.category").click(function () {
    $(".category-section").addClass("fold-up");
    $(".image-section").removeClass("folded");
});



$(".image").on("change keyup paste", function () {
    if ($(this).val()) {
        $(".icon4").addClass("next");
    } else {
        $(".icon4").removeClass("next");
    }
});

$(".next-button").hover(function () {
    $(this).css("cursor", "pointer");
});

$(".next-button.image").click(function () {

    $(".image-section").addClass("fold-up");
    $(".description-section").removeClass("folded");
});


$(".description").on("change keyup paste", function () {
    if ($(this).val()) {
        $(".icon3").addClass("next");
    } else {
        $(".icon3").removeClass("next");
    }
});

$(".next-button.description").click(function () {
    $(".description-section").addClass("fold-up");
    $(".success").css("marginTop", 0);
});


