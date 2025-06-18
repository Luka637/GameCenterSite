let navItem = ["Home", "About", "Trending Games", "Contact", "Wallpapers"];

let navLinks = ["index.html", "about.html", "trending.html", "contact.php", "Wallpapers.html"];

let ul = document.createElement("ul");
ul.setAttribute("class", "flex");
for(i=0; i<navItem.length; i++){
    let li = document.createElement("li");
    let a = document.createElement("a");
    a.innerHTML = navItem[i];
    a.setAttribute("href", navLinks[i]);

    li.appendChild(a);

    ul.appendChild(li);
}

document.getElementById("nav").appendChild(ul);
