function get_articles(){
    var http = new XMLHttpRequest();

    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var json_obj = JSON.parse(this.responseText);

            json_obj.forEach(article_data => {
                var title = article_data.title;

                var article_template = `
                    <article>
                        <span class="title">` + title + `</span>
                    </article>
                `;

                document.getElementById("articles").innerHTML += article_template;
            });
        }
    }

    http.open("GET", "../api?field=posts", true);
    http.send();
}