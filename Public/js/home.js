$(function () {
    $("#lang #drop3").click(function () {
        $.ajax({
            url: "http://115.28.244.81/getLangList/all",
            dataType: "jsonp",
            data: {ajax: 1},
            success: function (data) {
                var langList = data.content;
                var ul = '<ul>';
                for (var i = 0; i < langList.length; i++) {
                    var id = langList[i]["id"];
                    var code = langList[i]["code"];
                    var img = langList[i]["img"];
                    var lang = langList[i]["lang"];
                    ul += '<li><a href = "' + code + '"><img src="' + img + '"><span>' + lang + '</span></a></li>';
                }
                ul += '</ul>';
//               $('#langHolder').empty();
//                $('#langHolder').append(ul);
            }
        });
    });

    $('.dropdown-toggle').dropdownHover();// Menu-Hover
    $('#lang #languageHolder > ul > li > a').click(function () {
        var slcLang = $(this).html();
        document.cookie = 'slcLang=' + slcLang;
    });
});