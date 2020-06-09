// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function () {
    scrollFunction()
};
var backtop = document.getElementById("back_to_top");
var navbar = document.getElementById("header-nav");

function scrollFunction() {
    if (document.documentElement.scrollTop > 10) {
        navbar.style.padding = "1px 10px";
        navbar.classList.add("sticky");
        navbar.style.height = "70px";


    } else {
        navbar.style.padding = "15px 10px";
        navbar.style.height = "100px"
        navbar.classList.remove("sticky");
    }

    /******back to top button *****/

    if (document.documentElement.scrollTop > 200) {
        backtop.classList.remove("invisible");
        var compteur_backtop = 0;
        testInterval();

        function testInterval() {
            var code = setInterval(function () {
                if (compteur_backtop < 1) {
                    compteur_backtop += 0.01;
                    backtop.style.opacity = compteur_backtop;

                } else {
                    clearInterval(code);
                }
            }, 1, code);
        }
    } else {
        var compteur_backtop = 1;
        testInterval();

        function testInterval() {
            var code = setInterval(function () {
                if (compteur_backtop > 0) {
                    compteur_backtop -= 0.01;
                    backtop.style.opacity = compteur_backtop;

                } else {
                    clearInterval(code);
                }
            }, 1, code);
        }


    }

    /******END back to top button *****/
}

backtop.onclick = function () {
    backtop.classList.add("invisible");
}


/***  to show the search bar ****/
var search1 = document.getElementById("searchbar1");
var boutton1 = document.getElementById("btnsearch1");
boutton1.onclick = function () {
    search1.classList.remove("invisible");
};

boutton1.ondblclick = function () {
    search1.classList.add("invisible");
};
var search2 = document.getElementById("searchbar2");
var boutton2 = document.getElementById("btnsearch2");
boutton2.onclick = function () {
    search2.classList.remove("invisible");
};

boutton2.ondblclick = function () {
    search2.classList.add("invisible");
};

/***** ****/


$(document).ready(function () {
    $(".hamburger").click(function () {
        $(".wrapper").toggleClass("collapse");
    });
});


window.onload = navbar_dropdown()

function navbar_dropdown() {
    var dropitem1 = $("#dropitem1")
    var ddm1 = $("#ddm1")
    // wakt nokherjou mel dropdown catégories fel navbar, la liste d'éléments tetnaha
    dropitem1.on("mouseleave", function () {
        ddm1.removeClass("show");
    })

    // wakt nodkhlou lel dropdown catégories fel navbar, la liste d'éléments todhhor
    dropitem1.on("mouseover", function () {
        ddm1.addClass("show");
    })

    // wakt nokherjou mel dropdown mini-jeux fel navbar, la liste d'éléments tetnaha
    var dropitem2 = $("#dropitem2")
    var ddm2 = $("#ddm2")
    dropitem2.on("mouseleave", function () {
        ddm2.removeClass("show");
    })

    // wakt nodkhlou lel dropdown mini-jeux fel navbar, la liste d'éléments todhhor
    dropitem2.on("mouseover", function () {
        ddm2.addClass("show");
    })

    // wakt nokherjou mel dropdown mini-jeux fel navbar, la liste d'éléments tetnaha
    var dropitem3 = $("#dropitem3")
    var ddm3 = $("#ddm3")
    dropitem3.on("mouseleave", function () {
        ddm3.removeClass("show");
    })

    // wakt nodkhlou lel dropdown mini-jeux fel navbar, la liste d'éléments todhhor
    dropitem3.on("mouseover", function () {
        ddm3.addClass("show");
    })
}
