import $ from 'jquery';

const user = "jbanegas";
const tag = "portfolio"
const url = "https://cpv2api.com/pens/showcase/" + user;

console.log(url)


 /*.full.noodles
        h3 Noodlings
        p Here's over 25 projects I've completed on the side, whether its keeping up with modern trends or answering questions on StackOverflow I enjoy taking time to code.
       
        ul
            li
                .image
                h4 Project Title
                p Lorem ipsum dolor sit amet, mel nonumy utamur ex, ei semper tritani aliquando has. Ei sint soleat graeci cum, ne dici
                .num 01
            li
                .image
                h4 Project Title
                p Lorem ipsum dolor sit amet, mel nonumy utamur ex, ei semper tritani aliquando has. Ei sint soleat graeci cum, ne dici
                .num 02
            li
                .image
                h4 Project Title
                p Lorem ipsum dolor sit amet, mel nonumy utamur ex, ei semper tritani aliquando has. Ei sint soleat graeci cum, ne dici
                .num 03
            li
                .image
                h4 Project Title
                p Lorem ipsum dolor sit amet, mel nonumy utamur ex, ei semper tritani aliquando has. Ei sint soleat graeci cum, ne dici
                .num 04*/

  
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

                console.log(imageSrc);
                console.log(pen)
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




