function get_articles(){
    var host = window.location.hostname;
    var http = new XMLHttpRequest();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var json_obj = JSON.parse(this.responseText);

            console.log(json_obj);

            json_obj.forEach(article_data => {
                var id = article_data.id;
                var title = article_data.title;

                var article_template = `
                    <article>
                        <a href="post.php?id=`+id+`"><span class="title">` + title + `</span></a>
                    </article>
                `;

                document.getElementById("articles").innerHTML += article_template;
            });
        }
    }

    http.open("GET", "../api/?id=*", true);
    http.send();
}

function get_article(id){
    var host = window.location.hostname;
    var http = new XMLHttpRequest();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var json_obj = JSON.parse(this.responseText);

            var title = json_obj.title;
            var content = json_obj.content;

            document.getElementById("title").innerHTML = title;
            document.getElementById("content").innerHTML = content;
        }
    }

    http.open("GET", "../api/?id=" + id, true);
    http.send()
}