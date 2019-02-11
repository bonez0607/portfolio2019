import $ from 'jquery';

const user = "jbanegas";
const tag = "portfolio"
const url = "https://cpv2api.com/pens/showcase/" + user;

console.log('test');

function getPens(pens){
    const $penList = $(".noodles > ul");

    $.get(url)
        .done(function(pens){
            const allPens = pens.data

            allPens.map((pen,i)=>{
                const title = pen.title;
                const imageSrc = pen.images.small;
                const details = pen.details
                const link = pen.link

                $penList.append(
                    $("<li>")
                        .append($("<a href='" + link + "'>")
                            .append($("<div class='image'>")
                                .css('background-image', "url('" + imageSrc + "')")
                            )
                        .append("<h4>" + title + "</h4>")
                            .append(details)
                            .append("<div class='num'>0" + (i+1) + "</div>")));
            })
    })
}


getPens(url)




